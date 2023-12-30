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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Milk Production</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #cowPerformanceChart {
            height: 300px;
            width: 500px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <canvas id="cowPerformanceChart"></canvas>

    <script>
        var labels = [];
        var chartData = [];
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

        // Fetch data from the table
        $sql = "SELECT id, milk FROM profile";
        $result = $conn->query($sql);

       
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $milkProduction = $row['milk'];
                echo "labels.push('$id');";
                echo "chartData.push($milkProduction);";
            }
        }

        // Close the connection
        $conn->close();
        ?>
        var ctx = document.getElementById('cowPerformanceChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Milk (Liters)',
                    data: chartData,
                    backgroundColor: 'green',
                    barThickness: 20,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: "Daily milk production",
                        font: {
                            size: 18,
                            style: 'italic'
                        },
                        align: 'end'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>