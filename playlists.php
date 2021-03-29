<?php
require("php/database.php");
session_start();
$sql = "SELECT name, subtext, headimage FROM cat;";
$result = $conn->query($sql);
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
	<main id="article">
    <div class="container">
    <h1 class="fw-bold text-center mb-5">Bekijk hieronder andere programmeertalen:</h1>
    <div class="row mb-5">
    <?php
                foreach ($result as $item) {
                $image = $item['headimage'];
                echo "
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
                <article class='card' style='background-image: url(";
                echo $image; 
                echo "); '>
                    <div class='card-body'>
                        <h2>".$item['name']."</h2>
                        <p>".$item['subtext']."</p>
                        <p class='read'><a class='stretched-link' href='playlist.php?id=".$item['name']."'>Lees verder...</a></p>
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