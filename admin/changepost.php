<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit();
}

$sql = "SELECT id, name FROM cat;";
$result = $conn->query($sql);

if($stmt = $conn->prepare("SELECT titel,subtext,text,image,video,leerlijn FROM subject WHERE id = ?")) {
    $stmt->bind_param("s", $_GET["id"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($title, $subtext, $text, $image, $video, $leerlijn);
        $stmt->fetch();
    }
}
if($stmt2 = $conn->prepare("SELECT name FROM cat WHERE id = ?")) {
    $stmt2->bind_param("s", $leerlijn);
    $stmt2->execute();
    $stmt2->store_result();

    if ($stmt2->num_rows > 0) {
        $stmt2->bind_result($leerlijnnaam);
        $stmt2->fetch();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("style.php"); ?>
    <!-- Script Tiny MCE -->
    <script src="https://cdn.tiny.cloud/1/swq7hpikkqwjjze9ad6mykwgy37w7e1mlvbbslqdqokoedyw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    	//this is for the tiny mce configuration for both textarea's 
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
    

    <title><?php echo $open; ?> - Verander lesstof</title>
</head>

<body>
<?php require("navbar.php"); ?>
    <div class="container mt-2">
        <form method="POST" enctype="multipart/form-data" action="../php/changepost.php?id=<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="titel">Titel</label>
                <input name="title" id="titel" class="form-control" placeholder="Titel" type="text" value="<?php echo $title;?>" required>
            </div>
            <div class="form-group">
                <label for="video">Video</label>
                <input name="video" id="video" class="form-control" placeholder="video" type="text" value="https://www.youtube.com/watch?v=<?php echo $video;?>" required>
            </div>
            <div class="form-group">
                <label for="subtext">Sub Tekst</label>
                <textarea name="subtext" id="subtext"><?php echo $subtext;?></textarea required>
            </div>
            <div class="form-group">
                <label for="text">Tekst</label>
                <textarea name="text" id="text"><?php echo $text;?></textarea required>
            </div>
            <div class="form-group">
                <label for="Huidige_Afbeelding">Huidige Achtergrond Foto</label><br>
                <input hidden="1" readonly="1" name="Huidige_Afbeelding" value="<?php echo $image;?>"><img src="../<?php echo "" . $image . "";?>" width="120" height="110">
            </div>
            <div class="form-group">
                <label for="foto">Achtergrond Foto</label>
                <input name="image" type="file">
            </div>
            <div class="form-group">
                <label for="leerlijn">Leerlijn</label>
                <select required name="leer">
                <?php
                echo "<option selected value'". $leerlijn ."' >". $leerlijnnaam ."</option>";
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