<?php
session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}
// Update into DATABASE
if(isset($_POST["username"],$_POST["password"],$_POST["openname"],$_POST["email"],$_POST["Huidige_Afbeelding"], $_POST["port"])){
    
    $Huidig = $_POST['Huidige_Afbeelding'];
    $Afbeelding = $_FILES['image'];
    $Tijdelijk = $Afbeelding['tmp_name'];
    $Afbeeldingnaam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "uploads/";
    $unlink = "../";
    $Toegestaan = array("image/jpg","image/jpeg", "image/png", "image/gif");
    $sql = "";
    
    if (empty($Afbeelding) || $Afbeelding['size'] == 0) {
        $sql = "UPDATE users SET `username`=?, `password`=?, `openname`=?, `email`=?,`adres`=?,`phone`=?, `porto`=? WHERE id=1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $_POST["username"], sha1($_POST["password"]), $_POST["openname"], $_POST["email"], $_POST["adres"], $_POST["phone"], $_POST["port"]);
    
        $stmt->execute();
        $stmt->close();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/profile.php?error=mysql');
    } 
}
elseif ($Afbeeldingnaam != $Huidig && in_array($type, $Toegestaan)) {
    unlink($unlink.$Huidig);
    $afbeelding = $map.$Afbeeldingnaam;
    $new_str = str_replace(' ', '', $afbeelding);
    $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $new_str = $map . uniqid() . "_" . uniqid() . "." . $fileExt;
    move_uploaded_file($Tijdelijk, "../".$new_str);
    $sql = "UPDATE users SET `username`=?, `password`=?, `openname`=?, email=?, `adres`=?,`phone`=?, `profile`=?, `phone`=?, `porto`=? WHERE id=1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssss", $_POST["username"], sha1($_POST["password"]), $_POST["openname"], $_POST["email"], $_POST["adres"], $new_str, $_POST["phone"], $_POST["port"]);
        $stmt->execute();
        $stmt->close();
        header("Location: ../admin/dashboard.php");
    } 
    else {
        header('Location: ../admin/profile.php?error=mysql');
    } 
}else{
    header('Location: ../admin/profile.php?error=image_niet_geupload');
}

}
else {
    header('Location: ../admin/profile.php?error=fields');
}
?>