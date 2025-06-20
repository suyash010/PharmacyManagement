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
$inventory_id = $_POST['inventory_id'];
$pharmacy_id = $_POST['pharmacy_id'];
$medicine_id = $_POST['medicine_id'];
$supplier_id = $_POST['supplier_id'];
$quantity = $_POST['quantity'];
$expiry_date = $_POST['expiry_date'];

$sql = "INSERT INTO `inventory`(`inventory_id`, `pharmacy_id`, `medicine_id`, `supplier_id`, `quantity`, `expiry_date`)
        VALUES ('$inventory_id','$pharmacy_id','$medicine_id','$supplier_id','$quantity','$expiry_date')";
$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to inventory.php on success
    header("Location: inventory.php?status=success");
    exit();
} else {
    // Redirect to inventory.php with an error status
    header("Location: inventory.php?status=error");
    exit();
}



?>