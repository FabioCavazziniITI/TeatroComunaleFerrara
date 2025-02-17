<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
        header("Location: ../login.php");
        exit;
    }

    if ((!isset($_SESSION["active_login"])) && (!isset($_COOKIE["NomeUtente"]))) {
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

    //CARRELLO
    $prodotti=array(
                        //primo piano
                        '1°_piano_galleria-pre-centrale'  =>  43.50,
                        '1°_piano_galleria-laterale'      =>  42.00,
                        '1°_piano_galleria-centrale'      =>  45.00,
                        //secondo piano
                        '2°_piano_galleria-lato-palco'    =>  40.00,
                        '2°_piano_galleria-laterale'      =>  41.50,
                        '2°_piano_galleria-pre-centrale'  =>  43.50,
                        '2°_piano_galleria-centrale'      =>  50.00,
                        //terzo piano
                        '3°_piano_galleria-lato-palco'    =>  38.00,
                        '3°_piano_galleria-laterale'      =>  40.00,
                        '3°_piano_galleria-centrale'      =>  42.00,
                        //quarto piano
                        '4°_piano_galleria-lato-palco'    =>  36.00,
                        '4°_piano_galleria-laterale'      =>  38.00,
                        '4°_piano_galleria-centrale'      =>  40.00,
                        //balconata
                        'balcone_laterale'                =>  29.00,
                        'balcone_pre-centrale'            =>  30.50,
                        'balcone_centrale'                =>  32.00,
                        //platea
                        'platea_|_A-Q'                    =>  50.00,
                        'platea_|_R-V'                    =>  47.50,
                        'platea_|_handicap'               =>  47.50
                    );

    if(isset($_GET['nome'])) {
        $nome = htmlspecialchars($_GET['nome'], ENT_QUOTES, 'UTF-8');
        
        if (array_key_exists($nome, $prodotti)) {
            $_SESSION['carrello'][$nome] = $prodotti[$nome];
        } else {
            echo "Errore: prodotto non trovato.";
        }
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
                            <u class="now">
                                Prenota
                            </u>
                        </a>
                    </li>
                    <li>
                        <a href="carrello.php">
                                Carrello
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

        <!-- POSTI -->
        <div class="prenotazione">
            <div class="posti">
                <div class="imgPosti">
                    <img src="../img/piantina_posti.jpg">
                </div>
                <div class="elencoPosti">
                    <p class="textPrezzi">
                        I nostri prezzi
                    </p>
                    <div class="costi">
                        <div class="costi1">
                            <!--Galleria PRIMO PIANO-->
                            <b>Galleria 1&deg; piano</b><br>
                            <p>
                                Galleria laterale: <span class="giallo">1-8 / 18-26</span><br>
                                Costo: &euro; 42.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="1°_piano_galleria-laterale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria pre-centrale: <span class="violetto">9 / 17</span><br>
                                Costo: &euro; 43.50
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="1°_piano_galleria-pre-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria centrale: <span class="rosso">10-12 / 14-16</span><br>
                                Costo: &euro; 45.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="1°_piano_galleria-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <hr>
                            <!--Galleria SECONDO PIANO-->
                            <b>Galleria 2&deg; piano</b><br>
                            <p>
                                Galleria lato palco: <span class="verde">0-4 / 22-26</span><br>
                                Costo: &euro; 40.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="2°_piano_galleria-lato-palco") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria laterale: <span class="giallo">5-8 / 18-21</span><br>
                                Costo: &euro; 41.50
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="2°_piano_galleria-laterale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria pre-centrale: <span class="violetto">9 / 17</span><br>
                                Costo: &euro; 43.50
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="2°_piano_galleria-pre-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria centrale: <span class="rosso">10-16</span><br>
                                Costo: &euro; 45.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="2°_piano_galleria-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="costi2">
                            <!--Galleria 3° PIANO-->
                            <b>Galleria 3&deg; piano</b><br>
                            <p>
                                Galleria lato palco: <span class="blu">0-4 / 22-26</span><br>
                                Costo: &euro; 38.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="3°_piano_galleria-lato-palco") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria laterale: <span class="marrone">5-8 / 18-21</span><br>
                                Costo: &euro; 40.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="3°_piano_galleria-laterale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria centrale: <span class="giallo">9-17</span><br>
                                Costo: &euro; 42.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="3°_piano_galleria-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <hr>
                            <!--Galleria 4° PIANO-->
                            <b>Galleria 4&deg; piano</b><br>
                            <p>
                                Galleria lato palco: <span class="blu">2-4 / 22-24</span><br>
                                Costo: &euro; 36.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="4°_piano_galleria-lato-palco") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria laterale: <span class="marrone">5-8 / 18-21</span><br>
                                Costo: &euro; 38.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="4°_piano_galleria-laterale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Galleria centrale: <span class="verde">9-17</span><br>
                                Costo: &euro; 40.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="4°_piano_galleria-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="costi3">
                            <!--BALCONATA-->
                            <b>Balconata</b><br>
                            <p>
                                Balcone laterale: <span class="blu_scuro">11 posti per lato</span><br>
                                Costo: &euro; 29.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="balcone_laterale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Balcone pre-centrale: <span class="marrone">11 posti per lato</span><br>
                                Costo: &euro; 30.50
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="balcone_pre-centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Balcone centrale: <span class="verde">35 posti</span><br>
                                Costo: &euro; 32.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="balcone_centrale") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <hr>
                            <!--PLATEA-->
                            <b>Platea</b><br>
                            <p>
                                File: <span class="rosso">A-Q</span><br>
                                Costo: &euro; 50.00
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="platea_|_A-Q") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                File: <span class="violetto">R-V</span><br>
                                Costo: &euro; 47.50
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="platea_|_R-V") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                            <p>
                                Posti: <span class="blu">Handicap</span><br>
                                Costo: &euro; 47.50
                                <br>
                                <?php
                                    foreach ($prodotti as $nome=>$prezzo) {
                                        if($nome=="platea_|_handicap") {
                                            echo("
                                                <button>
                                                    <a href=prenota.php?action=add&nome=".$nome.">
                                                        Aggiungi al carrello
                                                    </a>
                                                </button>
                                            ");
                                        }
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--FOOTER-->
        <div class="footer">
            <div class="footer_div">
              <a href="http://www.iiscopernico.edu.it/" target="_blank">
                <img class="img_footer" src="../img/Stemma_ITI.png" alt="Logo ITI cliccabile">
              </a>
              <br>
              <I>
                <a href="http://www.iiscopernico.edu.it/" target="_blank">
                IIS "N.Copernico - A. Carpeggiani"
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