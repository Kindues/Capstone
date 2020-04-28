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
      if(password_verify($password, $member['pass_hash']))
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
<?php include(SHARED_PATH . '/login-header.php'); ?>

<html>

  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" media="all" href="../../css/styles.css">

    <!--*************ReCaptia v3 Script ***************-->
    <script src="https://www.google.com/recaptcha/api.js?render=6LeOSu8UAAAAAGlIToQBW_5CGQaazOEsmdPU-CMQ"></script>
    <script>
      grecaptcha.ready(function() {
        grecaptcha.execute('6LeOSu8UAAAAADg52gzXD64cvwGgVHGxk2fMGkQ6', {
          action: 'homepage'
        }).then(function(token) {
          ...
        });
        });

    </script>
  </head>


  <?php echo display_errors($errors); ?>

  <body id="login-page">
    <h1>Sign in</h1>
    <div id="login-content">
      <form action="login.php" method="post" role="form">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo h($username); ?>" id="username"><br>

        <label for="password">Password:&nbsp;</label>
        <input type="password" name="password" value="" id="password"><br><br>

        <label for="submit" class="visuallyhidden">Submit:</label>
        <input type="submit" name="submit" value="Sign in" id="submit">
      </form><br>
      <a href="../../reg.php">Need to sign up?</a>
    </div>
    <img id="sign" src="../../assets/img/wonderful-banner.jpg" alt="sign" width="1350" height="600">
  </body>

</html>
<?php include(SHARED_PATH . '/footer.php'); ?>
