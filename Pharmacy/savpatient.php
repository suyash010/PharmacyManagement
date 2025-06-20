<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy"; // Corrected database name

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$patient_address = $_POST['patient_address'];
$contact_no = $_POST['contact_no'];
$age = $_POST['age'];
$email = $_POST['email'];
$prescription_id = $_POST['prescription_id'];
$order_id = $_POST['order_id'];

// Insert data into the database
$sql = "INSERT INTO `patient`(`patient_id`, `patient_name`, `patient_address`, `contact_no`, `age`, `email`, `prescription_id`, `order_id`) 
        VALUES ('$patient_id','$patient_name','$patient_address','$contact_no','$age','$email','$prescription_id','$order_id')";

$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to patient.php on success
    header("Location: patient.php?status=success");
    exit();
} else {
    // Redirect to patient.php with an error status
    header("Location: patient.php?status=error");
    exit();
}

mysqli_close($con);
?>