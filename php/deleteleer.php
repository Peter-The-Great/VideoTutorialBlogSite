<?php
session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

//Hier moet een get die de id uit de url gaat halen
//basic delete function and deletion of an image with the part itself
$id = $_GET["id"];
$unlink = "../";
$stmt = $database->select("cat", ["headimage"], ["ID" => $id]);
unlink($unlink.$stmt[0]["headimage"]);

if(isset($id)){
    $database->delete("cat", ["ID" => $id]);
}

header("location: ../admin/dashboard.php");
?>