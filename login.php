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