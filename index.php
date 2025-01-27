<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
        header("Location: login.php");
        exit;
    }

    session_start();

    if (!isset($_SESSION["active_login"])) {
        header("Location: login.php");
        exit;
    }

    // Controlla se il cookie è impostato
    if (isset($_COOKIE["NomeUtente"])) {
        $user = $_COOKIE["NomeUtente"];
    }
    else {
        $user = "Utente non identificato";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <link rel="stylesheet" type="text/css" href="css/cssHome.css" media="all">
        <script language="JavaScript" src="javaScript/home.js"></script>
        <title>
            Teatro Comunale Ferrara
        </title>
    </head>
    <body onload="showSlides(1)">
        <div class="header">
            <!--LOGO-->
            <div class="logo">
                <a href="index.php">
                    <img src="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg" alt="logo" class="img_logo">
                </a>
                <p class="name_sito">
                    <a href="index.php">
                        Teatro Comunale Ferrara
                    </a>
                </p>
            </div>

            <!--STAMPA COOKIE-->
            <div class="cookie">
                <?php
                    if (isset($_COOKIE["NomeUtente"])) {
                        echo "Utente loggato: " . $user;
                    } else {
                        echo $user;
                    }
                ?>
            </div>
    
            <!--MENU-->
            <div class="nav">
                <ul>
                    <li>
                        <a href="index.php">
                            <u class="now">
                                Home
                            </u>
                        </a>
                    </li>
                    <li>
                        <a href="php/prenota.php" >
                            Prenota
                        </a>
                    </li>
                    <li>
                        <form action="index.php" method="POST">
                            <input type="submit" class="logout-button" name="logout" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!--CONTENUTO-->
        <!--IMAGE-->
        <div class="slide_text">
            <div class="blok1">
                <div class="slideshow-container">
                    <!-- Immagini dello slideshow -->
                    <div class="mySlides fade">
                        <img src="img/img1.jpg" alt="Image 1" class="img_scroll">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/img2.jpg" alt="Image 2" class="img_scroll">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/img3.jpg" alt="Image 3" class="img_scroll">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/img4.jpg" alt="Image 4" class="img_scroll">
                    </div>
                    <div class="mySlides fade">
                        <img src="img/img5.jpg" alt="Image 5" class="img_scroll">
                    </div>
                    <!-- Frecce -->
                    <a class="prev" onclick="plusSlides(-1)" aria-label="Previous slide">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)" aria-label="Next slide">&#10095;</a>
                    <!-- Pallini sotto le immagini -->
                    <div class="dots-container">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </div>
            </div>
            <div class="blok2">
                <p id="slideText"></p>
            </div>
        </div>
        
        <!--POSITION-->
        <div class="position">
            <div class="text_gps">
                <p>
                    -- Come arrivarci --
                </p>
            </div>
            <div class="gps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3385.491797798773!2d11.618151576603603!3d44.83735267504364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477e4e6b5316860b%3A0x1a1c82d1c2c3a643!2sTeatro%20Comunale%20di%20Ferrara!5e1!3m2!1sit!2sit!4v1733594918085!5m2!1sit!2sit" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!--FOOTER-->
        <div class="footer">
            <div class="footer_div">
              <a href="http://www.iiscopernico.edu.it/" target="_blank">
                <img class="img_footer" src="img/Stemma_ITI.png" alt="Logo ITI cliccabile">
              </a>
              <br>
              <I>
                <a href="http://www.iiscopernico.edu.it/" target="_blank">
                    IIS "N.Copernico - Carpeggiani"
                </a>
              </I>
            </div>
            <div class="footer_div">
              &#0169 Cavazzini Fabio
              <br><br>
              <a href="mailto:fabio.cavazzini@iticopernico.it">
                  fabio.cavazzini@iticopernico.it
              </a>
              <br><br>
                Classe V G
              <br><br>
                A.S. 2024 - 2025
            </div>
          </div>
    </body>
</html>