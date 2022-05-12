<?php
require('php/database.php');
session_start();
if($stmt = $database->select("info", ["text"], ["id" => 1])) {
    if (count($stmt) == 0) {
        echo '<!doctype html>
			<html lang="en">

			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<?php require("components/style.php"); ?>
				<title><?php echo $open;?> - Info over website</title>
			</head>

			<body>
				<?php require("components/navbar.php"); ?>
				<section class="container" id="biografie">
					<div class="row">
						<span class="mt-5 maxw">NO information</span>
						
						<?php if(isset($_SESSION["loggedin"])) {
							echo "<a class="maxw mt-3" href="admin/dashboard.php">← Terug naar dashboard</a>";
							} ?>
					</div>

				</section>
				<!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<?php
				require("components/footer.php");
				require("components/scripts.php"); ?>
			</body>

			</html>';
    }
}

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("components/style.php"); ?>
	<title><?php echo $open;?> - Info over website</title>
</head>

<body>
	<?php require("components/navbar.php"); ?>
	<section class="container" id="biografie">
		<div class="row">
			<span class="mt-5 maxw"><?php echo $stmt[0]["text"];?></span>
			
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