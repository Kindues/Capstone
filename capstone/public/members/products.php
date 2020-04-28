<?php require_once('../../private/initialize.php'); ?>


<?php
require_login();
$member_set = find_all_members();

?>
<?php $page_title = 'members'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Document</title>
  </head>

  <body>
    <div id="fanclub">
      <h1>Sleepy Beepy Bedtime Stories</h1>
      <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FChompersBand%2Fvideos%2F1012225395846184%2F&show_text=0&width=267" width="267" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
      <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FChompersBand%2Fvideos%2F232550868116915%2F&show_text=0&width=267" width="267" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
      <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FChompersBand%2Fvideos%2F535514710692227%2F&show_text=0&width=267" width="267" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
      <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FChompersBand%2Fvideos%2F245352926857354%2F&show_text=0&width=267" width="267" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"><a href="https://www.facebook.com/ChompersBand">Facebook</a></iframe>
    </div>
    <p id="cc">For closed caption please click the settings icon on the video and go to "More Video Settings" and changed your "Always Show Captions" to on.</p>

    <?php include(SHARED_PATH . '/footer.php'); ?>
