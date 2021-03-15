<?php
session_start();
require('../php/database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
$sql = "SELECT id,title,date FROM projects ORDER BY date DESC;";
$result = $conn->query($sql);
$username = $_SESSION['name'];
$id = $_SESSION['id'];
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
<div class="container">
	<?php echo '<a href="createpost.php" class="btn btn-success mt-5"><i class="fas fa-user-plus"></i> Post Aanmaken</a>' ?>
	<div class="center-div">
		<table class="table mt-2">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Titel</th>
					<th scope="col">Datum</th>
					<th scope="col">Bekijken</th>
					<th scope="col">Aanpassen</th>
					<th scope="col">Verwijderen</th>
				</tr>
			</thead>
			<tbody>

				<?php
				foreach ($result as $item) {
					echo "<td>" . $item["title"] . "</td><td>" .  $item["date"] . "</td></td><td><a href='../post.php?id=" . $item['id'] . "' class='btn btn-info btn-lg'><i class='fas fa-eye'></i></a></td><td><a href='changepost.php?id=" . $item['id'] . "' class='btn btn-warning btn-lg'><i class='fas fa-user-edit'></i></a></td><td><button type='button' data-bs-toggle='modal' data-bs-target='#post". $item['id'] ."' class='btn btn-danger btn-lg'><i class='fas fa-trash-alt'></i></button></td></tr>
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
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                              <a href='../php/removepost.php?id=" . $item["id"] . "'><button type='button' class='btn btn-danger'>Understood</button></a>
                            </div>
                          </div>
                        </div>
                      </div>";
				}
				?>
			</tbody>
		</table>

	</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require("scripts.php"); ?>
</body>
</html>