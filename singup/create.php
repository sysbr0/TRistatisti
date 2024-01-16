<?php
include('connect.php');

?>

<?php


// crete account
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
    
        $name = isset($_POST["txt"]) ? $_POST["txt"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        //pass hash
        $hashPAS = password_hash($password, PASSWORD_DEFAULT);

        // into database 
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashPAS')";

        if ($conn->query($sql) === TRUE) {

            session_start();
            $_SESSION['user_name'] = $email;
            header("Location: index.php");
        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } elseif (isset($_POST["login"])) {
        //login form 
        $loginEmail = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : "";
        $loginPassword = isset($_POST["pswd"]) ? $_POST["pswd"] : "";

        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $loginEmail);
        $stmt->execute();
        $stmt->bind_result($hashPAS);

        if ($stmt->fetch() && password_verify($loginPassword, $hashPAS)) {
            
            session_start();
            $_SESSION['user_name'] =$loginEmail;
            header("Location: index.php");
          exit();


        } else {
            echo "Invalid email or password";
        }

        $stmt->close();
    }
}

$conn->close();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up / Login Form</title>

    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<style> 
  body {
        background: url('img/arkaplan.jpg') no-repeat center center fixed;
        background-size: cover;
    }
    </style>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="txt" placeholder="User name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup" onclick="getEmail()">Sign up</button>
        </form>
    </div>

    <div class="login">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="loginEmail" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Password" required="">
            <button type="submit" name="login" >Login</button>
        </form>
    </div>
</div>
<script>
var email = "";
email = <?php echo $emil; ?>;
document.getElementById('displayName').innerHTML = email;

</script>

</body>
</html>
