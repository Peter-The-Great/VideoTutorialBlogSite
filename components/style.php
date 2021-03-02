<?php
$profileid = 1;
$profilequery = $conn->prepare("SELECT `profile`, `openname`, `email`, `adres`, `phone`, `porto` FROM `users` WHERE `ID` = ?");
    $profilequery->bind_param("i", $profileid);
	$profilequery->execute();
	$profilequery->store_result();
if ($profilequery->num_rows > 0) {
    $profilequery->bind_result($profilepic, $open, $emailen, $adres, $phone, $porto);
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