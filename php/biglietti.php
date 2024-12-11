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
        <div class="header">
            <!--LOGO-->
            <div class="logo">
                <a href="../index.html">
                    <img src="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg" alt="logo" class="img_logo">
                </a>
                <p class="name_sito">
                    <a href="../index.html">
                        Teatro Comunale Ferrara
                    </a>
                </p>
            </div>
    
            <!--MENU-->
            <div class="nav">
                <ul>
                    <li>
                        <a href="../index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="../html/prenota.html">
                            <u class="now">
                                Prenota
                            </u>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="containerPHP">
        	<p>
            	CONFERMA ORDINE<br><br>
            </p>
            Ciao
            <?php
            	$nome		=	$_POST["nome"];
                $cognome	=	$_POST["cognome"];
                $email		=	$_POST["email"];
                $cellulare	=	$_POST["cellulare"];
                $nPosti		=	$_POST["numeroPosti"];
                $zona		=	$_POST["zona"];
                $costoTOT	=	0;
                
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
                    }
                    case "plateaA": {
                        $prezzo = 50;
                        $costoTOT = $nPosti * $prezzo;
                        echo ("hai acquistato correttamente $nPosti biglietti per il Teatro comunale di Ferrara.<br><br>
                                Di seguito il riepilogo dei dati inseriti:<br>");
                        echo ("<b>Nome Cognome:</b> $nome&nbsp;$cognome,<br>");
                        echo ("<b>Email:</b> $email,<br>");
                        echo ("<b>Cellulare:</b> $cellulare,<br>");
                        echo ("<b>Zona scelta:</b> Platea | file A-Q,<br>");
                        echo ("<b>Numero biglietti acquistati:</b> $nPosti<br>");
                        break;
                    }

                    default: {
                        echo "Zona non ancora inserita nel PHP.";
                        break;
                    }
                }
            ?>
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
              </br></br>
              <a href="mailto:fabio.cavazzini@iticopernico.it">
                  fabio.cavazzini@iticopernico.it
              </a>
              </br></br>
                Classe V G
              </br></br>
                A.S. 2024 - 2025
            </div>
          </div>
    </body>
</html>