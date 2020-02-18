<?php

require_once('../../private/initialize.php');

require_login();

if(is_post_request()){
	
  $member = [];
  //$member['member_ID'] = $id;
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';
  $member['username'] = $_POST['username'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['member_level'] = $_POST['member_level'] ?? '';
	
	
  $result = insert_member($member);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/members/show.php?id=' . $new_id));
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
  //$member[""] = $member_count;
?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member new">
    <h1>Create Member</h1>
    
    <?php echo display_errors($errors); ?>
    <form action="<?php echo url_for('/members/new.php'); ?>" method="post">
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
        <dt>Phone</dt>
        <dd><input type="text" name="phone" value="" /></dd>
      </dl>
      <dl>
        <dt>Member Level</dt>
        <dd><input type="text" name="member_level" value="" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create member">


      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
