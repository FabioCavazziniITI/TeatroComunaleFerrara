<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <link rel="stylesheet" type="text/css" href="../css/cssPHP.css" media="all">
        <title>
            Teatro Comunale Ferrara
        </title>
    </head>
    <body>
        CONFERMA ORDINE<br><br>
        Ciao
        <?php
            $nome		=	$_POST["nome"];
            $cognome	=	$_POST["cognome"];
            $email		=	$_POST["email"];
            $cellulare	=	$_POST["cellulare"];
            $nPosti		=	$_POST["numeroPosti"];
            $zona		=	$_POST["zona"];
            $costoTOT	=	0;
            $prezzo		=	0;
            
            //saluto utente
            echo ($nome). "&nbsp;";
            echo ($cognome). ",<br>";
            
            //stampa valore assunto da "zona"
            //var_dump($zona);
            
            //gestione opzione zona scelta
            switch ($zona) {
                case "divisorio": {
                    echo "hai selezionato l'opzione divisoria per le varie zone.
                            &Egrave; necessario selezionare una delle zone presenti nel listino prezzi.";
                    break;
                };

                case "plateaA": {
                    $prezzo = 50;
                    $costoTOT = $nPosti * $prezzo;
                    echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                            Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                    echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                    echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                    echo ("<b>Email:</b> $email<br>");
                    echo ("<b>Cellulare:</b> $cellulare<br>");
                    echo ("<b>Zona scelta:</b> Platea | file A-Q<br>");
                    echo ("<b>Numero biglietti acquistati:</b> $nPosti<br><br>");
                    echo ("Riceverai il riepilogo anche all'email indicata.");

                    //email
                    $subject = "Conferma Acquisto Biglietto Teatro Comunale Ferrara";
                    $txt = "Ciao $nome $cognome,
                            hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.

                            Il prezzo totale da pagare ammonta a: € $costoTOT.

                            Di seguito il riepilogo dei dati inseriti consultabile anche su email:
                            - Nome Cognome: $nome $cognome
                            - Email: $email
                            - Cellulare: $cellulare
                            - Zona scelta: Platea | file A-Q
                            - Numero biglietti acquistati: $nPosti";
                    $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                    
                    mail($email, $subject, $txt, $headers);
                    break;
                };

                default: {
                    echo ("Zona non ancora inserita nel PHP.");
                    break;
                }
            }
        ?>
    </body>
</html>