<?php
    session_start();
    require("../database.php");
    if(!isset($_POST["username"], $_POST["password"], $_POST["g-recaptcha-response"]) ) {
        session_destroy();
        header("Location: ../../admin/index.php?error=veld");
        return false;
    }
    if($_SESSION['ip'] !==  $_SERVER['REMOTE_ADDR']){
    header('Location: inlog.php?error=notthesameipadress');
    }
$response = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => $_ENV["RECAPTCHA_SECRET_KEY"], //Enter Captcha_Key
    'response' => $response
);
$options = array(
    'http' => array (
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen(http_build_query($data))."\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {
    header("Location: ../../admin/index.php?catpcha=false");
} else if ($captcha_success->success==true) {
    if(!isset($_SESSION["token"]) || $_SESSION["token"] !== $_POST["token"]){
        echo "Wrong Token";
        header("Location: ../../admin/index.php?error=token");
    }

    //here we are making a prepared statement so that we can use it to find our user.
    if ($stmt = $database->select("admin", ["id","username","password"], ["username" => $_POST['username']])) {
        //Here we check out the password and if the actually query got any information.
        if (count($stmt) == 1) {
            //check for password and keep password in mind
            $pswrd = $_POST["password"];
            //for later if you want to change password
            if (sha1($pswrd) === $stmt[0]["password"]) {
                session_regenerate_id();
                $_SESSION['wachtwoord'] = $pswrd;
                $_SESSION["loggedin"] = TRUE;
                $_SESSION["name"] = $stmt[0]["username"];
                $_SESSION["id"] = $stmt[0]["id"];
                header("Location: ../../admin/dashboard.php");
            } else {
                session_start();
                session_destroy();
                header("Location: ../../admin/index.php?error=pass");
            }
        } else {
            session_start();
            session_destroy();
            header("Location: ../../admin/index.php?error=sql");
        }
    }else{
        session_start();
        session_destroy();
        header("Location: ../../admin/index.php?error=db");
    }
    
}
?>
