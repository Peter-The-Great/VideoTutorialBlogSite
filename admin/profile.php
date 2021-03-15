<?php
require("../php/database.php");
session_start();

if($stmt = $conn->prepare("SELECT `username`, `openname`, `profile`, `email`, `adres`, `phone`, `porto` FROM `users` WHERE id = 1")) {
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($uname, $open, $prof, $email, $adres, $phone, $porto);
        $stmt->fetch();
        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("style.php"); ?>
    <style>
    	#showitbtn{
    float: right;
    margin-top: -40px;
}
    </style>
    <title><?php echo $open; ?> - Profiel</title>
</head>
<body>
<?php require("navbar.php"); ?>
<div class="container mt-2">
        <form method="POST" action="../php/changeprofile.php">
        <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" class="form-control rounded" name="username" id="username" value="<?php echo $uname; ?>" required>
            </div>
            <div class="form-group">
                    <label>Wachtwoord</label>
                    <input name="password" id="password" lenght="32" class="form-control rounded" placeholder="******" type="password" required value="<?php echo $_SESSION['wachtwoord']?>">
                    <button id="showitbtn" class="btn" type="button"><i id="eyes" class="fas fa-eye"></i>
                    </button>
                </div>
            <div class="form-group">
                <label for="openname">Echte Naam</label>
                <input type="text" class="form-control rounded" name="openname" id="openname" value="<?php echo $open; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded" name="email" id="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" class="form-control rounded" name="adres" id="adres" value="<?php echo $adres; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefoon</label>
                <input type="text" class="form-control rounded" name="phone" id="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div class="form-group">
                <label for="foto">Huidige Achtergrond Foto</label><br>
                <input hidden="1" readonly="1" class="form-control rounded" name="Huidige_Afbeelding" value="<?php echo $prof;?>"><img class="img-fluid rounded" src="../<?php echo $prof ;?>">
            </div>
            <div class="form-group">
                <label for="foto">Achtergrond Foto</label>
                <input name="image" class="form-control-file" type="file">
            </div>
            <div class="form-group">
                <label for="port">Portofolio</label>
                <input type="text" class="form-control rounded" name="port" id="port" value="<?php echo $porto; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-dark">
            </div>
            <?php
                if (isset($_GET['error=mysql'])) {
                    echo "<span style='color: rgb(0,185,255);'>The biography wasn't send correctly.</span>";
                }
                if (isset($_GET['error=fields'])) {
                    echo "<span style='color: rgb(0,185,255);'>The biography wasn't send correctly.</span>";
                }
                ?>
        </form>
    </div>
<?php require("scripts.php"); ?>
<script src="toggle.js"></script>
</body>
</html>