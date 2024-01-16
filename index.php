<?php
    include 'config.php';

    session_start();

    $user_id = $_SESSION['user-id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="stylesheet" href="asset/css/swiper-bundle.min.css">
    <title>Art Gallery</title>
</head>
<body>
    <main class="main">
        <section class="first-page">
            <div class="header">
                <div class="header-menu">
                    <div class="logo">
                        <h1 class="logo-name">MOSEO</h1>
                    </div>
                    <div class="menu-list">
                        <ul class="list">
                            <a href=""><li>HOME</li></a>
                            <a href=""><li>COLLECTIONS</li></a>
                            <a href=""><li>EXCHIBITIONS</li></a>
                            <a href=""><li>ABOUT</li></a>
                            <div class="login-section">
                                <a href="login.php"><li class="login">LOGIN</li></a>
                                <div class="white-line"></div>
                                <a href="register.php"><li class="register">REGISTER</li></a>
                            </div>
                            <div class="user-info">
                                <?php 

                                        $select_user = mysqli_query($conn, "SELECT * FROM register_form WHERE id = '$user_id' ") or die("query failed");

                                    if(mysqli_num_rows($select_user) > 0){
                                        $fetch_user = mysqli_fetch_assoc($select_user);
                                    };
                                ?>
                                <img src="https://www.pngall.com/wp-content/uploads/5/Profile-Transparent.png" alt="" class="profile-img" id="img-toggle">
                                <div class="user-logout" id="topggleBtn">
                                    <h2>Welcome<br><span><?php echo $fetch_user['name'];?></span></h2>
                                    <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are you sure you want to logout')"><button class="logBtn">Log out</button></a>
                                    <span class="closebtnLog">&#215</span>
                                </div>
                            </div>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="title-container">
                <div class="title-page">
                    <h1 class="title-name">Discovering Creative <br>Masterpieces</h1>
                    <a href="paint.php"><button class="title-button">VISIT NOW</button></a>
                </div>
            </div>
        </section>

        <section class="second-page">
            <div class="section-container">
                <h1 class="section-title">CREATING AN UNFORGETTABLE ART<br>GALLERY EXPERIENCE:</h1>
                <div class="section-contents">
                    <div class="content">
                        <h3 class="content-title">Curate with Care</h3>
                        <div class="content-description">Lorem, ipsum dolor sit amet consectetu consectetur adipisicing elit. Voluptates inventore quor adipisicing elit. 
                            Voluptates inventore quo quidem velit illo, obcaecati expedita ab doloribus</div>
                    </div>

                    <div class="content">
                        <h3 class="content-title">Curate with Care</h3>
                        <div class="content-description">Lorem, ipsum dolor sit amet consectetu consectetur adipisicing elit. Voluptates inventore quor adipisicing elit. 
                            Voluptates inventore quo quidem velit illo, obcaecati expedita ab doloribus</div>
                    </div>

                    <div class="content">
                        <h3 class="content-title">Curate with Care</h3>
                        <div class="content-description">Lorem, ipsum dolor sit amet consectetu consectetur adipisicing elit. Voluptates inventore quor adipisicing elit. 
                            Voluptates inventore quo quidem velit illo, obcaecati expedita ab doloribus</div>
                    </div>
                </div>
                <div class="section-line"></div>
            </div>
        </section>

        <section class="third-section">
            <div class="third-container">
                <h1 class="third-title">The Art Haven</h1>
                <div class="third-line"></div>
                <div class="third-content">
                    <div class="third-description">
                        <p class="text-description">Lorem, ipsum dolor sit  consectetur adipisicing elit. Voluptates inventore quo consectetur adipisicing elit. 
                            Voluptates inventore quo quidem velit illo, obcaecati expedita ab doloribus</p>
                    </div>
                    <div class="third-button">
                        <button class="third-btn">VISIT MORE <span class="third-arrow">></span></button>
                    </div>
                </div>
            </div>

            <div class="swiper mySwiper">
                <div class="third-text-con">
                    <h1 class="third-text">20K+</h1>
                    <h5 class="third-texts">ART COLLECTION</h5>
                </div>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="painting/painting1.jpg"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="painting/painting2.jpg"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="painting/painting3.jpg"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="painting/painting4.jpg"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="painting/painting5.jpg"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="painting/painting6.jpg"/>
                  </div>
                  <div class="swiper-slide">
                    <img src="painting/painting7.jpg"/>
                  </div> 
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section class="fourth-page">
            <div class="fourth-container">
                <h1 class="fourth-title">EXCHIBITIONS <span class="fourth-titleSmall">Be part of our art community!</span></h1>
                <div class="fourth-contents">
                    <div class="first-content">
                        <img src="images/paint1.jpg" alt="" class="fourth-img">
                        <div class="fourth-texts">
                            <h3 class="fourth-text">Ethereal Visions: A Journey<br>  
                                into the Sublime</h3>
                            <p class="fourth-des">Lorem, ipsum dolor sit amet consectetu </p>
                        </div>
                    </div> 
                    <div class="first-content reverse">
                        <img src="images/paint2.jpg" alt="" class="fourth-img">
                        <div class="fourth-texts">
                            <h3 class="fourth-text">Ethereal Visions: A Journey<br>  
                                into the Sublime</h3>
                            <p class="fourth-des">Lorem, ipsum dolor sit amet consectetu </p>
                        </div>
                    </div> 
                    <div class="first-content">
                        <img src="images/paint3.jpg" alt="" class="fourth-img">
                        <div class="fourth-texts">
                            <h3 class="fourth-text">Ethereal Visions: A Journey<br>  
                                into the Sublime</h3>
                            <p class="fourth-des">Lorem, ipsum dolor sit amet consectetu </p>
                        </div>
                    </div> 
                    <div class="first-content reverse">
                        <img src="images/paint4.jpg" alt="" class="fourth-img">
                        <div class="fourth-texts">
                            <h3 class="fourth-text">Ethereal Visions: A Journey<br>  
                                into the Sublime</h3>
                            <p class="fourth-des">Lorem, ipsum dolor sit amet consectetu </p>
                        </div>
                    </div> 
                </div>
                <div class="fourth-btn">
                     <button class="fourth-button">MORE INFO  ></button>
                </div>
            </div>
        </section>

        <section class="fifth-page">
            <div class="fifth-container">
                <div class="fifth-content">
                    <img src="images/middleBackground.jpg" alt="" class="fifth-img">
                    <div class="fifth-text">
                        <h1 class="fifth-word left">ABOUT OUR</h1>
                        <h1 class="fifth-word right">ART GALLERY</h1> 
                        <div class="fifth-line"></div>
                        <button class="fifth-btn">MORE INFO <span class="third-arrow">></span></button>
                    </div>
                </div>
            </div>
        </section>

        <section class="sixth-page">
            <div class="sixth-container">
                <div class="sixth-content">
                        <h1 class="sixth-title">Gallery of Wonders</h1>
                        <p class="sixth-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                        Voluptates inventore quo quidem velit illo, obcaecati expedita ab doloribus</p>
                        <img src="images/edit1.png" alt="" class="sixth-img">
                </div>
                <div class="sixth-updated">
                    <div class="sixth-content-info">
                        <div class="sixth-one">
                            <h1 class="sixth-text">ART INSIDER<span class="sixth-textSmall">  Be part of our art community!</span></h1>
                            <div class="sixth-line"></div>
                        </div>
                        <div class="sixth-two">
                            <p class="sixth-two-text">Join our subscription list to receive regular updates, exclusive offers, 
                                and insightful articles about the world of art and its creators</p>
                        </div>
                        <div class="sixth-three">
                            <input type="text" class="sixth-input" placeholder="Enter your email">
                            <button class="sixth-button">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="seven-footer">
            <div class="seven-container">
                <div class="seven-first">
                    <h1 class="seven-logo">MOSEO</h1>
                    <p class="seven-text">123 Art Avenue, Gallery City, Paintsville, Artlandia. 
                        ZIP: 98765, Country: Arttopia.</p>
                    <div class="seven-icons">
                        <img src="images/facebook (3).png" alt="" class="icon">
                        <img src="images/instagram (2).png" alt="" class="icon">
                        <img src="images/twitter (2).png" alt="" class="icon">
                    </div>
                </div>
                <div class="seven-two">
                    <h1 class="seven-titleOne">LINKS</h1>
                    <h3 class="seven-link">HOME</h3>
                    <h3 class="seven-link">COLLECTIONS</h3>
                    <h3 class="seven-link">EXCHIBITONS</h3>
                    <h3 class="seven-link">ABOUT</h3>
                </div>
                <div class="seven-two">
                    <h1 class="seven-titleOne">SOCIAL</h1>
                    <h3 class="seven-link">TWITTER</h3>
                    <h3 class="seven-link">INSTAGRAM</h3>
                    <h3 class="seven-link">FACEBOOK</h3>
                    <h3 class="seven-link">EMAIL</h3>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="asset/js/scrollreveal.min.js"></script>
    <script src="asset/js/index.js"></script>
  
</body>
</html>     