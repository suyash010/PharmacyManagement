<?php
// filepath: d:\Programs\htdocs\Pharmacy\updpharmacy.php

$con = mysqli_connect("localhost", "root", "", "pharmacy");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the pharmacy ID is provided
if (isset($_GET['id'])) {
    $pharmacy_id = $_GET['id'];

    // Fetch the pharmacy details
    $sql = "SELECT * FROM pharmacy WHERE pharmacy_id = '$pharmacy_id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No pharmacy found with the given ID.";
        exit();
    }
} else {
    echo "No pharmacy ID provided.";
    exit();
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pharmacy</title>
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
        <h2>Update Pharmacy</h2>
        <form id="update-pharmacy-form" action="savpharmacy.php" method="POST">
            <div class="form-group">
                <label for="pharmacy-id">Pharmacy ID</label>
                <input type="text" id="pharmacy-id" name="pharmacy_id" value="<?php echo $row['pharmacy_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required><?php echo $row['address']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="contact-no">Contact No</label>
                <input type="text" id="contact-no" name="contact_no" value="<?php echo $row['contact_no']; ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit">Update Pharmacy</button>
                <button type="button" onclick="window.location.href='pharmacy.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>