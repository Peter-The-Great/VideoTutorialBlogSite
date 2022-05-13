<?php
$profile = $database->select("admin", ["profile", "realname", "email"], ["ID" => "52086616-c85c-4363-98f0-4dcd698ec356"])
?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $profile[0]['profile'] ?>">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawsome.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">