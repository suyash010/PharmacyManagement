<?php
$con=mysqli_connect("localhost","root","","pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $prescription_id = $_GET['id'];
    $sql = "DELETE FROM prescription WHERE prescription_id = '$prescription_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the prescription page with a success status
        header("Location: prescription.php?status=success");
        exit();
    } else {
        // Redirect to the prescription page with an error status
        header("Location: prescription.php?status=error");
        exit();
    }
} else {
    // Redirect to the prescription page if no ID is provided
    header("Location: prescription.php?status=missing_id");
    exit();
}
mysqli_close($con);

?>