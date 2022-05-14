<?php
session_start();
require('database.php');
if(!isset($_SESSION["token"]) || $_SESSION["token"] !== $_POST["token"]){
        echo "Wrong Token";
        header("Location: ../enquete.php?return=ongeldigetoken");
}
// Insert into DATABASE
if(isset($_POST["naam"], $_POST["email"], $_POST["kilometer"], $_POST['min'], $_POST['middel'], $_POST['begin'], $_POST['eind'],$_POST['opmerkingen'])){
    //Hier zorgen we ervoor dat we geen speciale karakters meeversturen.
$naam = strip_tags(htmlspecialchars($_POST['naam']));
$kilometer = strip_tags(htmlspecialchars($_POST['kilometer']));
$min = strip_tags(htmlspecialchars($_POST['min']));
$middel = strip_tags(htmlspecialchars($_POST['middel']));
$begin = strip_tags(htmlspecialchars($_POST['begin']));
$eind = strip_tags(htmlspecialchars($_POST['eind']));
$opmerkingen = strip_tags(htmlspecialchars($_POST['opmerkingen']));

//Get the video string
$studentnummer = str_replace('@glr.nl', '', $_POST['email']);

//Valideer email
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../enquete.php?return=ongeldigeemail");
}
    if ($database->insert("enquetes", ["id" => intval($studentnummer), "naam"=> $naam, "email"=> $_POST['email'], "kilometer"=> $kilometer, "min"=> $min, "middel" => $middel, "begin" => $begin, "eind" => $eind, "opmerkingen" => $opmerkingen])) {
        header("Location: ../enquete.php?return=verzend");
    } 
    else {
        header('Location: ../enquete.php?return=mysql');
    } 
} else {
    header('Location: ../enquete.php?return=fields');
}