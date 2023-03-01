<?php
session_start();

if(!isset($_SESSION['user_id'])) {
  // User not logged in
  header('Location: login.php');
  exit();
}
// Connect to MongoDB database
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$user_id = $_SESSION['user_id'];
$filter = ['_id' => new MongoDB\BSON\ObjectID($user_id)];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $mongo->executeQuery('database_name.collection_name', $query);
$user_profile = current($cursor->toArray());
echo "Name: " . $user_profile->name . "<br>";
echo "Age: " . $user_profile->age . "<br>";
echo "DOB: " . $user_profile->dob . "<br>";
echo "Contact: " . $user_profile->contact . "<br>";
echo "Gender: " . $user_profile->gender . "<br>";
?>
