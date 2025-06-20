<?php
$con=mysqli_connect("localhost","root","","pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $pharmacy_id = $_GET['id'];
    $sql = "DELETE FROM pharmacy WHERE pharmacy_id = '$pharmacy_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the pharmacy page with a success status
        header("Location: pharmacy.php?status=success");
        exit();
    } else {
        // Redirect to the pharmacy page with an error status
        header("Location: pharmacy.php?status=error");
        exit();
    }
} else {
    // Redirect to the pharmacy page if no ID is provided
    header("Location: pharmacy.php?status=missing_id");
    exit();
}
mysqli_close($con);
?>