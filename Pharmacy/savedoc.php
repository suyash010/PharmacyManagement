<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$doctor_id = $_POST['doctor_id'];
$doctor_name = $_POST['doctor_name'];
$speciality = $_POST['speciality'];
$licence_number = $_POST['licence_number'];

$delete_sql = "DELETE FROM doctor WHERE doctor_id = '$doctor_id'";
mysqli_query($con,$delete_sql);

$sql = "INSERT INTO doctor(doctor_id, doctor_name, speciality, licence_number) 
        VALUES ('$doctor_id','$doctor_name','$speciality','$licence_number')";

    $result = mysqli_query($con, $sql);
if ($result) {
    // Redirect to doctor.php on success
    header("Location: doctor.php?status=success");
    exit();
} else {
    // Redirect to doctor.php with an error status
    header("Location: doctor.php?status=error");
    exit();
}


?>