<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <style>
            * {
                padding: 20px;
            }
        </style>
        <title>
            Teatro Comunale Ferrara
        </title>
    </head>
    <body>
        <div class="contenitorePHP">
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

                    //Platea Davanti
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

                    //Platea dietro
                    case "plateaI": {
                        $prezzo = 45;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> Platea | file R-V<br>");
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
                                - Zona scelta: Platea | file R-V
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //Platea Handicap
                    case "plateaH": {
                        $prezzo = 45;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> Platea | handicap<br>");
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
                                - Zona scelta: Platea | handicap
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //1° Piano | Galleria laterale
                    case "galleria1": {
                        $prezzo = 42;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 1&deg; Piano | Galleria laterale<br>");
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
                                - Zona scelta: 1° Piano | Galleria laterale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //1° Piano | Galleria pre-centrale
                    case "galleria1_1": {
                        $prezzo = 43,50;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 1&deg; Piano | Galleria pre-centrale<br>");
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
                                - Zona scelta: 1° Piano | Galleria pre-centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //1° Piano | Galleria centrale
                    case "galleria1_2": {
                        $prezzo = 45;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 1&deg; Piano | Galleria centrale<br>");
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
                                - Zona scelta: 1° Piano | Galleria centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //2° Piano | Galleria lato palco
                    case "galleria2": {
                        $prezzo = 40;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 2&deg; Piano | Galleria lato palco<br>");
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
                                - Zona scelta: 2° Piano | Galleria lato palco
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //2° Piano | Galleria laterale
                    case "galleria2_1": {
                        $prezzo = 41,50;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 2&deg; Piano | Galleria laterale<br>");
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
                                - Zona scelta: 2° Piano | Galleria laterale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //2° Piano | Galleria pre-centrale
                    case "galleria2_2": {
                        $prezzo = 43,50;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 2&deg; Piano | Galleria pre-centrale<br>");
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
                                - Zona scelta: 2° Piano | Galleria pre-centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //2° Piano | Galleria centrale
                    case "galleria2_3": {
                        $prezzo = 45;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 2&deg; Piano | Galleria centrale<br>");
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
                                - Zona scelta: 2° Piano | Galleria centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //3° Piano | Galleria lato palco
                    case "galleria3": {
                        $prezzo = 38;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 3&deg; Piano | Galleria lato palco<br>");
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
                                - Zona scelta: 3° Piano | Galleria lato palco
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //3° Piano | Galleria laterale
                    case "galleria3_1": {
                        $prezzo = 40;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 3&deg; Piano | Galleria laterale<br>");
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
                                - Zona scelta: 3° Piano | Galleria laterale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //3° Piano | Galleria centrale
                    case "galleria3_2": {
                        $prezzo = 42;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 3&deg; Piano | Galleria centrale<br>");
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
                                - Zona scelta: 3° Piano | Galleria centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //4° Piano | Galleria lato palco
                    case "galleria4": {
                        $prezzo = 36;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 4&deg; Piano | Galleria lato palco<br>");
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
                                - Zona scelta: 4° Piano | Galleria lato palco
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //4° Piano | Galleria laterale
                    case "galleria4_1": {
                        $prezzo = 38;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 4&deg; Piano | Galleria laterale<br>");
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
                                - Zona scelta: 4° Piano | Galleria laterale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //4° Piano | Galleria centrale
                    case "galleria4_2": {
                        $prezzo = 40;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> 4&deg; Piano | Galleria centrale<br>");
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
                                - Zona scelta: 4° Piano | Galleria centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //Balcnonata | Balcone laterale
                    case "balcone5": {
                        $prezzo = 29;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> Balcnonata | Balcone laterale<br>");
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
                                - Zona scelta: Balcnonata | Balcone laterale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //Balcnonata | Balcone pre-centrale
                    case "balcone5_1": {
                        $prezzo = 30,50;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> Balcnonata | Balcone pre-centrale<br>");
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
                                - Zona scelta: Balcnonata | Balcone pre-centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //Balcnonata | Balcone centrale
                    case "balcone5_2": {
                        $prezzo = 32;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro Comunale di Ferrara.<br><br>
                                Il prezzo totale da pagare ammonta a: &euro; $costoTOT");
                        echo("<br><br>Di seguito il riepilogo dei dati inseriti consultabile anche su email:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome<br>");
                        echo ("<b>Email:</b> $email<br>");
                        echo ("<b>Cellulare:</b> $cellulare<br>");
                        echo ("<b>Zona scelta:</b> Balcnonata | Balcone centrale<br>");
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
                                - Zona scelta: Balcnonata | Balcone centrale
                                - Numero biglietti acquistati: $nPosti";
                        $headers = "From:fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    default: {
                        echo ("Selezionare una zona corretta.");
                        break;
                    }
                }
            ?>
        </div>
    </body>
</html>