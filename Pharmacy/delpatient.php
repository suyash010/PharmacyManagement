<?php

$con = mysqli_connect("localhost", "root", "", "pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) { // Ensure the parameter matches the one in the button
    $patient_id = $_GET['id'];

    $sql = "DELETE FROM patient WHERE patient_id = '$patient_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the patient page with a success status
        header("Location: patient.php?status=success");
        exit();
    } else {
        // Redirect to the patient page with an error status
        header("Location: patient.php?status=error");
        exit();
    }
} else {
    // Redirect to the patient page if no ID is provided
    header("Location: patient.php?status=missing_id");
    exit();
}

mysqli_close($con);
?>