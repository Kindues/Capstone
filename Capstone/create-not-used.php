<?php require_once('../../private/initialize.php'); 

if(is_post_request()){
	
  
  $member = [];
  $member['member_id'] = $id;
  $member['first_name'] = $_POST['first_name'] ?? '';
  $member['last_name'] = $_POST['last_name'] ?? '';
  $member['email'] = $_POST['email'] ?? '';
  $member['phone'] = $_POST['phone'] ?? '';
  $member['member_level'] = $_POST['member_level'] ?? '';
	
	
  $result = insert_member($member);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/members/show.php?id=' . $new_id));
  }else{
    $errors = $result;
  }

}else{
	redirect_to(url_for('/staff/members/new.php'));
}
?>