<?php
    include 'config.php';

   if(isset($_POST['Submit'])){
    
        $regiName = mysqli_real_escape_string($conn, $_POST['regiName']);
        $regiEmail = mysqli_real_escape_string($conn, $_POST['regiEmail']);
        $regiPass = mysqli_real_escape_string($conn, md5($_POST['regiPassword']));
        $regiCpass = mysqli_real_escape_string($conn, md5($_POST['regiCpassword']));

        $select = mysqli_query($conn, "SELECT * FROM register_form WHERE email = '$regiEmail' AND password = '$regiPass'") or die("query failed");
        if(mysqli_num_rows($select) > 0){
            $message[] = "user already exist";
        }else{
            mysqli_query($conn, "INSERT INTO register_form (name, email, password) VALUES ('$regiName','$regiEmail', '$regiPass')") or die("query failed");
            $message[] = "Register Successfully! Click the Login now";
            header('locaction: login.php');
        }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/index.css">
    <title>Register</title>
</head>
<style>
    body{
        background-image: url(images/registerCover.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
    }

</style>
<body>
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
            }
        }
    ?>
    <div class="myRegister-overlap">
        <div class="register-wrap">
        <h1 class="whiteText">MOSEO ART</h1>
            <h2>Register Now</h2>
            <form action="" method="post">
                <input type="text" placeholder="enter your username" name="regiName">
                <input type="email" placeholder="enter your email" name="regiEmail">
                <input type="password" placeholder="enter your password" name="regiPassword">
                <input type="text" placeholder="confirm your password" name="regiCpassword">
                <input type="submit" value="Submit" name="Submit">
                <p>already have an account? <a href="login.php">Login now</a></p>
            </form>
        </div>
    </div>
</body>
</html>