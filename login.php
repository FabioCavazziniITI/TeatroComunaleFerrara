<?php
	session_start();

    // Nel caso in cui l'utente abbia già fatto il login
    if (isset($_SESSION["active_login"])) {
        header("Location: index.php");
        exit;
    }

    // Tasto INVIO premuto
    if (isset($_POST["submit"])) {
        $user = $_POST["username"];
        $pwd = $_POST["password"];

        if ($user == "prof" && $pwd == "1234") {
            $_SESSION["active_login"] = $user;
            header("Location: index.php");
            exit;
        }
        else {
            $error = "Username o Password errati.";
        }
    }
?>
<html>
    <head>
        <title>Login Teatro Comunale Ferrara</title>
    </head>
    <body>
    <div class="header">
            <!--LOGO-->
            <div class="logo">
                <a href="index.php">
                    <img src="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg" alt="logo" class="img_logo">
                </a>
                <p class="name_sito">
                    <a href="index.php">
                        Teatro Comunale Ferrara
                    </a>
                </p>
            </div>
    
            <!--MENU-->
            <div class="nav">
                <ul>
                    <li>
                        <a href="index.php">
                            <u class="now">
                                Home
                            </u>
                        </a>
                    </li>
                    <li>
                        <a href="php/prenota.php" >
                            Prenota
                        </a>
                    </li>
                    <li>
                        <form action="index.php" method="POST">
                            <input type="submit" class="button" name="logout" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div id="Main">
            <?php
              if (isset($error)) {
                  echo "<p style=\"color: #FF0000;\">" . $error . "</p>";
              }
            ?>
            <form action="" method="POST">
                <p>
                    <label>
                    	Username:
                    </label>
                    <input type="text" name="username">
                </p>
                <p>
                    <label>
                    	Password:
                    </label>
                    <input type="password" name="password">
                </p>
                <input type="submit" class="button" name="submit" value="Accedi">
            </form>
        </div>
    </body>
</html>