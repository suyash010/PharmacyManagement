<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "pharmacy";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Start
$pharmacist_id = $_POST['pharmacist_id'];
$pharmacist_name = $_POST['pharmacist_name'];
$contact_no = $_POST['contact_no'];
$license_no = $_POST['license_no'];
$prescription_id = $_POST['prescription_id'];
$pharmacy_id = $_POST['pharmacy_id'];

$sql = "INSERT INTO pharmacist (pharmacist_id, pharmacist_name, contact_no, license_no, prescription_id, pharmacy_id) 
    VALUES ('$pharmacist_id', '$pharmacist_name', '$contact_no', '$license_no', '$prescription_id', '$pharmacy_id')";

$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to pharmacist.php on success
    header("Location: pharmacist.php?status=success");
    exit();
} else {
    // Redirect to pharmacist.php with an error status
    header("Location: pharmacist.php?status=error");
    exit();
}

mysqli_close($con);

?>