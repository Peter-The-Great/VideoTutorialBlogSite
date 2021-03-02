<?php
    session_start();
    require("../database.php");
    if(!isset($_POST["username"], $_POST["password"]) ) {
        session_destroy();
        header("Location: ../../admin/index.php?error=veld");
        return false;
    }

//here we are making a prepared statement so that we can use it to find our user.
    if($stmt = $conn->prepare("SELECT id,username,password FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $_POST["username"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $password);
            $stmt->fetch();
            //check for password and keep password in mind
            $pswrd = $_POST["password"];
            //for later if you want to change password
            $_SESSION['wachtwoord'] = $pswrd;
            if (sha1($pswrd) === $password) {
                session_regenerate_id();
                $_SESSION["loggedin"] = TRUE;
                $_SESSION["name"] = $username;
                $_SESSION["id"] = $id;
                header("Location: ../../admin/dashboard.php");
            } else {
                session_start();
                session_destroy();
                header("Location: ../../admin/index.php?error=pass");
            }
        } else {
            session_start();
            session_destroy();
            header("Location: ../../admin/index.php?error=db");
        }
        $stmt->close();
    }
?>