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
    <title>Milk Production Chart</title>
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
            background-color: #FFCC00;
            margin-bottom: 20px;
        }

        .chart-container {
            max-width: 800px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .bar {
            background-color: #4CAF50;
            height: 30px;
            margin-bottom: 10px;
            transition: width 0.5s;
        }
    </style>
</head>

<body>
    <h1>Milk Production Chart</h1>

    <div class="chart-container">
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

        // Prepare and execute the SQL query
        $sql = "SELECT id, milk FROM profile";
        $result = $conn->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Create empty arrays for labels and data
            $labels = array();
            $data = array();

            // Fetch data from each row and populate the arrays
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $milkProduction = $row["milk"];

                $labels[] = $id;
                $data[] = $milkProduction;
            }

            // Calculate the maximum value for scaling
            $maxValue = max($data);

            // Create bars for each data point
            for ($i = 0; $i < count($data); $i++) {
                $barWidth = ($data[$i] / $maxValue) * 100;
                echo "<div class='bar' style='width: $barWidth%;'></div>";
                echo "<span>$labels[$i]</span><br>";
            }
        } else {
            echo "No records found.";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</body>

</html>