<?php
require("../php/database.php");
session_start();
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] =  $token;

if($stmt = $database->select("admin", ["username", "email", "realname", "profile"], ["ID" => $_SESSION["id"]])) {
    if (count($stmt) == 0) {
        header("Location: dashboard.php?error=noprofile");
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
    <?php
    //hier doen we een foreach data stukje erin.
    foreach ($stmt as $data) {    
    ?>
        <form method="POST" enctype="multipart/form-data" action="../php/changeprofile.php">
        <input type="hidden" style="visibility: hidden;" name="token" value="<?php echo $token;?>">
        <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" class="form-control rounded" name="username" id="username" value="<?php echo $data['username']; ?>" required>
            </div>
            <div class="form-group">
                    <label>Wachtwoord</label>
                    <input name="password" id="password" lenght="32" class="form-control rounded" placeholder="******" type="password" required value="<?php echo $_SESSION['wachtwoord']?>">
                    <button id="showitbtn" class="btn" type="button"><i id="eyes" class="fas fa-eye"></i>
                    </button>
                </div>
            <div class="form-group">
                <label for="openname">Echte Naam</label>
                <input type="text" class="form-control rounded" name="openname" id="openname" value="<?php echo $data['realname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control rounded" name="email" id="email" value="<?php echo $data['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="foto">Huidige Achtergrond Foto</label><br>
                <input hidden="1" readonly="1" class="form-control rounded" name="Huidige_Afbeelding" value="<?php echo $data['profile'];?>"><img class="img-fluid rounded" src="../<?php echo $data['profile'] ;?>">
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="foto">Achtergrond Foto</label>
                <input name="image" class="form-control-file" type="file">
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