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
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <link rel="stylesheet" type="text/css" href="css/cssLogin.css" media="all">
        <title>
            Teatro Comunale Ferrara - Login
        </title>
    </head>
    <body>
    <div class="header">
        <div id="Main">
            <?php
              if (isset($error)) {
                  echo "<p style=\"color: #FF0000;\">" . $error . "</p>";
              }
            ?>
            <div class="container">
                <h1>
                    Login Teatro Comunale Ferrara
                </h1>
                <form action="login_process.php" method="post">
                    <p>
                        <label>
                            Username:
                        </label>
                        <input type="text" name="username" require>
                    </p>
                    <p>
                        <label>
                            Password:
                        </label>
                        <input type="password" name="password" require>
                    </p>
                    <button type="submit">Accedi</button>
                </form>
                <a href="#">Password dimenticata?</a>
            </div>
        </div>
    </body>
</html>