<?php
session_start();
require('database.php');
if (!isset($_SESSION["loggedin"])) {
	header("Location: ../index.php");
	exit();
}

// Insert into DATABASE
if(isset($_POST["title"], $_POST["text"], $_POST["subtext"], $_POST['Huidige_Afbeelding'])){
    
    $Huidig = $_POST['Huidige_Afbeelding'];
    $Afbeelding = $_FILES['image'];
    $Tijdelijk = $Afbeelding['tmp_name'];
    $Afbeeldingnaam = $Afbeelding['name'];
    $type = $Afbeelding['type'];
    $map = "uploads/";
    $unlink = "../";
    $Toegestaan = array("image/jpg","image/jpeg", "image/png", "image/gif");
    $sql = "";
    //if it has no image dont put the post in a query
    if (empty($Afbeelding) || $Afbeelding['size'] == 0) {
    $sql = "UPDATE projects SET title=?, subtext=?, text=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $_POST['title'], $_POST['subtext'], $_POST['text'], $_GET['id']);
        $stmt->execute();
        //$stmt->close();
        header("Location: ../admin/dashboard.php");
    }
    else {
        header('Location: ../admin/changepost.php?error=mysql');
    }
}//but if it does have an image and the image is not the same image then we will proceed to put it in the query and unlink the previous set image
elseif ($Afbeeldingnaam != $Huidig && in_array($type, $Toegestaan)) {
        unlink($unlink.$Huidig);
        $imagenew = $map.$Afbeeldingnaam;
        $new_str = str_replace(' ', '', $imagenew);
        move_uploaded_file($Tijdelijk, "../".$new_str);
        $sql = "UPDATE projects SET title=?, subtext=?, text=?, headimage=? WHERE id=?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssi", $_POST['title'], $_POST['subtext'], $_POST['text'], $new_str, $_GET['id']);
            $stmt->execute();
            //$stmt->close();
            header("Location: ../admin/dashboard.php");
        }
        else {
            header('Location: ../admin/changepost.php?error=mysql');
        }
    }else {
        header('Location: ../admin/changepost.php?error=image_niet_geupload');
    }
}else {
    header('Location: ../admin/changepost.php?error=fields');
}
?>