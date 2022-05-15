<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
$result = $database->select("enquetes", ["id", "naam", "email", "kilometer", "min", "middel", "begin", "eind", "opmerkingen"], ["naam[~]" => "%" . $_POST['search'] . "%", "ORDER" => ["date" => "DESC"]]);
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("style.php"); ?>
	<title><?php echo $open; ?> - Dashboard</title>
</head>
<body>
<?php require("navbar.php"); ?>
<!-- Hieroner hebben we de tabel gemaakt die alles laat zien --> 
<div class="container">
	<h1 class="h1">Student Enquetes</h1>
	<div class="center-div">
		<table class="table mt-2">
			<thead class="thead-dark">
				<tr>
					<th scope="col">StudentNR</th>
					<th scope="col">Naam</th>
					<th scope="col">E-mail</th>
					<th scope="col">Aantal Kilometers</th>
					<th scope="col">Tijd Naar school</th>
					<th scope="col">Vervoermiddel</th>
					<th scope="col">begintijd</th>
					<th scope="col">eindtijd</th>
					<th scope="col">Opmerkingen</th>
				</tr>
			</thead>
			<tbody id="table-body">
				<?php
				foreach ($result as $item) {
					echo "<td>" . $item["id"] . "</td><td>" .  $item["naam"] . "</td><td>" .  $item["email"] . "</td><td>" .  $item["kilometer"] . " Kilometer</td><td>" .  $item["min"] . " Minuten</td><td>" .  $item["middel"] . "</td><td>" .  $item["begin"] . "</td><td>" .  $item["eind"] . "</td><td>" .  $item["opmerkingen"] . "</td><tr>";
				}
				?>
			</tbody>
		</table>
	</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require("scripts.php"); ?>
<script type="text/javascript" src="search/enquete.js"></script>
</body>
</html>