<?php
require("../php/database.php");
$sql = "SELECT `id`, `titel`, `image`, `subtext` FROM subject WHERE `titel` LIKE '%". $_POST['search'] ."%';";
$result = $conn->query($sql);

if ($result->num_rows === 0){
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