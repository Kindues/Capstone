<?php

  // members

  function find_all_members() {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "ORDER BY member_id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_member_by_id($id) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE member_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member; // returns an assoc. array
  }

  function find_member_by_email($email) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE email='" . $email . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member; // returns an assoc. array
  }

  function find_member_by_username($username) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "'";
    $sql .= "AND member_level = 'm'";
    
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member; // returns an assoc. array
  }

  function validate_member($member) {
    $errors = [];

    // menu_name
    if(is_blank($member['first_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($member['first_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }
    
    if(is_blank($member['last_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($member['last_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }
    
    if(is_blank($member['email'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($member['email'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    
    //if(is_blank($member['phone'])) {
    //  $errors[] = "Name cannot be blank.";
    //} elseif(!has_length($member['phone'], ['min' => 2, 'max' => 255])) {
    //  $errors[] = "Name must be 10 numbers.";
    //}
    
    //if(is_blank($member['member_level'])) {
    //  $errors[] = "Name cannot be blank.";
    //} elseif(!has_length($member['member_level'], ['min' => 1, 'max' => 1])) {
    //  $errors[] = "Member Level must be 1 character.";
    //}

    return $errors;
  }

  function insert_member($member) {
    global $db;

    $errors = validate_member($member);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO members ";
	$sql .= "(first_name, last_name, email, username, phone, member_level) ";
	$sql .= "VALUES( ";
	$sql .= "'" . $member['first_name'] . "',";
	$sql .= "'" . $member['last_name'] . "',";
	$sql .= "'" . $member['email'] . "',";
	$sql .= "'" . $member['username'] . "',";
	$sql .= "'" . $member['phone'] . "',";
	$sql .= "'" . $member['member_level'] . "'";
	$sql .= ")";
	$result = mysqli_query($db, $sql);
	//for insert statments results is true/false
	if($result){
		return true;
	}else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
  }

  function update_member($member) {
    global $db;

    $errors = validate_member($member);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE members SET ";
    $sql .= "first_name='" . $member['first_name'] . "', ";
    $sql .= "last_name='" . $member['last_name'] . "', ";
    $sql .= "email='" . $member['email'] . "', ";
    $sql .= "username='" . $member['username'] . "', ";
    $sql .= "phone='" . $member['phone'] . "' ";
    $sql .= "member_level='" . $member['member_level'] . "' ";
    $sql .= "WHERE member_id='" . $member['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_member($id) {
    global $db;

    $sql = "DELETE FROM members ";
    $sql .= "WHERE member_ID='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

	function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE member_level = 'a'";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "AND member_level = 'a'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

	function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "AND member_level = 'a'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
  }

  function validate_admin($admin, $options=[]) {

		$password_required = $options['password_required'] ?? true;
		
    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
      $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

		if($password_required){
			if(is_blank($admin['password'])) {
				$errors[] = "Password cannot be blank.";
			} elseif (!has_length($admin['password'], array('min' => 12))) {
				$errors[] = "Password must contain 12 or more characters";
			} elseif (!preg_match('/[A-Z]/', $admin['password'])) {
				$errors[] = "Password must contain at least 1 uppercase letter";
			} elseif (!preg_match('/[a-z]/', $admin['password'])) {
				$errors[] = "Password must contain at least 1 lowercase letter";
			} elseif (!preg_match('/[0-9]/', $admin['password'])) {
				$errors[] = "Password must contain at least 1 number";
			} elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
				$errors[] = "Password must contain at least 1 symbol";
			}

			if(is_blank($admin['confirm_password'])) {
				$errors[] = "Confirm password cannot be blank.";
			} elseif ($admin['password'] !== $admin['confirm_password']) {
				$errors[] = "Password and confirm password must match.";
			}
		}
    return $errors;
  }

  function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_admin($admin) {
    global $db;

		$password_sent = !is_blank($admin['password']);
			
    $errors = validate_admin($admin, ['password_required' => $password_sent]);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
		if($password_sent) {
    	$sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
		}
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_admin($admin) {
    global $db;

    $sql = "DELETE FROM members ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "AND member_level = 'a'";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

function find_all_tours() {
    global $db;

    $sql = "SELECT * FROM tour ";
    $sql .= "ORDER BY tour_id ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

function find_tour_by_id($id) {
    global $db;

    $sql = "SELECT * FROM tour ";
    $sql .= "WHERE tour_id ='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $tour; // returns an assoc. array
  }

?>
