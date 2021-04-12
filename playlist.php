<?php
require("php/database.php");
session_start();
if (!isset($_GET['id'])) {
    header("Location: /tutorial/");
    return false;
}
//Dit is de query voor het uitlezen van de data
$sql = "SELECT id, titel, image, subtext FROM subject WHERE leerlijn = '". $_GET["id"] ."';";
$result = $conn->query($sql);
//echo $sql;
if($stmt = $conn->prepare("SELECT name FROM cat WHERE id = ?")) {
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($naam);
        $stmt->fetch();
    }
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
    <title><?php echo $open; ?> - Playlists - <?php echo $naam;?></title>
</head>
<body>
	<?php require("components/navbar.php"); ?>
	<main id="article">
    <div class="container">
    <h1 class="fw-bold text-center mb-5"><?php echo $naam;?> Lesstoffen</h1>
    <div class="row mb-5">
    <?php
    if ($result->num_rows === 0){
        echo "<p>Er zijn geen videos gevonden probeer het later nog een keer of notificeer de leraar voor meer informatie.</p>";
      }
                foreach ($result as $item) {
                $image = $item['image'];
                echo "
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
                <article class='card' style='background-image: url(";
                echo $image; 
                echo "); '>
                    <div class='card-body'>
                        <h2>".$item['titel']."</h2>
                        <p>".$item['subtext']."</p>
                        <p class='read'><a class='stretched-link' href='video.php?id=".$item['id']."'>Lees verder...</a></p>
                    </div>
                </article>
                </div>";
                }
                ?>
            </div>
        </div>
    </main>
    <?php
    require("components/footer.php");
    require("components/scripts.php");
    ?>
</body>
</html>