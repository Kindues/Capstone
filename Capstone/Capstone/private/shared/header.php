<?php
  if(!isset($page_title)) { $page_title = 'Member Area'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Chompers <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('../stylesheets/styles.css'); ?>" />
  </head>

  <body>
   <nav>
      <a href="../../index.html">Home</a>
      <a href="../../tour.php">Tour</a>
      <a href="../../about.html">About Us</a>
      <a href="public/signup.php">Log In</a>
    </nav>
    <header id="header-welcome">
      <h1>Welcome <?php echo $_SESSION['username'] ?? '' ?></h1>
    </header>

    <navigation>
      <ul>
       <li>User: <?php echo $_SESSION['username'] ?? '' ?></li>
        <li><a href="<?php echo url_for('/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('/members/logout.php'); ?>">Logout</a></li>
      </ul>
    </navigation>
