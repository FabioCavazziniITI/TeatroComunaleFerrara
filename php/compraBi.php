<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/");
        header("Location: ../login.php");
        exit;
    }

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

    //VALORI
    $nome		=	$_POST["nome"];
    $cognome	=	$_POST["cognome"];
    $email		=	$_POST["email"];
    $cellulare	=	$_POST["cellulare"];
    $nPosti		=	$_POST["numeroPosti"];
    $costoTOT	=	0;
    $contatore  =   0;

    // Salva i valori in sessione per PHP2
    $_SESSION['nome'] = $nome;
    $_SESSION['cognome'] = $cognome;
    $_SESSION['email'] = $email;
    $_SESSION['cellulare'] = $cellulare;
    $_SESSION['nPosti'] = $nPosti;
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
                            Carrello
                        </a>
                    </li>
                    <li>
                        <form action="compraBi.php" method="POST">
                            <input type="submit" class="logout-button" name="logout" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="compraBiglietti">
            <table class="first">
                <tr class="firstInt">
                    <th colspan="3">
                        D A T I&emsp;&emsp;&emsp;A N A G R A F I C I
                    </th>
                </tr>
                <tr class='int'>
                    <th class='name'>
                        Nominativo
                    </th>
                    <th class='prezzo'>
                        Indirizzo email
                    </th>
                    <th class='azioni'>
                        Numero di telefono
                    </th>
                </tr>
                <tr class='content'>
                    <td class='name'>
                        <?php
                            echo ($nome. " " .$cognome);
                        ?>
                    </td>
                    <td class='email'>
                        <?php
                            echo ($email);
                        ?>
                    </td>
                    <td class='cell'>
                        <?php
                            echo ($cellulare);
                        ?>
                    </td>
                </tr>
            </table>

            <table class="second">
                <tr class="firstInt">
                    <th colspan="3">
                        B I G L I E T T I
                    </th>
                </tr>
                <tr class='int'>
                    <th class='name'>
                        Zona scelta
                    </th>
                    <th class='quantita'>
                        Quantit&agrave;
                    </th>
                    <th class='prezzo'>
                        Prezzo
                    </th>
                </tr>
                <?php
                    foreach($_SESSION['carrello'] as $nome=>$prezzo) { 
                            echo("
                                <tr class='content'>
                                    <td class='name'>
                                        ".$nome."
                                    </td>
                                    <td class='quantita'>
                                        ".$nPosti." biglietti
                                    </td>
                                    <td class='prezzo'>
                                        € ".$prezzo*$nPosti."
                                    </td>
                                </tr>
                            "); 
                        }
                ?>
            </table>

            <table class="tirth">
                <tr class="firstInt">
                    <th colspan="2">
                        SPESA&emsp;TOTALE
                    </th>
                </tr>
                <tr class='int'>
                    <th class='quantita'>
                        Numero biglietti
                    </th>
                    <td class="val">
                        <?php
                            foreach($_SESSION['carrello'] as $nome=>$prezzo) {
                                $contatore++;
                            }
                            $_SESSION['nPostiTOT'] =$nPosti*$contatore;
                            echo ($nPosti*$contatore. " biglietti");
                        ?>
                    </td>
                </tr>
                <tr class='int'>
                    <th class='quantita'>
                        Totale
                    </th>
                    <td class="val">
                        <?php
                            foreach ($_SESSION['carrello'] as $nome => $prezzo) {
                                $costoTOT += $prezzo*$nPosti;
                            }
                            $_SESSION['costoTOT'] = $costoTOT;
                            echo ("€ ".$costoTOT);
                        ?>
                    </td>
                </tr>
            </table>
            <div class="buttons-container">
                <button type="submit" class="paga">
                    <a href="carrello.php">
                        Annulla ordine
                        <img src="https://img.icons8.com/plasticine/100/undo.png" alt="undo"/>
                    </a>
                </button>
                <form action="confOrd.php" method="POST">
                    <button class="paga">
                        Acquista biglietti
                        <img src="https://img.icons8.com/color/48/cash-in-hand.png" alt="cash-in-hand"/>
                    </button>
                </form>
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