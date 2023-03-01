<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash password using bcrypt
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  // Store user information in database
  // Connect to MySQL database
  $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
  if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  // Prepare and execute query using prepared statements
  $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
  mysqli_stmt_execute($stmt);

  // Registration successful
  echo "Registration successful. Please <a href='login.php'>login</a>.";
}
?>
