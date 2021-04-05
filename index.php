<?php
require("php/database.php");
session_start();
$sql1 = "SELECT `id`, `titel`, `subtext`, `image` FROM `subject` WHERE `uitgelicht` = 1 LIMIT 2";
$result1 = $conn->query($sql1);
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
                        <p class='read'><a class='stretched-link' href='playlist.php?id=".$item['id']."'>Lees verder...</a></p>
                    </div>
                </article>
                </div>";
            }
    	?>
    </div>
    <h2 class="fw-bold text-center mb-5">Bekijk hieronder andere programmeertalen:</h2>
    <div class="row mb-5">
    <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url("uploads/simg/python.png"); '>
                    <div class='card-body'>
                        <h2>Python</h2>
                        <p></p>
                        <p class='read'><a class='stretched-link' href='https://nl.wikipedia.org/wiki/Python_(programmeertaal)'>Lees verder...</a></p>
                    </div>
                </article>
                </div>
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url("uploads/simg/jquery.png"); '>
                    <div class='card-body'>
                        <h2>Jquery</h2>
                        <p></p>
                        <p class='read'><a class='stretched-link' href='https://nl.wikipedia.org/wiki/JQuery'>Lees verder...</a></p>
                    </div>
                </article>
                </div>
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url("uploads/simg/CSS3.svg"); '>
                    <div class='card-body'>
                        <h2>CSS3</h2>
                        <p></p>
                        <p class='read'><a class='stretched-link' href='https://nl.wikipedia.org/wiki/Cascading_Style_Sheets'>Lees verder...</a></p>
                    </div>
                </article>
                </div>
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url("uploads/simg/Ruby.svg"); '>
                    <div class='card-body'>
                        <h2>Ruby</h2>
                        <p></p>
                        <p class='read'><a class='stretched-link' href='https://nl.wikipedia.org/wiki/Ruby_(programmeertaal)'>Lees verder...</a></p>
                    </div>
                </article>
                </div>
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url("uploads/simg/CS.png"); '>
                    <div class='card-body'>
                        <h2>C#</h2>
                        <p></p>
                        <p class='read'><a class='stretched-link' href='https://nl.wikipedia.org/wiki/C%E2%99%AF'>Lees verder...</a></p>
                    </div>
                </article>
                </div>
                <div class='colum col-sm-12 col-md-6 col-lg-4'>
				<article class='card' style='background-image: url("uploads/simg/JS.svg"); '>
                    <div class='card-body'>
                        <h2>Javascript</h2>
                        <p></p>
                        <p class='read'><a class='stretched-link' href='https://nl.wikipedia.org/wiki/JavaScript'>Lees verder...</a></p>
                    </div>
                </article>
                </div>
            </div>
        </div>
    </main>
    <?php
    require("components/footer.php");
    require("components/scripts.php");
    ?>
</body>
</html>