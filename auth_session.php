<?php
session_start();
if(!isset($_Session["username"])) {
    header("Location: login.php");
    exit();
}

?>