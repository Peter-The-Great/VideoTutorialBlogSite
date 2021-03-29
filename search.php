<?php
require("php/database.php");
session_start();
$sql = "SELECT name, subtext, headimage FROM subject WHERE;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <?php 
    require("components/style.php");
    ?>
    <title><?php echo $open; ?> - Search</title>
</head>
<body>
	<?php require("components/navbar.php"); ?>
	<main>
    </main>
    <?php
    require("components/footer.php");
    require("components/scripts.php");
    ?>
</body>
</html>