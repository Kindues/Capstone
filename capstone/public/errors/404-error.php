<?php
include_once('../../private/initialize.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Chompers || About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" media="all" href="../../css/styles.css">
  </head>

  <body>
    <header>
      <nav>
        <a href="../../index.html">Home</a>
        <a href="../../tour.php">Tour</a>
        <a href="../../about.html">Band</a>
        <a href="../../gallery.html">Gallery</a>
        <a href="../members/login.php">Fan Club</a>
      </nav>
    </header>

    <body>
      <div class="error">
        <img src="<?= url_for('../assets/img/404-error.jpg'); ?>" height="200" width="200" alt="404 picture" id="error">
        <h2>Oops, Something went wrong.</h2>
        <h2>This is not our jam!</h2>
        <iframe src="https://giphy.com/embed/98EBb55L7GoQ8" width="480" height="271" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
      </div>
    </body>
    <?php include(SHARED_PATH . '/footer.php'); ?>
