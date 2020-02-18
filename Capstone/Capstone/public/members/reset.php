<?php 
require_once('../../private/initialize.php');

<?php $page_title = 'Password Reset'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
?>
<html>

<head>
  <title>Coffee-Club Password Reset</title>
</head>

<body>
  <div id="content">
    <h1>Reset your password</h1>
    <p>An email will be sent to you with instructions on how to reset your password.</p>
    <form action="includes.php" method="post">
      <input type="email" name="email" placeholder="Enter your email address">
      <button type="submit" name="reset-request-submit">Receive new password by email</button>
    </form>
    <?php 
    if(isset($_GET["reset"])){
      if($_GET["reset"] == "success"){
      echo '<p class="signupsuccess">Check your email!</p>';
    }
    }
    ?>
  </div>
</body>

</html>
<?php include(SHARED_PATH . '/footer.php'); ?>
