<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
        header("Location: ../../login.php");
        exit;
    }

    if (!isset($_SESSION["active_login"])) {
        header("Location: ../../login.php");
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

<html>
	<head>
    	<title>Email di Conferma Ordine</title>
    </head>
    <body>
    	<?php        	
        	// Recupera i dati dalla sessione
        	$nome = $_SESSION['nome'];
        	$cognome = $_SESSION['cognome'];
        	$email = $_SESSION['email'];
            $cellulare = $_SESSION['cellulare'];
        	$numeroSicuro = $_SESSION['numeroSicuro'];
            $nPosti = $_SESSION['nPosti'];
        	$nPostiTOT = $_SESSION['nPostiTOT'];
        	$costoTOT = $_SESSION['costoTOT'];
        	
        	//DESTINATARI + OGGETTO
        	$to = $email;
        	$subject = "CONFERMA ORDINE N° " . $numeroSicuro;
        	
        	//CORPO
        	$message = "
        	<html>
            	<head>
                	<title>Conferma Ordine</title>
                	<style>
                    	table { border-collapse: collapse; width: 100%; }
                    	th, td { border: 1px solid black; padding: 8px; text-align: center; }
                    	th { background-color: #f2f2f2; }
                    	.content td { text-align: left; }
                        .int { background-color:rgb(163, 163, 163); }
                    </style>
                </head>
                <body>
                    <b>CONFERMA ORDINE N° ".$numeroSicuro."</b><br><br>
                    Gentile ".$nome." ".$cognome.",<br>
                    l'ordine da Lei effettuato è avvenuto con successo!<br><br>
                    Per eventuali richieste o problematiche, può contattarci all'indirizzo email <u><i style='color:blue;'>info@teatrocomunaleferrara.it</i></u><br><br>
                    
                    <table>
                        <tr class='int'>
                            <th colspan='4'>D E T T A G L I &emsp;&emsp; O R D I N E</th>
                        </tr>
                        <tr>
                            <th>Numero Ordine</th>
                            <th>Data e Ora</th>
                            <th>Numero biglietti</th>
                            <th>Spesa</th>
                        </tr>
                        <tr>
                            <td>".$numeroSicuro."</td>
                            <td>".date("d-m-Y H:i:s")."</td>
                            <td>".$nPostiTOT." biglietti</td>
                            <td>€ ".$costoTOT."</td>
                        </tr>
                    </table><br>
                    
                    <table>
                        <tr class='int'>
                            <th colspan='3'>D A T I &emsp;&emsp; A N A G R A F I C I</th>
                        </tr>
                        <tr>
                            <th>Nominativo</th>
                            <th>Indirizzo email</th>
                            <th>Numero di telefono</th>
                        </tr>
                        <tr>
                            <td>".$nome." ".$cognome."</td>
                            <td>".$email."</td>
                            <td>".$cellulare."</td>
                        </tr>
                    </table><br>
                    
                    <table>
                        <tr class='int'>
                            <th colspan='3'>B I G L I E T T I</th>
                        </tr>
                        <tr>
                            <th>Zona scelta</th>
                            <th>Quantità</th>
                            <th>Prezzo</th>
                        </tr>";

                        // Aggiungi i dettagli dei biglietti
                        foreach ($_SESSION['carrello'] as $nome => $prezzo) {
                            $message .= "
                            <tr class='content'>
                                <td>".$nome."</td>
                                <td>".$nPosti." biglietti</td>
                                <td>€ ".$prezzo*$nPosti."</td>
                            </tr>";
                        }

            $message .= "
                    </table>
                </body>
            </html>";
            
            // Definisci gli headers per l'email
            $headers = "Content-Type: text/html; charset=UTF-8" . "\r\n"; //indica che si tratta di un contenuto html
            $headers .= "From: conferma-ordine@noreplyteatrocomunaleferrara.it" . "\r\n";
            $headers .= "Reply-To: info@teatrocomunaleferrara.it" . "\r\n"; 
            
            // Invia l'email
            if (mail($to, $subject, $message, $headers)) {
                echo "Email inviata con successo!";
            } else {
                echo "Errore nell'invio dell'email.";
            }
        ?>
    </body>
</html>