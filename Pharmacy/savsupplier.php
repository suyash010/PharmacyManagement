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
$supplier_id = $_POST['supplier_id'];
$supplier_name = $_POST['supplier_name'];
$contact_no = $_POST['contact_no'];
$address = $_POST['address'];
$medicine_id = $_POST['medicine_id'];
$inventory_id = $_POST['inventory_id'];

$sql = "INSERT INTO `supplier`(`supplier_id`, `supplier_name`, `contact_no`, `address`, `medicine_id`, `inventory_id`)
        VALUES ('$supplier_id','$supplier_name','$contact_no','$address','$medicine_id','$inventory_id')"; 

$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to supplier.php on success
    header("Location: supplier.php?status=success");
    exit();
} else {
    // Redirect to supplier.php with an error status
    header("Location: supplier.php?status=error");
    exit();

}
mysqli_close($con);
?>