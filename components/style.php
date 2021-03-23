<?php
$profilequery = $conn->prepare("SELECT `profile`, `realname`, `email` FROM `admin` WHERE `ID` = '52086616-c85c-4363-98f0-4dcd698ec356'");
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