<?php
    include 'config.php';
    session_start();
    if(isset($_POST['Submit'])){

        $logEmail = mysqli_real_escape_string($conn, $_POST['logEmail']);
        $logEPass = mysqli_real_escape_string($conn, $_POST['logPassword']);

        $select = mysqli_query($conn, "SELECT * FROM register_form WHERE email = '$logEmail' AND password = '$logEPass'") or die('quert failed');
        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            echo $_SESSION['user-id'] = $row['id'];
            header('location:index.php');
        }else{
            $message[] = 'incorrect password or email';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/index.css">
    <title>Login</title>
</head>
<style>
    body{
        background-image: url(images/registerCover.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
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
            <h2>Login Now</h2>
            <form action="" method="post">
                <input type="email" placeholder="enter your email" name="logEmail">
                <input type="password" placeholder="enter your password" name="logPassword">
                <input type="submit" value="Submit" name="Submit">
                <p>don't have an account? <a href="register.php">Register Now</a></p>
            </form>
        </div>
    </div>
</body>
</html>