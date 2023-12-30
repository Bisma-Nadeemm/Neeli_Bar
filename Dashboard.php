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
    <title>Neeli Bar Dairy Farm Dashboard</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
           background-color:#FFFFFF;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #E0D800;
            margin-bottom: 30px;
            font-size: 30px;
            font-weight: bold;
        }

        h3 {
            color: #E0D800;
            font-size: 24px;
            margin-bottom: 20px;
        }

        span {
            margin-right: 20px;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        #image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        #adminWord {
            color: #007bff;
            font-size: 18px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 20px;
            width: 150px;
        }

        .container {
            display: flex;
        }

        #menuWord {
            color: #007bff;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .menu a {
            color: #000;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        .content {
            margin-left: 50px;
            margin-top: 30px;
            background-color: #FFFFCC;
            padding: 20px;
            width: 100%;
            font-size: 14px;
        }

        .section-heading1 {
            color: #E0D800;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .section-heading2 {
            color: #007bff;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .section-heading3 {
            color: #E0D800;
            font-size: 24px;
            margin-bottom: 20px;
            margin-top: 20px;
            font-weight: bold;
        }

        p {
            color: black;
        }

        .group {
            color: #007bff;
            margin-bottom: 10px;
        }

        .button {
            background-color: #71BC68;
            color: #007bff;
            padding: 12px 22px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .count {
            color: green;
            margin-left: 5px;
        }

        .box {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .box div {
            flex: 1;
            padding: 20px;
            margin-right: 10px;
            background-color: #C9EBB9;
        }

        .groupName {
            color: #007bff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .scroll {
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="profile">
            <img src="Profile icon.jpg" id="image" alt="Admin Profile Picture">
            <span>
                <a href="#" id="adminWord">Admin</a>
            </span>
        </div>
        <h1>Neeli Bar Dairy Farm</h1>
    </div>

    <div class="container">
        <div class="menu">
            <p id="menuWord">Menu</p>
            <h3>Dashboard</h3>
            <a href="Profile.php">Profile of Cattle</a>
            <a href="Animal account.php">Animal Account</a>
            <a href="diet plans.php">Diet Plans</a>
            <a href="alerts.php">Notifications</a>
			 <a href="temperature.php">Milk Temperature</a>
			 <a href="Records.html">Records</a>

            <h3>Charts</h3>
            <a href="DailyChart.php">Daily charts</a>
            <a href="WeeklyChart.html">Weekly charts</a>
            <a href="MonthlyChart.html">Monthly charts</a>
          
			 <a href="logout.php">Logout</a>
        </div>

        <div class="content">
            <div class="section-heading1">Yearly Statistics</div>
            <div class="box">
                <div>
                    <div class="section-heading2">Milk Quantity</div>
                    <p>1000 liters</p>
                </div>
                <div>
                    <div class="section-heading2">Feed Amount</div>
                    <p>Rs. 1,00,000</p>
                </div>
                <div>
                    <div class="section-heading2">Profit</div>
                    <p>Rs. 80,000</p>
                </div>
            </div>

            <div class="section-heading3">Animal Types</div>
            <div>
                <button class="button">Non-Pregnant Heifer</button>
                <button class="button">Pregnant Heifer</button>
                <button class="button">Cow</button>
                <button class="button">Pregnant Cow</button>
            </div>

            <div class="box">
                <div>
                    <h3 class="groupName">Animal Groups</h3>
                    <p class="group">Group 1 <span class="count">10-25 ltr</span></p>
                    <hr>
                    <p class="group">Group 2 <span class="count">25-35 ltr</span></p>
                    <hr>
                    <p class="group">Group 3 <span class="count">35-45 ltr</span></p>
                </div>
                <div class="scroll">
                    <h3 class="groupName">Reproduction Status</h3>
                    <p class="group">Fresh <span class="count">4</span></p>
                    <hr>
                    <p class="group">Suckling <span class="count">5</span></p>
                    <hr>
                    <p class="group">Non-pregnant <span class="count">12</span></p>
                    <hr>
                    <p class="group">Blacklist <span class="count">6</span></p>
                </div>
                <div class="scroll">
                    <h3 class="groupName">Lactation</h3>
                    <p class="group">Lactation 1 <span class="count">1</span></p>
                    <hr>
                    <p class="group">Lactation 2 <span class="count">3</span></p>
                    <hr>
                    <p class="group">Lactation 3 <span class="count">10</span></p>
                    <hr>
                    <p class="group">Lactation 4 <span class="count">4</span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
    