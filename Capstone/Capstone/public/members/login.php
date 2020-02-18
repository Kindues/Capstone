<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

	if(is_blank($username)){
		$erros[] = 'Username cannot be blank';
	}
	if(is_blank($password)){
		$erros[] = 'Password cannot be blank';
	}
	
	if(empty($errors)){
			$login_failure_msg = 'Log in was unsuccessful.';
		  $admin = find_admin_by_username($username);
    $member = find_member_by_username($username);
		if($admin){
			if(password_verify($password, $admin['hashed_password']))
				//password matches
					log_in_admin($admin);
  				redirect_to(url_for('/members/index.php'));
		} else{
      $errors[] = $login_failure_msg;
    }
    if($member) {
        
			if(password_verify($password, $member['pass_hash']))
				//password matches
					log_in_member($member);
  				redirect_to(url_for('/members/products.php'));
		} else {
	       //username found but not password
					$errors[] = $login_failure_msg;
	   } 

  }else{
	//no user found
					$errors[] = $login_failure_msg;
	}
}
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<html>

<head>
  <meta charset="utf-8">
  <title>Members Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <link rel="stylesheet" media="all" href="../../css/styles.css">

  <!--*************ReCaptia v3 Script ***************-->
  <script src="https://www.google.com/recaptcha/api.js?render=6Lepx8IUAAAAANjuT69GCDQSXSScSn9grCui1Yv1"></script>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('6Lepx8IUAAAAANjuT69GCDQSXSScSn9grCui1Yv1', {
        action: 'homepage'
      }).then(function(token) {
        ...
      });
    });

  </script>
</head>


<?php echo display_errors($errors); ?>

<body id="login-page">

  <h1>Log in Here</h1>
  <div id="login-content">
    <form action="login.php" method="post">
      Username:<br />
      <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
      Password:<br />
      <input type="password" name="password" value="" /><br />
      <input type="submit" name="submit" value="Submit" />
    </form>

    <a href="../signup.php">Need to sign up?</a>
    <!--<a href="reset.php">Forgot your password?</a>-->
  </div>
</body>

</html>
<?php include(SHARED_PATH . '/footer.php'); ?>
