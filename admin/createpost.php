<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit();
}
$sql = "SELECT id, name FROM cat;";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("style.php"); ?>
    <!-- Script Tiny CME -->
    <script src="https://cdn.tiny.cloud/1/swq7hpikkqwjjze9ad6mykwgy37w7e1mlvbbslqdqokoedyw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#subtext',
            height: '200',
            plugins: ['wordcount'],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic ' +
                '| link unlink | bullist numlist outdent indent | ' +
                'removeformat',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
    <script>
        tinymce.init({
            selector: '#text',
            height: '480',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic forecolor backcolor | alignleft aligncenter ' +
                'alignright alignjustify | link unlink | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
    

    <title><?php echo $open; ?>- Maak post</title>
</head>

<body>
<?php require("navbar.php"); ?>
<!-- Hier hebben we het formulier gemaakt voor het toevoegen van een post -->
<!-- Bij addpost staat de query voor het toevoegen dat we bij action hebben gezet. -->
    <div class="container mt-2">
        <form method="POST" enctype="multipart/form-data" action="../php/addpost.php">
            <div class="form-group">
                <label for="titel">Titel</label>
                <input name="title" id="titel" class="form-control" placeholder="Titel" type="text" required>
            </div>
            <div class="form-group">
                <label for="video">Video (Youtube Link)</label>
                <input name="video" id="video" class="form-control" placeholder="https://youtube.com/watch?v=swWJjuBDKDg" type="text" required>
            </div>
            <div class="form-group">
                <label for="subtext">Sub Tekst</label>
                <textarea name="subtext" id="subtext"></textarea required>
            </div>
            <div class="form-group">
                <label for="text">Tekst</label>
                <textarea name="text" id="text"></textarea required>
            </div>
            <div class="form-group">
                <label for="foto">Achtergrond Foto</label>
                <input name="image" type="file" required>
            </div>
            <div class="form-group">
                <label for="leerlijn">Leerlijn</label>
                <select required name="leer">
                <option selected disabled>-- selecteer leerlijn --</option>
                <?php
                //Hier loopen we door alle leerlijnen die dan vervolgens worden laten zien
                foreach ($result as $item) {
                    echo "<option value='".$item['id']."'>". $item['name'] ."</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-group">
            <label for="uit">Uitgelicht</label>
            <div class="form-check">
                <input class="form-check-input" checked type="radio" name="uit" id="nee">
                <label class="form-check-label" for="nee">
                Nee
                </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="uit" id="ja">
            <label class="form-check-label" for="ja">
            Ja
            </label>
            </div>
        </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-dark">
            </div>
            <?php
            //Wanneer de post niet goed is uitgevoerd krijg je een error
                if (isset($_GET['error=mysql'])) {
                    echo "<span style='color: rgb(0,185,255);'>The post wasn't send correctly.</span>";
                }
                if (isset($_GET['error=fields'])) {
                    echo "<span style='color: rgb(0,185,255);'>The post wasn't send correctly.</span>";
                }
                ?>
        </form>
    </div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require("scripts.php"); ?>
</body>
</html>