<?php

require_once('../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php'));
}
$id = $_GET['id'] ?? '1';
 
if(is_post_request()) {

  // Handle form values sent by new.php

  $member = [];
  $member['member_ID'] = $id;
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';
  $member['username'] = $_POST['username'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['member_level'] = $_POST['member_level'] ?? '';

  $result = update_member($member);
  if($result === true){
  redirect_to(url_for('/members/show.php?id=' . $id));
    }else{
    $erros = $result;
    
  }
} else {

  $member = find_member_by_id($id);

$member_set = find_all_members();
$member_count = mysqli_num_rows($member_set);
mysqli_free_result($member_set);
}


?>

<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="member edit">
    <h1>Edit Member</h1>

<?php echo display_errors($errors); ?> 
    <form action="<?php echo url_for('/members/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($member['first_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($member['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo h($member['email']); ?>" /></dd>
      </dl>
       <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($member['username']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Phone</dt>
        <dd><input type="text" name="phone" value="<?php echo h($member['phone']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Member Level</dt>
        <dd><input type="text" name="member_level" value="<?php echo h($member['member_level']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Member" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
