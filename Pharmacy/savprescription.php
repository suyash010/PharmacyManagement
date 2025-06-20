<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy"; // Corrected database name

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$prescription_id = $_POST['prescription_Id'];
$medicine_id = $_POST['medicine_id'];
$Dosage = $_POST['Dosage'];
$Frequency = $_POST['Frequency'];
$Duration = $_POST['Duration'];
$Instructions = $_POST['Instructions'];

$sql = "INSERT INTO `prescription`(`prescription_Id`, `medicine_id`, `Dosage`, `Frequency`, `Duration`, `Instructions`) 
        VALUES ('$prescription_Id','$medicine_id','$Dosage','$Frequency','$Duration','$Instructions')";
$result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to prescription.php on success
    header("Location: prescription.php?status=success");
    exit();
} else {
    // Redirect to prescription.php with an error status
    header("Location: prescription.php?status=error");
    exit();
}

?>