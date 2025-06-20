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
$order_id = $_POST['order_id'];
$patient_id = $_POST['patient_id'];
$pharmacist_id = $_POST['pharmacist_id'];
$order_date = $_POST['order_date'];
$delivery_date = $_POST['delivery_date'];
$medicine_id = $_POST['medicine_id'];
$sql = "INSERT INTO `order1`(`order_id`, `patient_id`, `pharmacist_id`, `order_date`, `delivery_date`, `medicine_id`)
        VALUES ('$order_id','$patient_id','$pharmacist_id','$order_date','$delivery_date','$medicine_id')";
$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to order.php on success
    header("Location: order.php?status=success");
    exit();
} else {
    // Redirect to order.php with an error status
    header("Location: order.php?status=error");
    exit();
}
mysqli_close($con);

?>