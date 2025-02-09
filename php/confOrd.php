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
                
                
                //saluto utente
                echo ($nome). "&nbsp;";
                echo ($cognome). ",<br>";
                
                //stampa valore assunto da "zona"
                //var_dump($zona);
                
                
            ?>
        </div>
    </body>
</html>