<?php require_once('private/initialize.php'); ?>


  <?php    $tour_set = find_all_tours();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Chompers Tours</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <link rel="stylesheet" media="all" href="css/styles.css">
</head>

<body>

  <nav>
    <a href="index.html">Home</a>
    <a href="tour.html">Tour</a>
    <a href="about.html">About Us</a>
    <a href="public/members/login.php">Log In</a>
  </nav>
  <header id="cheese-banner">
    <div id="overlay"></div>
    <img src="assets/img/cheese-banner.jpg" alt="chompers members" width="880" height="228">
  </header>
  <main id="tour-main">
    <div class="tour-content">
      <h1>Tours</h1>
    </div>
    <!--<div class="video-chompers-tour">
      <div class="video-container-tour">
        <video autoplay loop muted id="tour-vid">
          <source src="assets/video/chompers-C.mp4" type="video/mp4">
        </video>
      </div>

      <div class="tour-content">
        <h1>Tours</h1>
      </div>
    </div>-->
    <table class="tourlist">
      <tr>
        
        <th>Venue</th>
        <th>Date and Time</th>
        <th>Town</th>
        <th>State</th>
      </tr>    
      <?php while($tour = mysqli_fetch_assoc($tour_set)) { ?>
      <tr>   
        <td><?php echo h($tour['venue']); ?></td>
        <td><?php echo h($tour['date_time']); ?></td>
        <td><?php echo h($tour['town']); ?></td>
        <td><?php echo h($tour['state']); ?></td>
      </tr>
      <?php } ?>
    </table>

  </main>
</body>

</html>
