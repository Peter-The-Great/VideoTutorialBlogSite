<?php

session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["text"])){
    $sql = "UPDATE info SET text=? WHERE id=1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "s",
            $_POST["text"],
        );
    
        $stmt->execute();
        $stmt->close();
        header("Location: ../info.php");
    } 
    else {
        header('Location: ../admin/changebiografie.php?error=mysql');
    } 
}else {
    header('Location: ../admin/changebiografie.php?error=fields');
}
?>