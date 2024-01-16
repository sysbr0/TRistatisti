<?php
// login required
session_start();

if (!isset($_SESSION['user_name'])) {
   
    header("Location: create.php");
    exit();
}

$userName = $_SESSION['user_name'];
?>
 
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up / Login Form</title>
    <link href="css/css.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            font-family: 'Jost', sans-serif;
            margin: 0;
            padding: 0;
           
     
        }
        nav {
  background-color: #000000;
  overflow: hidden;
  
}

    </style>
</head>
<body>


<nav>
    <a href="index.php" calss= "home" id="home" >
    <span class="material-symbols-outlined">home</span>
    <span class="hava">HOME</span></a>

    <a href="about.php">About</a>
    <a href="weather.php" class="weather" id="weather">
    <span class="material-symbols-outlined">partly_cloudy_day</span>
    <span class="hava">HAVA DURUMU</span>
</a>
    <a href="#">Contact</a>
    <a href="welcome.php">Welcome</a>
    <a href="#" class="account-button" id="accountButton">

    
        <i class="material-icons account-icon">account_circle</i> 
        <span id="displayName"><?php echo $userName; ?></span>
    </a>
   <?php echo '<a href="create.php" class="logout-button">
   <i class="material-icons">exit_to_app</i></a>'; ?>
</nav>

<div class="main">

</div>



</body>
</html>