<?php
  if(!isset($page_title)) { $page_title = 'Member Area'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Chompers <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('../css/styles.css'); ?>" />
  </head>

  <body>
   <nav id="nav-php">
      <a href="../../index.html">Home</a>
      <a href="../../tour.php">Tour</a>
      <a href="../../about.html">Band</a>
      <a href="../../gallery.html">Gallery</a>
      <a href="<?php echo url_for('/members/logout.php'); ?>">Logout <?php echo $_SESSION['username'] ?? 'samsmithisnew' ?></a>
    </nav>
    <header id="header-welcome">
      <h1>Welcome: <?php echo $_SESSION['username'] ?? 'samsmithisnew' ?></h1>
    </header>
