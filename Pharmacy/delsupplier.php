<?php

$con=mysqli_connect("localhost","root","","pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}  
if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $supplier_id = $_GET['id'];
    $sql = "DELETE FROM supplier WHERE supplier_id = '$supplier_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the supplier page with a success status
        header("Location: supplier.php?status=success");
        exit();
    } else {
        // Redirect to the supplier page with an error status
        header("Location: supplier.php?status=error");
        exit();
    }
} else {
    // Redirect to the supplier page if no ID is provided
    header("Location: supplier.php?status=missing_id");
    exit();
}
mysqli_close($con);
?>