<?php
session_start();
require('php/database.php');
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] =  $token;
$result = $database->select("cat", ["id", "name"]);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("components/style.php"); ?>
    <title><?php echo $open; ?>- Vull enquete in</title>
</head>

<body>
<?php require("components/navbar.php"); ?>
<!-- Hier hebben we het formulier gemaakt voor het toevoegen van een post -->
<!-- Bij addpost staat de query voor het toevoegen dat we bij action hebben gezet. -->
    <div class="container mt-2">
        <div class="h1">Vull de enquete in.</div>
        <form method="POST" enctype="multipart/form-data" action="../php/addpost.php">
            <input type="hidden" style="visibility: hidden;" name="token" value="<?php echo $token;?>">
            <div class="form-group mb-2">
                <label for="naam">Volledige Naam</label>
                <input name="naam" id="naam" class="form-control" placeholder="John Doe" type="text" required>
            </div>
            <div class="form-group mb-2">
                <label for="email">E-mail adress</label>
                <input name="email" id="email" class="form-control" placeholder="12345@glr.nl" type="email" required>
            </div>
            <div class="form-group mb-2">
                <label for="kilometer">Hoeveel kilometer woon je van het GLR</label>
                <input class="form-control" placeholder="Zoek op google maps!" name="kilometer" type="number" id="kilometer"></input required>
            </div>
            <div class="form-group my-3">
                <label for="min">Hoe lang doe je er over om van huis naar GLR te reizen?</label>
                <input class="form-control" placeholder="In minuten" type="number" name="min" id="min"></input required>
            </div>
            <div class="form-group mb-2">
                <label for="middel">Welke vervoermiddel(en) gebruik je om naar het GLR te reizen?</label>
                <select class="form-group form-control" required name="middel">
                <option selected disabled>-- selecteer vervoermiddel --</option>
                <option value="Trein">Trein</option>
                <option value="Tram">Tram</option>
                <option value="Metro">Metro</option>
                <option value="Bus">Bus</option>
                <option value="Auto">Auto</option>
                <option value="Fiets">Fiets</option>
                <option value="Lopend">Lopend</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="middel">Wat vind je van de begintijd van de lessen (8:15 uur)?</label>
                <select class="form-group form-control" required name="middel">
                <option selected disabled>-- selecteer keuze --</option>
                <option value="Te Vroeg">Te vroeg</option>
                <option value="Goed">Goed</option>
                <option value="Te Laat">Te Laat</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="middel">Wat vind je van de eindtijd van de lessen (17:15 uur)?</label>
                <select class="form-group form-control" required name="middel">
                <option selected disabled>-- selecteer keuze --</option>
                <option value="Te Vroeg">Te vroeg</option>
                <option value="Goed">Goed</option>
                <option value="Te Laat">Te Laat</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="opmerkingen">Heb je verder nog opmerkingen over het reizen naar het GLR?</label>
                <textarea name="opmerkingen" id="opmerkingen" class="form-control" required></textarea>
            </div>
            <div class="form-group mb-5">
                <input type="submit" name="submit" class="btn btn-dark">
            </div>
            <?php
            //Wanneer de post niet goed is uitgevoerd krijg je een error
                if (isset($_GET['error=mysql'])) {
                    echo "<span style='color: rgb(0,185,255);'>The form wasn't send correctly.</span>";
                }
                if (isset($_GET['error=fields'])) {
                    echo "<span style='color: rgb(0,185,255);'>The form wasn't send correctly or you forgot to fill some information.</span>";
                }
                ?>
        </form>
    </div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require("components/scripts.php"); ?>
</body>
</html>