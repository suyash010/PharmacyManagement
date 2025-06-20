<?php

$con = mysqli_connect("localhost", "root", "", "pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $order_id = $_GET['id'];
    $sql = "DELETE FROM order1 WHERE order_id = '$order_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the order page with a success status
        header("Location: order.php?status=success");
        exit();
    } else {
        // Redirect to the order page with an error status
        header("Location: order.php?status=error");
        exit();
    }
} else {
    // Redirect to the order page if no ID is provided
    header("Location: order.php?status=missing_id");
    exit();
}
mysqli_close($con);
?>

