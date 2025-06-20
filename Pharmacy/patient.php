<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Patient</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 1em 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 11;
        }

        header h1 {
            margin: 0;
        }

        .hamburger-menu {
            display: block;
            cursor: pointer;
            font-size: 1.5em;
            position: absolute;
            left: 20px;
        }

        .hamburger-menu span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
            transition: 0.4s;
        }

        .hamburger-menu.open span:nth-child(1) {
            transform: translateY(8px) rotate(-45deg);
        }

        .hamburger-menu.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger-menu.open span:nth-child(3) {
            transform: translateY(-8px) rotate(45deg);
        }

        .horizontal-nav {
            display: block;
            width: 200px;
            background-color: #333;
            color: white;
            position: fixed;
            top: 0;
            left: -200px;
            height: 100%;
            padding-top: 60px;
            z-index: 10;
            transition: transform 0.3s ease-in-out;
        }

        .horizontal-nav.open {
            transform: translateX(200px);
        }

        .horizontal-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .horizontal-nav ul li {
            border-bottom: 1px solid #555;
        }

        .horizontal-nav ul li:last-child {
            border-bottom: none;
        }

        .horizontal-nav ul li a {
            display: block;
            color: white;
            padding: 15px 20px;
            text-decoration: none;
        }

        .horizontal-nav ul li a:hover {
            background-color: #555;
        }

        main {
            padding: 20px;
            margin-left: 0;
            flex-grow: 1;
            transition: margin-left 0.3s ease-in-out;
        }

        main.sidebar-open {
            margin-left: 200px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 1em;
        }

        /* Specific styles for the Patient page content */
        .patient-actions {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .patient-actions input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex-grow: 1;
        }

        .patient-actions button {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .patient-actions button:hover {
            background-color: #1e7e34;
        }

        .patient-list {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .patient-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .patient-list th, .patient-list td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .patient-list th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .patient-list tbody tr:hover {
            background-color: #f0f0f0;
        }

        .patient-list tbody td a {
            text-decoration: none;
            color: #007bff;
            margin-right: 5px;
        }

        .patient-list tbody td button {
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
        }

        .patient-list tbody td button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <h1>Patient</h1>
    </header>

    <nav class="horizontal-nav">
    <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="patient.php">Patient</a></li>
            <li><a href="doctor.php">Doctor</a></li>
            <li><a href="prescription.php">Prescription</a></li>
            <li><a href="medicine.php">Medicine</a></li>
            <li><a href="pharmacist.php">Pharmacist</a></li>
            <li><a href="supplier.php">Supplier</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="inventory.php">Inventory</a></li>
            <li><a href="pharmacy.php">Pharmacy</a></li>
        </ul>
    </nav>

    <main>
        <h2>Patient Management</h2>
        <section class="patient-actions">
            <button onclick="location.href='Patient-form.html'">Add New Patient</button>
            <input type="text" placeholder="Search Patients...">
            <button>Search</button>
        </section>
        <section class="patient-list">
            <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Patient Address</th>
                        <th>Contact No</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Prescription ID</th>
                        <th>Order ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
               
                <?php

                $con = mysqli_connect("localhost", "root", "", "pharmacy");
                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }  
                $sql = "SELECT * FROM patient";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['patient_id'] . "</td>";
                        echo "<td>" . $row['patient_name'] . "</td>";
                        echo "<td>" . $row['patient_address'] . "</td>";
                        echo "<td>" . $row['contact_no'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['prescription_id'] . "</td>";
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td><button onclick=\"location.href='delpatient.php?id=" . $row['patient_id'] . "'\">Remove</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No patients found.</td></tr>";
                }


                ?>
            </table>
        </section>
    </main>

    <script>
        const header = document.querySelector('header');
        const horizontalNav = document.querySelector('.horizontal-nav');
        const mainContent = document.querySelector('main');
        const hamburgerMenu = document.querySelector('.hamburger-menu');

        if (hamburgerMenu && horizontalNav && mainContent) {
            hamburgerMenu.addEventListener('click', () => {
                horizontalNav.classList.toggle('open');
                mainContent.classList.toggle('sidebar-open');
                hamburgerMenu.classList.toggle('open');
            });
        }

        // JavaScript for Patient page functionality would go here
    </script>
</body>
</html>

