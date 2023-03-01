<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
  if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  // Prepare and execute query using prepared statements
  $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
 
  $user = mysqli_fetch_assoc($result);
  if(password_verify($password, $user['password'])) {
    
    $_SESSION['user_id'] = $user['id'];
    header('Location: profile.php');
    exit();
  } else {
    
    echo "Invalid email or password.";
  }
}
?>
