<?php
$con = mysqli_connect("localhost", "root", "", "pharmacy");



if (isset($_GET['medicine_id'])) {
    $medicine_id = $_GET['medicine_id'];

    $sql = "DELETE FROM medicine WHERE medicine_id = '$medicine_id'";
    if (mysqli_query($con, $sql)) {
        // Redirect to the medicine page with a success status
        echo "Medicine deleted successfully";
        exit();
    }
}

mysqli_close($con);
?>
