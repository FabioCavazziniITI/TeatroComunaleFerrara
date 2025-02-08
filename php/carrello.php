<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
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
            <?php
                function mostra()
                { 
                    echo ("<table>"); 
                    echo ("
                            <tr class='int'>
                                <th class='name'>
                                    Nome zona
                                </th>
                                <th class='prezzo'>
                                    Prezzo
                                </th>
                                <th class='azioni'>
                                    Azioni
                                </th>
                            </tr>
                        ");

                    foreach($_SESSION['carrello'] as $nome=>$prezzo)
                    { 
                        echo("
                                <tr class='content'>
                                    <td class='name'>
                                        ".$nome."
                                    </td>
                                    <td class='prezzo'>
                                        € ".$prezzo."
                                    </td>
                                    <td class='azioni'>
                                        <button>
                                            <a href=carrello.php?action=delete&indice=".$nome.">
                                                Rimuovi
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            "); 
                    } 
                    echo ("</table>"); 
                } 

                if (isset($_GET['action'])) { 
                    if($_GET['action']=="clear") { 
                        unset ($_SESSION['carrello']); 
                    } 
                    if ($_GET['action']=="delete") { 
                        unset($_SESSION['carrello'][$_GET['indice']]);
                        mostra(); 
                    } 
                } else {
                    mostra();
                } 
            ?>

            <div class="buttons-container">
                <button class="button-carrello">
                    <a href="carrello.php?action=clear">
                        Svuota Carrello
                    </a>
                </button>
                <button class="button-carrello">
                    <a href="prenota.php">
                        Torna alla lista dei posti
                    </a>
                </button>
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