<?php
    include 'config.php';

    session_start();

    $user_id = $_SESSION['user-id'];

    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $select_cart = mysqli_query($conn, "SELECT * FROM art_cart WHERE name = '$product_name' AND user_id = '$user_id'") or die("query failed");
        
        if(mysqli_num_rows($select_cart) > 0){
            $message[] = 'product already added to cart';
        }else{
            mysqli_query($conn, "INSERT INTO art_cart (user_id, name, price, image) VALUES ('$user_id', '$product_name', '$product_price', '$product_image')") or die("query failed");
            $message[] = 'product added to cart';
        }
    }
    $cart_quantity_query = mysqli_query($conn, "SELECT COUNT(*) AS cart_count FROM art_cart WHERE user_id = '$user_id'");
    $cart_quantity_result = mysqli_fetch_assoc($cart_quantity_query);
    $cart_quantity = $cart_quantity_result['cart_count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/index.css">
    <title>Paintings</title>
</head>
<style>
    .imgZoom{
        transform: scale(1);
        transition: 0.3s ease-in-out;
    }
    .imgZoom:hover{
        transform: scale(1.1);
        cursor: pointer
    }
    .art-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Distributes columns evenly */
        gap: 15px; /* Spacing between columns */
    }
    .photo {
        border-radius: 5px;
        position: relative;
        padding: 20px;
        width: 350px;
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
    <main class="main-art">
        <section class="art-page">
            <div class="header">
                <div class="header-menu">
                    <div class="logo">
                        <h1 class="logo-name">MOSEO</h1>
                    </div>
                    <div class="menu-list">
                        <ul class="list">
                            <a href="index.php"><li>HOME</li></a>
                            <a href=""><li>COLLECTIONS</li></a>
                            <a href=""><li>EXCHIBITIONS</li></a>
                            <a href=""><li>ABOUT</li></a>
                            <div class="login-section">
                                <a href=""><li class="login">LOGIN</li></a>
                                <div class="white-line"></div>
                                <a href=""><li class="register">REGISTER</li></a>
                            </div>
                            <div class="shopping-cart">
                                <a href="cart.php"><div class="cart-quantity"><p><?php echo $cart_quantity; ?></p></div></a>
                                <img src="images/grocery-store.png" alt="" class="cart">
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="art-container">
                <div class="container">
                    <h1 class="art-text">Moseo Art Collection</h1>
                    <p class="art-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, similique sunt laudantium maiores laborum quae id corrupti sapiente distinctio soluta, aut eius est. Distinctio ipsum praesentium, suscipit sunt laudantium deserunt!</p>
                </div>
                <div class="art-space">
                    <div class="art-wrapper">
                        <?php
                        $select_product = mysqli_query($conn, "SELECT * FROM item_products") or die('query failed');

                        if(mysqli_num_rows($select_product) > 0) {
                            while($fetch_product = mysqli_fetch_assoc($select_product)) {
                        ?>
                            <form action="" method="post">
                                <div class="column">
                                    <div class="photo">
                                    
                                        <img src="art/<?php echo $fetch_product['image'];?>" alt="" class="imgZoom">
                                        <div class="name"><?php echo $fetch_product['name'];?></div>
                                        <div class="art-price">
                                            <h4>Artwork Total:</h4>
                                            <div class="price"><?php echo $fetch_product['price'];?> Php</div>
                                        </div>
                                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image'];?>">
                                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name'];?>">
                                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'];?>">
                                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                                    
                                    </div>
                                </div>
                            </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>