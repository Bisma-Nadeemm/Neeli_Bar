<?php
	session_start(); // Starting Session
?>

<?php
	if(isset($_SESSION["user"])!==true)
	{
        header("Location:login/login.php");
        exit;
    }
    ?>

<?php
// Database connection configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "neeli bar";

// Create a new MySQLi object
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk production record</title>
    <style>
          body {
            background-color: #f8f8f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color:#E0D800;
            font-size: 30px;
            font-weight: bold;
            padding: 10px;
            background-color: #FFFFCC;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            color: #E0D800;
            font-size: 24px;
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 250px;
            margin-bottom: 10px;
        }

        button {
            background-color: #E0D800;
            color: #FFFFFF;
            padding: 12px 22px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
            font-size: 14px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #007bff;
        }

        button[type="button"] {
            background-color: #dc3545;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #E0D800;
            color: #000000;
            font-weight: bold;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    
    <h1>Milk Production Record</h1>
    <table>
        <tr>
            <th>Cattle ID</th>
            <th>Milk Production</th>
            
        </tr>
        <?php

        $sql = "SELECT * FROM profile";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['milk'] . "</td>";
               
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>