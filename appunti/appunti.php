<!--COMPRA BIGLIETTI-->
<div class="biglietti">
    <div class="formContainer">
        <form action="../php/biglietti.php" method="post" class="ticketForm">
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
                <label for="numeroPosti">Numero di posti:</label>
                <input type="number" id="numeroPosti" name="numeroPosti" min="1" max="10" value="1" required>
            </div>
    
            <!-- Selezione della zona -->
            <div class="formGroup">
                <label for="zona">Zona preferita:</label>
                <select id="zona" name="zona" required>
                    <option value="">-- Seleziona una zona presente nei prezzi --</option>
                    <!--PLATEA-->
                    <option value="plateaA">Platea | file A-Q</option>
                    <option value="plateaI">Platea | file R-V</option>
                    <option value="plateaH">Platea - handicap</option>
                    <!--PRIMO PIANO-->
                    <option value="divisorio">-- PRIMO PIANO --</option>
                    <option value="galleria1">1&deg; Piano | Galleria laterale</option>
                    <option value="galleria1_1">1&deg; Piano | Galleria pre-centrale</option>
                    <option value="galleria1_2">1&deg; Piano | Galleria centrale</option>
                    <!--SECONDO PIANO-->
                    <option value="divisorio">-- SECONDO PIANO --</option>
                    <option value="galleria2">2&deg; Piano | Galleria lato palco</option>
                    <option value="galleria2_1">2&deg; Piano | Galleria laterale</option>
                    <option value="galleria2_2">2&deg; Piano | Galleria pre-centrale</option>
                    <option value="galleria2_3">2&deg; Piano | Galleria centrale</option>
                    <!--TERZO PIANO-->
                    <option value="divisorio">-- TERZO PIANO --</option>
                    <option value="galleria3">3&deg; Piano | Galleria lato palco</option>
                    <option value="galleria3_1">3&deg; Piano | Galleria laterale</option>
                    <option value="galleria3_2">3&deg; Piano | Galleria centrale</option>
                    <!--QUARTO PIANO-->
                    <option value="divisorio">-- QUARTO PIANO --</option>
                    <option value="galleria4">4&deg; Piano | Galleria lato palco</option>
                    <option value="galleria4_1">4&deg; Piano | Galleria laterale</option>
                    <option value="galleria4_2">4&deg; Piano | Galleria centrale</option>
                    <!--QUINTO PIANO-->
                    <option value="divisorio">-- BALCONATA --</option>
                    <option value="balcone5">Balcone laterale</option>
                    <option value="balcone5_1">Balcone pre-centrale</option>
                    <option value="balcone5_2">Balcone centrale</option>
                </select>
            </div>
    
            <!-- Pulsante di invio -->
            <div class="formGroup">
                <button type="submit" class="submitButton">Acquista</button>
            </div>
        </form>
    </div>
</div>


<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <style>
            * {
                padding-top: 20px;
                padding-left: 20px
            }
        </style>
        <title>
            Teatro Comunale Ferrara
        </title>
    </head>
    <body>
        <div class="contenitorePHP">
            CONFERMA ORDINE<br><br>
            Gentile
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //1° Piano | Galleria pre-centrale
                    case "galleria1_1": {
                        $prezzo = 43.50;
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //2° Piano | Galleria laterale
                    case "galleria2_1": {
                        $prezzo = 41.50;
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //2° Piano | Galleria pre-centrale
                    case "galleria2_2": {
                        $prezzo = 43.50;
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
                        mail($email, $subject, $txt, $headers);
                        break;
                    };

                    //Balcnonata | Balcone pre-centrale
                    case "balcone5_1": {
                        $prezzo = 30.50;
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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
                        $headers = "From:no-reply@ticketteatrocomunaleferrara.it"."\r\n";
                        $headers .= "Reply-To: fabio.cavazzini@iticopernico.it"."\r\n";
                        
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