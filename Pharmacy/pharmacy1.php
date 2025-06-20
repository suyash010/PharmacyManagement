<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy System - Pharmacy Branches</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hamburger-menu span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
        }

        h1 {
            font-size: 1.8rem;
        }

        nav.horizontal-nav {
            background-color: #333;
            padding: 0.5rem 2rem;
            color: white;
        }

        main {
            padding: 2rem;
        }

        h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .pharmacy-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            align-items: center;
        }

        .pharmacy-actions input {
            padding: 0.5rem;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .pharmacy-actions button {
            padding: 0.5rem 1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .pharmacy-actions button:hover {
            background-color: #45a049;
        }

        .pharmacy-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .pharmacy-list th,
        .pharmacy-list td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: left;
        }

        .pharmacy-list th {
            background-color: #f2f2f2;
        }

        .pharmacy-list tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .pharmacy-list tbody tr:hover {
            background-color: #f1f1f1;
        }

        .pharmacy-list a {
            color: #007BFF;
            text-decoration: none;
        }

        .pharmacy-list a:hover {
            text-decoration: underline;
        }

        .no-results {
            color: red;
            margin-top: 1rem;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #eee;
            margin-top: 2rem;
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
        <h1>Pharmacy Branches</h1>
    </header>

    <nav class="horizontal-nav">
        <!-- Your navigation links go here -->
    </nav>

    <main>
        <h2>Pharmacy Branches</h2>
        <section class="pharmacy-actions">
            <button onclick="window.location.href='Pharmacy-form.html'">Add New Branch</button>
            <input type="text" id="search-input" placeholder="Search Branches...">
            <button id="search-button">Search</button>
        </section>
        <section class="pharmacy-list">
            <table id="pharmacy-table">
                <thead>
                    <tr>
                        <th>Pharmacy_id</th>
                        <th>Address</th>
                        <th>Contact_no</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="pharmacy-table-body">
                    <!-- Data will be populated dynamically -->
                </tbody>
                
            </table>
            <p id="no-results-message" class="no-results" style="display:none;">No branches found.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Pharmacy System</p>
    </footer>

    
    
</body>
</html>
