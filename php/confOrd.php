<?php
    session_start();

    // Recupera i valori dalla sessione
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $email = $_SESSION['email'];
    $cellulare = $_SESSION['cellulare'];
    $nPosti = $_SESSION['nPosti'];
    $nPostiTOT = $_SESSION['nPostiTOT'];
    $costoTOT = $_SESSION['costoTOT'];

    // Funzione per generare un numero sicuro
    function generaNumeroSicuro($min, $max) {
        return random_int($min, $max);
    }

    $numeroSicuro = generaNumeroSicuro(1, 10000);
    $_SESSION['numeroSicuro'] = $numeroSicuro;
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
        <div class="contenitorePHP">
            <b>
                <?php
                    echo ("CONFERMA ORDINE N&deg; ".$numeroSicuro);
                ?>
            </b><br><br>
            <?php                
                //saluto utente
                echo ("Gentile ".$nome." ".$cognome.",<br>
                        l'ordine da Lei effettuato è avvenuto con successo!<br><br>
                        Per eventuali richieste o problematiche, può contattarci all'indirizzo email <u><i style='color:blue;'>info@teatrocomunaleferrara.it</i></u><br>");
            ?>
            <table class="table1">
                <tr>
                    <th colspan="4">
                        D E T T A G L I&emsp;&emsp;&emsp;O R D I N E
                    </th>
                </tr>
                <tr>
                    <th>
                        Numero Ordine
                    </th>
                    <th>
                        Data e Ora
                    </th>
                    <th>
                        Numero biglietti
                    </th>
                    <th>
                       Spesa
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo ($numeroSicuro);
                        ?>
                    </td>
                    <td>
                        <?php
                            date_default_timezone_set("Europe/Rome");
                            echo date("d-m-Y H:i:s");
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ($nPostiTOT." biglietti");
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ("€ ".$costoTOT);
                        ?>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">
                        D A T I&emsp;&emsp;&emsp;A N A G R A F I C I
                    </th>
                </tr>
                <tr>
                    <th>
                        Nominativo
                    </th>
                    <th>
                        Indirizzo email
                    </th>
                    <th>
                        Numero di telefono
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo ($nome. " " .$cognome);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ($email);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ($cellulare);
                        ?>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">
                        B I G L I E T T I
                    </th>
                </tr>
                <tr>
                    <th>
                        Zona scelta
                    </th>
                    <th>
                        Quantit&agrave;
                    </th>
                    <th>
                        Prezzo
                    </th>
                </tr>
                <?php
                    foreach($_SESSION['carrello'] as $nome=>$prezzo) { 
                            echo("
                                <tr class='content'>
                                    <td>
                                        ".$nome."
                                    </td>
                                    <td>
                                        ".$nPosti." biglietti
                                    </td>
                                    <td>
                                        € ".$prezzo*$nPosti."
                                    </td>
                                </tr>
                            "); 
                        }
                ?>
            </table>
            
            <table>
                <tr>
                    <th colspan="2">
                        Come si desidera conservare l'ordine effettuato?
                    </th>
                </tr>
                <tr>
                    <th>
                        Voglio riceverlo via email
                    </th>
                    <th>
                        Voglio scaricarlo in formato PDF
                    </th>
                </tr>
                <tr class='content'>
                    <td>
                        <!-- Bottone per inviare l'email -->
                        <form method="POST" action="Ordine/invia_email.php">
                            <button type="submit" name="invia_email">
                                Invia email dell'ordine
                            </button>
                        </form>
                    </td>
                    <td>
                        <!-- Bottone per generare il PDF -->
                        <form method="POST" action="Ordine/genera_pdf.php">
                            <button type="submit" name="genera_pdf">
                                Genera PDF dell'ordine
                            </button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>