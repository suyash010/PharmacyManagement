<?php

$con = mysqli_connect("localhost", "root", "", "pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $doctor_id = $_GET['id'];

    $sql = "DELETE FROM doctor WHERE doctor_id = '$doctor_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the doctor page with a success status
        header("Location: doctor.php?status=success");
        exit();
    } else {
        // Redirect to the doctor page with an error status
        header("Location: doctor.php?status=error");
        exit();
    }
} else {
    // Redirect to the doctor page if no ID is provided
    header("Location: doctor.php?status=missing_id");
    exit();
}

mysqli_close($con);

?>