<?php
require("php/database.php");
session_start();
$result = $database->select("subject", ["id", "titel", "image", "subtext"], ["titel[~]" => "%" . $_POST['search'] . " %"]);
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
    <title><?php echo $open; ?> - Search</title>
</head>
<body>
	<?php require("components/navbar.php"); ?>
	<main id="article">
	<div class="container">
    <div id="rowing" class="row mb-5 mt-3">
    <?php
    if (count($result) == 0){
        echo "<p>De video waar jij naar zocht kon niet worden gevodnen.</p>";
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
    <script type="text/javascript" src="js/search.js"></script>
</body>
</html>