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
$medicine_id = $_POST['medicine_id'];
$medicine_name = $_POST['medicine_name'];
$manufacturer = $_POST['manufacturer'];
$composition = $_POST['composition'];
$type = $_POST['type'];
$expiry_date = $_POST['expiry_date'];
$mrp = $_POST['mrp'];
$quantity_available = $_POST['quantity_available'];
$prescription_id = $_POST['prescription_id'];
$supplier_id = $_POST['supplier_id'];
$inventory_id = $_POST['inventory_id'];
$order_id = $_POST['order_id'];

$sql = "INSERT INTO `medicine`(`medicine_id`, `medicine_name`, `manufacturer`, `composition`, `type`, `expiry_date`, `mrp`, `quantity_available`, `prescription_id`, `supplier_id`, `inventory_id`, `order_id`)
        VALUES ('$medicine_id','$medicine_name','$manufacturer','$composition','$type','$expiry_date','$mrp','$quantity_available','$prescription_id','$supplier_id','$inventory_id','$order_id')";

$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to medicine.php on success
    header("Location: medicine.php?status=success");
    exit();
} else {
    // Redirect to medicine.php with an error status
    header("Duplicate");
    exit();
}

mysqli_close($con);
?>
