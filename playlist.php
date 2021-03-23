<?php
require("php/database.php");
session_start();
if (!isset($_GET['id'])) {
    header("Location: /tutorial/");
    return false;
}
if ($stmt = $conn->prepare("SELECT titel,text, image, video, leerlijn FROM subjects WHERE id = ?")) {
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($titel, $text, $image, $video, $leerlijn);
        $stmt->fetch();
    } else {
        header("Location: index.php");
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
    require("components/style.php");
    ?>
    <title><?php echo $open; ?> - Playlists - <?php echo "something";?></title>
</head>
<body>
	<?php require("components/navbar.php"); ?>
	<main>
        <?php

        ?>
    </main>
    <?php
    require("components/footer.php");
    require("components/scripts.php");
    ?>
</body>
</html>