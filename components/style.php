<?php
$profileid = "059977c4-1c8e-4a83-a347-fd4e4c446191";
$profilequery = $conn->prepare("SELECT `profile`, `openname`, `email` FROM `admin` WHERE `ID` = ?");
    $profilequery->bind_param("i", $profileid);
	$profilequery->execute();
	$profilequery->store_result();
if ($profilequery->num_rows > 0) {
    $profilequery->bind_result($profilepic, $open, $emailen);
    $profilequery->fetch();
}else{
    $profilequery->error_list();
}
$profilequery->close();
?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $profilepic ?>">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawsome.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">