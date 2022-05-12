<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
if(!isset($_SESSION["token"]) || $_SESSION["token"] !== $_POST["token"]){
        echo "Wrong Token";
        header("Location: ../admin/info.php?error=token");
    }
// Insert into DATABASE
if(isset($_POST["text"])){
    $database->update("info", ["text" => $_POST['text']], ["id" => 1]);
        header("Location: ../info.php");
    } 
    else {
        header('Location: ../admin/changebiografie.php?error=mysql');
    } 
}else {
    header('Location: ../admin/changebiografie.php?error=fields');
}
?>