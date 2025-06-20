<?php

$con = mysqli_connect("localhost", "root", "", "pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $inventory_id = $_GET['id'];

    $sql = "DELETE FROM inventory WHERE inventory_id = '$inventory_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the inventory page with a success status
        header("Location: inventory.php?status=success");
        exit();
    } else {
        // Redirect to the inventory page with an error status
        header("Location: inventory.php?status=error");
        exit();
    }
} else {
    // Redirect to the inventory page if no ID is provided
    header("Location: inventory.php?status=missing_id");
    exit();
}

mysqli_close($con);

?>