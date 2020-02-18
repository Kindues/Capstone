<?php
include_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');
?>

<body>
  <div class="error">
    <img src="<?= url_for('../assets/img/wall-creature.jpg'); ?>" alt="Cartoon creature">
    <h2>Oops, Something went wrong.</h2>
    <p>We're having technical difficulties.</p>
    <p>Click <a href="<?= url_for('../../index.php'); ?>" title="Home">here</a> to go back to the home page</p>
  </div>
</body>
<?php include(SHARED_PATH . '/footer.php'); ?>
