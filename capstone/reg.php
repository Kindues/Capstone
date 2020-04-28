<?php

require_once('private/initialize.php');

if(is_post_request()){

  $member = [];
  //$member['member_ID'] = $id;
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';
  $member['username'] = $_POST['username'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['member_level'] = $_POST['member_level'] ?? '';
  $member['pass_hash'] = $_POST['pass_hash'] ?? '';


  $result = insert_member($member);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('../public/members/show.php?id=' . $new_id));
  }else{
    $errors = $result;
  }

}else{
  //display the blank form
  //redirect_to(url_for('/staff/members/new.php'));
}

$member_set = find_all_members();
$member_count = mysqli_num_rows($member_set) + 1;
mysqli_free_result($member_set);

$member = []
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Chompers Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
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
    <div id="content">

      <div class="member new">
        <h1>Sign up</h1>

        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('/public/members/new.php'); ?>" method="post">
          <dl>
            <dt>First Name</dt>
            <dd><input type="text" name="first_name" value="" /></dd>
          </dl>
          <dl>
            <dt>Last Name</dt>
            <dd><input type="text" name="last_name" value="" /></dd>
          </dl>
          <dl>
            <dt>Email</dt>
            <dd><input type="text" name="email" value="" /></dd>
          </dl>
          <dl>
            <dt>Username</dt>
            <dd><input type="text" name="username" value="" /></dd>
          </dl>
          <dl>
            <dt>Password</dt>
            <dd><input type="text" name="pass_hash" value="" /></dd>
          </dl>
          <div id="operations">
            <input type="submit" value="Sign up">
          </div>
        </form>

      </div>

    </div>

    <?php include(SHARED_PATH . '/footer.php'); ?>
