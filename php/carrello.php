<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
        header("Location: ../login.php");
        exit;
    }

    session_start();

    if (!isset($_SESSION["active_login"])) {
        header("Location: ../login.php");
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
        <link rel="stylesheet" type="text/css" href="../css/cssPage.css" media="all">
        <title>
            Teatro Comunale Ferrara
        </title>
    </head>
    <body>
        <div class="header">
            <!--LOGO-->
            <div class="logo">
                <a href="../index.php">
                    <img src="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg" alt="logo" class="img_logo">
                </a>
                <p class="name_sito">
                    <a href="../index.php">
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
                        <a href="../index.php">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="prenota.php">
                            Prenota
                        </a>
                    </li>
                    <li>
                        <a href="carrello.php">
                            <u class="now">
                                Carrello
                            </u>
                        </a>
                    </li>
                    <li>
                        <form action="prenota.php" method="POST">
                            <input type="submit" class="logout-button" name="logout" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!--CONTENUTO-->
        <div class="carrello">
            
        </div>