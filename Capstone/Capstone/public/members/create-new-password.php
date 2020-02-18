<?php 
require_once('../../private/initialize.php');

<?php $page_title = 'Create New Password'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
?>
<html>

<head>
  <title>Coffee-Club Password Reset</title>
</head>

<body>
  <div id="content">
    <?php
      $selector = $_GET["selector"];
      $validator = $_GET["validator"];
    
      if(empty($selector) || empty($validator)){
        echo "Could not validate your request!";
      }else{
        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
          ?>
    <form action="reset-password.php" method="post">
      <input type="hidden" name="selector" value="<?php echo $selector?>">
      <input type="hidden" name="validator" value="<?php echo $validator?>">
      <input type="password" name="pwd" placeholder="Enter a new password...">
      <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
      <button type="submit" name="reset-password-submit">Reset Password</button>
    </form>
    <?php
        }
      }
    ?>
  </div>
</body>

</html>
<?php include(SHARED_PATH . '/footer.php'); ?>
