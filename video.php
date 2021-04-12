<?php
require('php/database.php');
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../index.php");
	return false;
}
if ($stmt = $conn->prepare("SELECT titel,text, image, video, leerlijn FROM subject WHERE id = ?")) {
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("components/style.php"); ?>
	<title><?php echo $open;?> - <?php echo $titel; ?></title>
</head>

<body>
	<?php require("components/navbar.php"); ?>
	<header style="background-image: url(<?php echo $image ?>) !important;">
		<div class="container text-center">
			<h1><?php echo $titel; ?></h1>
		</div>
	</header>
	<section class="mt-3 mb-5 container" id="article">
		<div class="row">
			<span class="maxw"><?php echo $text; ?></span>
			<iframe width="560" height="315" <?php echo "src='https://www.youtube.com/embed/". $video ."'";  ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<br><br>
			<a class="maxw mb-2" <?php echo "href='playlist.php?id=". $leerlijn ."'"; ?>>← Terug naar lesstof</a>
		</div>
	</section>
	<?php
	require("components/footer.php"); 
	require("components/scripts.php");
	?>
</body>
</html>