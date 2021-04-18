<?php
require('php/database.php');
session_start();
if($stmt = $conn->prepare("SELECT text FROM aboutme WHERE id = 1")) {
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($text);
		$stmt->fetch();
		$stmt->close();
    }
}

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("components/style.php"); ?>
	<title><?php echo $open;?> - Biografie</title>
</head>

<body>
	<header class="biografie">
		<div class="container biografie-container text-center">
		<img class="rounded-circle" src="<?php echo $profilepic ?>" width="150" height="150">
			<h2><?php echo $open; ?></h2>
		</div>
	</header>
	<?php require("components/navbar.php"); ?>
	<section class="container" id="biografie">
		<div class="row">
			<span class="maxw"><?php echo $text;?></span>
			
			<?php if(isset($_SESSION["loggedin"])) {
				echo "<a class='maxw mt-3' href='admin/dashboard.php'>← Terug naar dashboard</a>";
				} ?>
		</div>

	</section>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php
	require("components/footer.php");
	require("components/scripts.php"); ?>
</body>

</html>