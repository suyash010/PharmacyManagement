<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "pharmacy";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$pharmacy_id = $_POST['pharmacy_id'];
$address = $_POST['address'];
$contact_no = $_POST['contact_no'];

// Check if an entry with the same pharmacy_id exists and delete it
$delete_sql = "DELETE FROM `pharmacy` WHERE `pharmacy_id` = '$pharmacy_id'";
mysqli_query($con, $delete_sql);

// Insert the new entry
$sql = "INSERT INTO `pharmacy`(`pharmacy_id`, `address`, `contact_no`) VALUES ('$pharmacy_id','$address','$contact_no')";
$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to pharmacy.php on success
    header("Location: pharmacy.php?status=success");
    exit();
} else {
    // Redirect to pharmacy.php with an error status
    header("Location: pharmacy.php?status=error");
    exit();
}

?>