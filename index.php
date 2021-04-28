<?php
require("php/database.php");
session_start();
$sql1 = "SELECT `id`, `titel`, `subtext`, `image` FROM `subject` WHERE `uitgelicht` = 1 ORDER BY date LIMIT 2";
$result1 = $conn->query($sql1);
$sql2 = "SELECT id, name, subtext, headimage FROM cat LIMIT 6;";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mathijs Clasener tutorials zijn leerstoffen om verschillende programmeertalen te leren. Studenten kunnen kiezen uitverschillende vakken">
    <?php
    require("components/style.php");
    ?>
    <title>Home - <?php echo $open;?></title>
</head>
<body>
	<?php require("components/navbar.php"); ?>
	<main id="article">
    <div class="container">
    <h1 class="display-1 text-center fw-bolder">Vandaag in de Spotlight:</h1>
    <div class="mt-4 mb-5 d-flex justify-content-center">
    	<?php
    	if ($result1->num_rows === 0){
        echo "<h1>Vandaag zijn er geen uitgelichte video's</h1>";
      }
    	foreach ($result1 as $item) {
                $image = $item['image'];
                echo "
                <div class='column me-5'>
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
    <!--Hieronder zijn de verschillende cards aangemaakt voor de programmeertalen -->
    <h2 class="fw-bold text-center mb-5">Bekijk hieronder andere programmeertalen:</h2>
    <div class="row mb-5">
    <?php
    if ($result2->num_rows === 0){
        echo "<h1>Vandaag zijn er geen uitgelichte video's</h1>";
      }
      foreach ($result2 as $item2) {
        $image1 = $item2['headimage'];
          echo "<div class='colum col-sm-12 col-md-6 col-lg-4'>
          <article class='card' style='background-image: url(". $image1 ."); '>";
          echo "<div class='card-body'>
          <h2>".$item2['name']."</h2>
          <p>".$item2['subtext']."</p>
          <p class='read'><a class='stretched-link' href='playlist.php?id=".$item2['id']."'>Lees verder...</a></p>
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