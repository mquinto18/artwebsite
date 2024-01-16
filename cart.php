<?php
    include 'config.php';   
    session_start();
    $user_id = $_SESSION['user-id'];


    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM art_cart WHERE id = '$remove_id'") or die("query failed");
        header('location:cart.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Revalia&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Georama:wght@300&display=swap');
    *{
        padding: 0;
        margin: 0;
    }
    .header{
        text-align: center;
    }
    .header-menu{
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        position: fixed;
        width: 100%;
        background-color: #fff;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.5);
        gap: 100px;
    }
    .menu{
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Roboto', sans-serif;
        font-size: 8px;
        gap: 30px;
        cursor: pointer;
    }
    .menu a{
        text-decoration: none;
        color: #000000;
    }
    .logo-name{
        font-family: 'Revalia', cursive;
        margin-left: 40px;
    }
    .main{
        min-height: 100vh;
        width: 100%;
    }
    .imgZoom{
        width: 350px;
        margin-bottom: 10px;
    }
    .column{
        display: flex;
        flex-direction: column;
        padding: 150px 100px;
    }
    .cart-text{
        padding-bottom: 40px;
        font-family: 'Revalia', cursive;
        font-weight: 100;
    }
    .photo{
        font-family: 'Georama', sans-serif;
    }
    .art-price{
        margin-top: 10px;
        display: flex;
        gap: 80px;
        align-items: center;
        margin-bottom: 40px;
    }
    .cart-container{
        padding: 0 100px;
        display: flex;
        align-items: center;
        column-gap: 100px;
    }
    .total-container{
        position: fixed;
        top: 300px;
        right: 200px;
        text-align: center;
    }
    .remove-btn{
        margin: 10px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 100%;
        width: 35px;
        height: 35px;
        background-color: #B8B8B8;
        cursor: pointer;
    }
    .remove-btn p{
        font-size: 20px;
        color: #fff;
    }
    .remove-btn a{
        text-decoration: none;
    }
    .total-box{
        padding: 20px 40px;
        background-color: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 30px;
    }
    .total-text{
        display: flex;
        gap: 90px;
        font-family: 'Georama', sans-serif;
    }
    .checkout{
        padding: 10px 60px;
        background-color: #80BC30;
        border: none;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }
</style>
<body>
    
    <div class="main">
        <div class="header">
            <div class="header-menu">
                <div class="menu">
                    <a href="index.php"><h1>HOME</h1></a>
                    <a href="paint.php"><h1>COLLECTIONS</h1></a>
                </div>
                <h1 class="logo-name">MOSEO</h1>
            </div>
        </div>
        <div class="cart-container">
            <div class="column">
                <h1 class="cart-text">Art Cart</h1>
                <?php
                $grand_total = 0;
                $cart_query = mysqli_query($conn, "SELECT * FROM art_cart WHERE user_id = '$user_id'") or die("query failed");

                if(mysqli_num_rows($cart_query) > 0){
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)){
                        $total_amount = $grand_total += $fetch_cart['price'];
                ?>
                <div class="photo">
                    <div class="remove-btn">
                        <a href="cart.php?remove=<?php echo $fetch_cart['id']?>"><p>x</p></a>
                    </div>
                    <img src="art/<?php echo $fetch_cart['image'];?>" alt="" class="imgZoom">
                    <div class="name"><?php echo $fetch_cart['name']?></div>
                    <div class="art-price">
                        <h4>Artwork Total:</h4>
                        <div class="price"><?php echo $fetch_cart['price']?> Php</div>
                    </div>
                </div>
                <?php
                    };
                };
                ?>
            </div>

            <div class="total-container">
                <div class="total-box">
                    <div class="total-text">
                        <h3>Estimated Total</h3>
                        <h3><?php echo number_format($total_amount, 2); ?> Php</h3>
                    </div>
                    <button class="checkout">Check out</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>