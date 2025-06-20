<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Prescription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: stretch;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        header h1 {
            margin: 0;
            font-size: 1.8em;
        }

        .hamburger-menu {
            display: block;
            cursor: pointer;
            font-size: 1.5em;
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
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
            display: none;
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 60px;
            z-index: 10;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .horizontal-nav.open {
            display: block;
            transform: translateX(0);
        }

        .horizontal-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .horizontal-nav ul li {
            border-bottom: 1px solid #4a5568;
        }

        .horizontal-nav ul li:last-child {
            border-bottom: none;
        }

        .horizontal-nav ul li a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .horizontal-nav ul li a:hover {
            background-color: #4a5568;
        }

        main {
            padding: 20px;
            margin-left: 0;
            flex-grow: 1;
            transition: margin-left 0.3s ease-in-out;
        }

        main.sidebar-open {
            margin-left: 250px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 1.5em;
            font-size: 2em;
        }

        .prescription-actions {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
        }

        .prescription-actions input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1 1 200px;
            min-width: 150px;
        }

        .prescription-actions button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            white-space: nowrap;
        }

        .prescription-actions button:hover {
            background-color: #0056b3;
        }

        .prescription-list {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .prescription-list table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .prescription-list th, .prescription-list td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .prescription-list th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .prescription-list tbody tr:hover {
            background-color: #f0f0f0;
        }

        .prescription-list tbody td a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
            transition: color 0.2s ease;
            display: inline-flex;
            align-items: center;
        }

        .prescription-list tbody td a:hover {
            color: #004080;
        }

        .prescription-list tbody td button {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.2s ease;
            white-space: nowrap;
        }

        .prescription-list tbody td button:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .prescription-actions {
                flex-direction: column;
                align-items: flex-start;
            }
            .prescription-actions input[type="text"],
            .prescription-actions button {
                flex: 1 1 auto;
                min-width: auto;
            }
            header h1{
                font-size: 1.5em;
            }
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
        <h1>Prescription</h1>
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
        <h2>Prescription Management</h2>
        <section class="prescription-actions">
            <button onclick="location.href='Prescription-form.html'">Add New Prescription</button>
            <input type="text" placeholder="Search Prescriptions...">
            <button>Search</button>
        </section>
        <section class="prescription-list">
            <table>
                <thead>
                    <tr>
                        <th>PrescriptionID</th>
                        <th>Medicine ID</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Duration</th>
                        <th>Instructions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="prescription-table-body">
                    <?php
                        // Database connection
                        $con = mysqli_connect("localhost", "root", "", "pharmacy");
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch prescription data from the database
                        $sql = "SELECT * FROM prescription";
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['prescription_Id'] . "</td>";
                                echo "<td>" . $row['medicine_id'] . "</td>";
                                echo "<td>" . $row['Dosage'] . "</td>";
                                echo "<td>" . $row['Frequency'] . "</td>";
                                echo "<td>" . $row['Duration'] . "</td>";
                                echo "<td>" . $row['Instructions'] . "</td>";
                                echo "<td>";
                                echo "<a href='delprescription.php?id=" . $row['prescription_Id'] . "' onclick=\"return confirm('Are you sure you want to delete this prescription?');\">Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No prescriptions found.</td></tr>";
                        }

                        mysqli_close($con);
                    ?>
                </tbody>
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
                if (horizontalNav.classList.contains('open')) {
                    horizontalNav.style.display = 'block';
                } else {
                    horizontalNav.style.display = 'none';
                }
            });
        }
        document.addEventListener('click', (event) => {
            if (horizontalNav.classList.contains('open') && !horizontalNav.contains(event.target) && event.target !== hamburgerMenu) {
                horizontalNav.classList.remove('open');
                mainContent.classList.remove('sidebar-open');
                hamburgerMenu.classList.remove('open');
                horizontalNav.style.display = 'none';
            }
        });
    </script>
</body>
</html>

