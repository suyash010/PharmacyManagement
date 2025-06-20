<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #e0f7fa, #ffffff);
            color: #333;
            display: flex;
        }
        
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to right, #1abc9c, #16a085);
            color: white;
            padding: 1em 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 11;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
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
            width: 220px;
            color: white;
            position: fixed;
            top: 0;
            left: -220px;
            height: 100%;
            padding-top: 60px;
            z-index: 10;
            transition: transform 0.3s ease-in-out;
        }
        
        .horizontal-nav.open {
            transform: translateX(220px);
        }
        
        .horizontal-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .horizontal-nav ul li a {
            display: block;
            color: rgb(14, 13, 13);
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.2s;
        }
        
        .horizontal-nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        main {
            padding: 90px 20px 20px 20px;
            margin-left: 0;
            flex-grow: 1;
            transition: margin-left 0.3s ease-in-out;
        }
        
        main.sidebar-open {
            margin-left: 220px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 1em;
            color: #16a085;
        }
        
        .widgets {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .widget {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s ease;
        }
        
        .widget:hover {
            transform: translateY(-5px);
        }
        
        .widget h3 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 1.2em;
        }
        
        .widget p {
            font-size: 2em;
            font-weight: bold;
            color: #27ae60;
        }
        
        .widget a {
            background-color: #1abc9c;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 10px 15px;
            border-radius: 8px;
            margin-top: 10px;
            transition: background 0.2s;
        }
        
        .widget a:hover {
            background-color: #21618c;
        }
        
        .widget ul#low-stock-list {
            list-style: none;
            padding: 0;
            text-align: left;
        }
        
        .widget ul#low-stock-list li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
            color: #e74c3c;
        }
        
        footer {
            text-align: center;
            padding: 1em;
            background-color: #1abc9c;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
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
        <h1>Pharmacy System</h1>
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
        <h2>Dashboard Overview</h2>
        
        <section class="widgets">
            <div class="widget">
                <h3>Total Patients</h3>
                <p id="total-patient-count">

                    <?php
                     
                    $conn = new mysqli("localhost", "root", "", "pharmacy");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT COUNT(*) as total FROM patient";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['total'];
                    } else {
                        echo "0 results";
                    }
                    $conn->close(); 
                    ?>
                </p>
                <a href="patient.php">View Details</a>
            </div>
            <div class="widget">
                <h3>Pending Refills</h3>
                <p id="pending-refill-count">


                <?php
                     
                     $conn = new mysqli("localhost", "root", "", "pharmacy");
                     if ($conn->connect_error) {
                         die("Connection failed: " . $conn->connect_error);
                     }
                     $sql = "SELECT COUNT(*) as total FROM inventory WHERE quantity < 10";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                         $row = $result->fetch_assoc();
                         echo $row['total'];
                     } else {
                         echo "0 results";
                     }
                     $conn->close(); 
                     ?>


                </p>
                <a href="inventory.php">View Details</a>
            </div>
            <div class="widget">
                <h3>Low Stock Items</h3>
                <ul id="low-stock-list">
                    <li>Medicine A (3)</li>
                    <li>Medicine B (1)</li>
                </ul>
                <a href="/inventory?stock=low">View Details</a>
            </div>
            <div class="widget">
                <h3>Total Orders</h3>
                <p id="todays-order-count">

                <?php
                     
                     $conn = new mysqli("localhost", "root", "", "pharmacy");
                     if ($conn->connect_error) {
                         die("Connection failed: " . $conn->connect_error);
                     }
                     $sql = "SELECT COUNT(*) as total FROM order1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                         $row = $result->fetch_assoc();
                         echo $row['total'];
                     } else {
                         echo "0 results";
                     }
                     $conn->close(); 
                     ?>

                     
                </p>
                <a href="order.php">View Details</a>
            </div>
        </section>
        <p><br></p>
          <!-- Insert graph image under the tabs -->
        <div style="text-align:center; margin-bottom: 10px;">
            <img src="graph.png" alt="Dashboard Graph" style="max-width:60%;height:400px;">
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Pharmacy System</p>
    </footer>

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
    </script>
</body>
</html>
