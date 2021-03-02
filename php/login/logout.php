<?php
//typical logout system or way of destroying the session completly.
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../../index.php");
?>