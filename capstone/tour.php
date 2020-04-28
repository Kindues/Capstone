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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="all" href="css/styles.css">
  </head>

  <body>
    <nav>
      <a href="index.html">Home</a>
      <a href="tour.php">Tour</a>
      <a href="about.html">Band</a>
      <a href="gallery.html">Gallery</a>
      <a href="public/members/login.php">Fan Club</a>
    </nav>
    <header id="cheese-banner">
      <img src="assets/img/Gen-band-banner.jpg" alt="chompers members" width="1350" height="441">
    </header>

    <main id="tour-main" role="main">
      <div class="tour-content">
        <h1>Tours</h1>
        <hr>
        <h2>Due to recent worldwide events, all tour dates will be played by ear!</h2>
        <h3>Join our fan club for our virtual content while we wait</h3>
        <img id="closed" src="assets/img/closed-1.jpg" alt="closed sign" width="900" height="600">
      </div>
      <div class="topnav">
        <form id="searchbar" method="get" action="/tour.php" role="search">
          <label for="search" class="visuallyhidden">Search</label>
          <input type="search" name="search" id="search">
          <label for="submit" class="visuallyhidden">Submit</label>
          <input type="submit" value="Search" id="submit">
        </form>
      </div>
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
    <footer>
      <p>Copyright 2020 &copy;Chompers<br>
        All Rights Reserved</p>
    </footer>
  </body>

</html>
