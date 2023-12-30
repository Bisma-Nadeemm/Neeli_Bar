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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Temperature</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #FFFFFF;
            font-size: 30px;
            font-weight: bold;
            padding: 10px;
            background-color: #E0D800;
            margin-bottom: 20px;
        }

        .milk-temperature {
            margin-bottom: 10px;
        }

        .milk-temperature a {
            display: inline-block;
            background-color: #4CAF50;
            color: #FFFFFF;
            padding: 10px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .milk-temperature a:hover {
            background-color: #45a049;
        }
        h1{text-align:center ;}
    </style>
</head>

<body>
    <h1 >Milk Temperature</h1>

    <div class="milk-temperature">
        <?php
        // Update the database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "neeli bar";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch milk temperature from the table
        $sql = "SELECT temperature FROM milktemperature";
        $result = $conn->query($sql);

        // Display milk temperature along with an <a> tag
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $temperature = $row['temperature'];
                echo "<a href=\"#\">Milk Temperature: $temperature °C</a>";
            }
        } else {
            echo "No milk temperature data found.";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</body>

</html>
