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
            Ciao
            <?php
                //saluto
                echo ($_POST["nome"]). "&nbsp;";
                echo ($_POST["cognome"]). ",<br>";
                
                //stampa valore assunto da "zona"
                //var_dump($_POST["zona"]);
                
                //cosa fare in base alla scelta zona
                if (($_POST["zona"]) == "divisorio") {
                    echo ("Hai selezionato un divisore di zona.
                            &Egrave; necessario scegliere una delle zone <u>presenti</u> nel <b>listino prezzi</b>!");
                }
                
                else {
                    echo ("opzione non ancora inserita nel file PHP");
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