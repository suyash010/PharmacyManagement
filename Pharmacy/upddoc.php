<?php
// filepath: d:\Programs\htdocs\Pharmacy\updpharmacy.php

$con = mysqli_connect("localhost", "root", "", "pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the pharmacy ID is provided
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];

    // Fetch the pharmacy details
    $sql = "SELECT * FROM doctor WHERE doctor_id = '$doctor_id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No doctor found with the given ID.";
        exit();
    }
} else {
    echo "No doctor ID provided.";
    exit();
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 1em;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-actions {
            text-align: right;
            margin-top: 20px;
        }

        .form-actions button {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-actions button[type="submit"] {
            background-color: #28a745;
            color: white;
        }

        .form-actions button[type="submit"]:hover {
            background-color: #1e7e34;
        }

        .form-actions button[type="button"] {
            background-color: #dc3545;
            color: white;
            margin-right: 10px;
        }

        .form-actions button[type="button"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Doctor</h2>
        <form id="update-doctor-form" action="savedoc.php" method="POST">

            <div class="form-group">
                <label for="doctor-id">Doctor ID</label>
                <input type="text" id="doctor-id" name="doctor_id" value="<?php echo $row['doctor_id']; ?>" required>
            </div>

            <div class="form-group">
                <label for="doctor-name">Doctor Name</label>
                <input type="text" id="doctor-name" name="doctor_name" value="<?php echo $row['doctor_name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="speciality">Speciality</label>
                <input type="text" id="speciality" name="speciality" value="<?php echo $row['speciality']; ?>" required>
            </div>

            <div class="form-group">
                <label for="licence-number">Licence No</label>
                <input type="number" id="license-number" name="licence_number" value="<?php echo $row['licence_number']; ?>" required>
            </div>

            <div class="form-group">
                <label for="licence">Licence</label>
                <input type="number" id="licence" name="licence_number" required>
            </div>
            
            <div class="form-actions">
                <button type="submit">Update Doctor</button>
                <button type="button" onclick="window.location.href='doctor.php'">Cancel</button>
            </div>

        </form>
    </div>
</body>
</html>