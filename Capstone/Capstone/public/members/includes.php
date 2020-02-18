<?php
require_once('../../private/initialize.php');
if(isset($_POST[reset-request-submit])) {
  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);
  
  $url = "www.cravenmore.com/web250/coffee-club/public/members/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
  
  $expires = date("U") + 1800;
  
  $userEmail = $_POST["email"];
  $sql = 'delete from pwdreset where pwdResetEmail = ?';
  
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "There was an error";
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt):
  }
  
  $sql = "insert into pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) Values (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "There was an error";
    exit();
  }else {
    $hashedToken = password_has($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt):
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close();
  
  $to = $userEmail;
  
  $subject = 'Reset your password for Cravenmore Chompers';
  
  $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
  
  $message .= '<p>Here is your password reset link: <br>';
  $message .= '<a href="' . $url . '">' . $url . '</a></p>';
  
  $headers = "From: Cravenmore <admin@cravenmore.com>\r\n";
  $headers .= "Reply-To: admin@cravenmore.com\r\n";
  $headers .= "Content-type: text/html\r\n";
  
  mail($to, $subject, $message, $headers);
  
  header("Location: reset.php?reset=success");
  
}else {
  header('Location: index.php');
}

?>