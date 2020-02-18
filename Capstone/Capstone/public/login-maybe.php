<?php

require_once('../private/initialize.php');

$erros = [];
$username = '';
$password = '';

if(is_post_request()){
	$email = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';
	
	if(is_blank($email) || is_blank($password)){
		$errors[] = "Email or Password cannot be blanks";
	}
	
	if(empty($errors)){
		$member = find_member_by_email($email);
		
		if(password_verify($password, $member['pass_hash'])){
			echo "made to verify password";
			loginMember($member);
			redirect_to(url_for("/members/"));
		}
	}
	
	else{
		$errors[] = "email found but password does not match";
	}
	
	$_SESSION['email'] = $email;
	
	redirect_to(url_for('/index.php'));
}

$page_title = 'Login';

include(SHARED_PATH . '/header.php');
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Member Log in</title>
	</head>
	<body>

		<h1>Member Login</h1>

		 <form action="validateMember.php" method="post">
			 <div class="container">
				<label for="email"><b>Email Address:</b></label>
				<input type="text" placeholder="Enter Email" name="email">
			
				<input type="submit" class="Submit">
			</div>
		</form>
	</body>
</html>
 

