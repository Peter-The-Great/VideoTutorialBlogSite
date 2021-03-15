<?php
require("../php/database.php");
session_start();
if(isset($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("style.php"); ?>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login - <?php echo $open ?></title>
</head>

<body>
        <div class="login-box mx-auto shadow p-3 mb-5 bg-white rounded">
            <!-- Shadow, Center in the middle of screen -->
            <!-- Logo-->
            <center><img class="img-fluid rounded-circle" src="../<?php echo $profilepic ?>"></center>
            <h4 class="card-title mb-4 mt-1">Inloggen</h4>
            <!-- Forum Itself -->
            <form method="POST" action="../php/login/authenticate.php">
                <div class="form-group">
                    <label>Gebruikersnaam</label>
                    <input name="username" id="username" lenght="60" class="form-control" placeholder="Gebruikersnaam" type="username">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input name="password" id="password" lenght="60" class="form-control rounded" placeholder="******" type="password">
                    <button id="showitbtn" class="btn" type="button"><i id="eyes" class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" class="btn btn-dark btn-block" name="Inloggen">Inloggen</button>
                </div>
                <?php
                      if(isset($_GET['error'])) {
                        if ($_GET['error'] == "password") {
                            echo "<p style='color: red;'>That account does not exist or the password you provided was incorrect.</p>";
                        }
                        else if ($_GET['error'] == "captcha") {
                            echo "<p style='color: red;'>Google could not verrify that you where a human.</p>";
                        }
                        else {
                            echo "<p style='color: red;'>There was a connection issue between you and our servers.</p>";
                        }
                    }
                ?>
            </form>
            <a href="../index.php">← Terug naar homepage</a>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require("scripts.php"); ?>
    <script src="toggle.js"></script>
</body>

</html>