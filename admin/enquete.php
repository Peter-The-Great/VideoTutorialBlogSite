<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
$result = $database->select("subject", ["id", "titel", "date"], ["ORDER" => ["date", "date" => "DESC"]]);
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require("style.php"); ?>
	<title><?php echo $open; ?> - Enquetes</title>
</head>
<body>
<?php require("navbar.php"); ?>
<!-- Hieroner hebben we de tabel gemaakt die alles laat zien --> 
<div class="container">
	<div class="center-div">
		<table class="table mt-2">
			<thead class="thead-dark">
				<tr>
					<th scope="col">StudentNR</th>
					<th scope="col">Aantal Kilometer</th>
					<th scope="col">Aantal Minuten</th>
					<th scope="col">Aanpassen</th>
					<th scope="col">Verwijderen</th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($result as $item) {
					echo "<td>" . $item["titel"] . "</td><td>" .  $item["date"] . "</td></td><td><a href='../video.php?id=" . $item['id'] . "' class='btn btn-info btn-lg'><i class='fas fa-eye'></i></a></td><td><a href='changepost.php?id=" . $item['id'] . "' class='btn btn-warning btn-lg'><i class='fas fa-user-edit'></i></a></td><td><button type='button' data-bs-toggle='modal' data-bs-target='#post". $item['id'] ."' class='btn btn-danger btn-lg'><i class='fas fa-trash-alt'></i></button></td><tr>
					<div class='modal fade' id='post". $item['id'] ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='postlabel". $item['id'] ."' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='postlabel". $item['id'] ."'>Modal title</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            <b>Weet je zeker dat je de post wilt verwijderen? Deze actie kan niet ongedaan worden!</b>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Sluiten</button>
                              <a href='../php/removepost.php?id=" . $item["id"] . "'><button type='button' class='btn btn-danger'>Jazeker</button></a>
                            </div>
                          </div>
                        </div>
                      </div>";
				}
				?>
			</tbody>
		</table>
	</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require("scripts.php"); ?>
</body>
</html>