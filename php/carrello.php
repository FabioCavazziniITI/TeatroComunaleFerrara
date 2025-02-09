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
                        <form action="carrello.php" method="POST">
                            <input type="submit" class="logout-button" name="logout" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!--CONTENUTO-->
        <div class="contenutoCarrello">
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
                            <img src="https://img.icons8.com/ios/50/clear-shopping-cart.png" alt="clear-shopping-cart"/>
                        </a>
                    </button>
                    <button class="button-carrello">
                        <a href="prenota.php">
                            Torna alla lista<br>dei posti
                            <img src="https://img.icons8.com/ios/50/ingredients-list.png" alt="ingredients-list"/>
                        </a>
                    </button>
                </div>
            </div>

            <div class="formCarrello">
                <div class="formContainer">
                    <form action="../php/compraBi.php" method="post" class="ticketForm">
                        <h2>Acquista ora i tuoi biglietti</h2>
                
                        <!-- Generalità del compratore -->
                        <div class="inlineGroup">
                            <div class="formGroup">
                                <label for="nome">Nome:</label>
                                <input type="text" id="nome" name="nome" placeholder="Inserisci il tuo nome" required>
                            </div>
                
                            <div class="formGroup">
                                <label for="cognome">Cognome:</label>
                                <input type="text" id="cognome" name="cognome" placeholder="Inserisci il tuo cognome" required>
                            </div>
                        </div>
                
                        <div class="formGroup">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Inserisci la tua email" required>
                        </div>
                
                        <div class="formGroup">
                            <label for="cellulare">Cellulare:</label>
                            <input type="text" id="cellulare" name="cellulare" placeholder="Inserisci il tuo numero di telefono" required>
                        </div>
                
                        <!-- Numero di posti -->
                        <div class="formGroup">
                            <label for="numeroPosti">Numero di biglietti da acquistare per ogni zona scelta:</label>
                            <input type="number" id="numeroPosti" name="numeroPosti" min="1" max="10" value="1" required>
                        </div>
                
                        <!-- Pulsante di invio -->
                        <div class="formGroup">
                            <button type="submit" class="submitButton">
                                Procedi con l'acquisto
                                <img src="https://img.icons8.com/color/48/shopping-cart-loaded.png" alt="shopping-cart-loaded"/>
                            </button>
                        </div>
                    </form>
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