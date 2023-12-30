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

// Add record to the database
if (isset($_POST['add'])) {
    $milkProduction = $_POST['cow_a_milk_production'];
    $dietPlans = $_POST['diet_plans'];
    $medicalHistory = $_POST['medical_history'];
    if($milkProduction <="0")
    {
      echo "<script>alert('quantity should be greater then 0 litre');</script>";
    }
    else if($milkProduction >"6")
    {
      echo "<script>alert('quantity should be 6 litre or less then 6 litre');</script>";
    }
    else{
    $sql = "INSERT INTO profile (id,milk,diet,medicalhistory) VALUES (NULL,'$milkProduction', '$dietPlans', '$medicalHistory')";
    

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $conn->error;
    }
}
}
// Update record in the database
if (isset($_POST['update'])) {
    $recordId = $_POST['record_id'];
    $milkProduction = $_POST['cow_a_milk_production'];
    $dietPlans = $_POST['diet_plans'];
    $medicalHistory = $_POST['medical_history'];
    if($milkProduction <="0")
    {
      echo "<script>alert('quantity should be greater then 0 litre');</script>";
    }
    else if($milkProduction >"6")
    {
      echo "<script>alert('quantity should be 6 litre or less then 6 litre');</script>";
    }
    
    else{
    $sql = "UPDATE profile SET milk='$milkProduction', diet='$dietPlans', medicalhistory='$medicalHistory' WHERE id='$recordId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
}
// Delete record from the database
if (isset($_POST['delete'])) {
    $recordId = $_POST['record_id'];

    $sql = "DELETE FROM profile WHERE id='$recordId'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of Cattle</title>
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
    <h1>Profile of Cattle</h1>
    <h2>Records</h2>
    <table>
        <tr>
            <th>Record ID</th>
            <th>Milk Production</th>
            <th>Diet Plans</th>
            <th>Medical History</th>
        </tr>
        <?php
        // Fetch all records from the database
        $sql = "SELECT * FROM profile";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['milk'] . "</td>";
                echo "<td>" . $row['diet'] . "</td>";
                echo "<td>" . $row['medicalhistory'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
    </table>
    <h2>Add Record</h2>
    <form id="add-form" method="POST">
        <label for="cow-a-milk-production">Milk Production:</label>
        <input type="text" id="cow-a-milk-production" name="cow_a_milk_production" required><br>

        <label for="diet-plans">Diet Plans:</label>
        <input type="text" id="diet-plans" name="diet_plans" required><br>

        <label for="medical-history">Medical History:</label>
        <input type="text" id="medical-history" name="medical_history" required><br>

        <button type="submit" name="add">Add</button>
    </form>

    <h2>Update Record</h2>
    <form id="update-form" method="POST">
        <label for="record-id">Record ID:</label>
        <input type="text" id="record-id" name="record_id" required><br>
        <label for="cow-a-milk-production">Milk Production:</label>
        <input type="text" id="cow-a-milk-production" name="cow_a_milk_production" required><br>

        <label for="diet-plans">Diet Plans:</label>
        <input type="text" id="diet-plans" name="diet_plans" required><br>

        <label for="medical-history">Medical History:</label>
        <input type="text" id="medical-history" name="medical_history" required><br>

        <!-- Display existing record details here -->

        <button type="submit" name="update">Update</button>
        <button type="button" onclick="clearUpdateForm()">Clear</button>
    </form>

    <h2>Delete Record</h2>
    <form id="delete-form" method="POST">
        <label for="record-id">Record ID:</label>
        <input type="text" id="record-id" name="record_id" required><br>

        <button type="submit" name="delete">Delete</button>
    </form>

    <script>
        function clearUpdateForm() {
            document.getElementById("update-form").reset();
        }
    </script>
</body>

</html>











