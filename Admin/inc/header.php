<?php
include('db_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - <?php echo $page_title; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/common.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <style>
        body {
            background: #f8f9fa;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            background: linear-gradient(to right, #74ebd5, #acb6e5); 
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto;
            color: #fff; /* Text color */
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 40px); 
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar h4 {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            background-color: #5446d2; 
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul {
            padding-left: 0;
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a{
            display: block;
            padding: 10px 15px;
            color: #000; /* Text color */
            border-radius: 5px;
            transition: background-color 0.3s;
            font-weight: bold; /* Bold font weight */
        }


        .sidebar ul li a:hover {
            background-color: #2BC6A1; /* Darker shade on hover */
        }

        .sidebar-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
           
        }
    

        .sidebar-footer button {
            border-radius: 5px;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
        }

        .welcome-text {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .admin-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="sidebar-sticky">
        <h4 class="fw-bold bg-dark text-center p-2">ADMIN PANEL</h4>
        <ul class="nav flex-column mt-5">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="features.php">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="message.php">Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bookings.php">Bookings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="settings.php">Settings</a>
            </li>
            <li>
                <div class="sidebar-footer">
                    <a href="logout.php" class="btn btn-info btn-block mb-5">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>