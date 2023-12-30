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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "neeli bar";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql1 = "SELECT medicalhistory, id FROM profile";
$result1 = $conn->query($sql1);


$sql2 = "SELECT medicalemergency, diet FROM dietplan";
$result2 = $conn->query($sql2);


if ($result1 && $result2) {
    
    $values1 = $result1->fetch_all(MYSQLI_ASSOC);
    $values2 = $result2->fetch_all(MYSQLI_ASSOC);

    
    $matchFound = false;
    $matchedIDs = array();
    $matchedDiets = array();

    
    foreach ($values1 as $row1) {
        foreach ($values2 as $row2) {
            
            if ($row1['medicalhistory'] == $row2['medicalemergency']) {
                
                $matchFound = true;
                $matchedIDs[] = $row1['id'];
                $matchedDiets[] = $row2['diet'];
            }
        }
    }

    
    if ($matchFound) {
        $message = "Medical emergencies found in cows of IDs: ";
        for ($i = 0; $i < count($matchedIDs); $i++) {
            $message .= $matchedIDs[$i] . " (Change Diet Plan to: " . $matchedDiets[$i] . ")";
            if ($i < count($matchedIDs) - 1) {
                $message .= ", ";
            }
        }
        echo "<script>
        window.onload = function() {
            var alertBox = document.createElement('div');
            alertBox.setAttribute('class', 'alert');
            alertBox.innerHTML = '$message';
            document.body.appendChild(alertBox);
        };
        </script>";
    } else {
        echo "<script>
        window.onload = function() {
            var alertBox = document.createElement('div');
            alertBox.setAttribute('class', 'alert');
            alertBox.innerHTML = 'Match not found';
            document.body.appendChild(alertBox);
        };
        </script>";
    }
} else {
    echo "Error fetching data.";
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert CSS</title>
    <style>
        .alert {
            background-color: #E0D800;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }
        body{background-color:#FFFFCC;}
       
    </style>
</head>

<body>
   
</body>

</html>