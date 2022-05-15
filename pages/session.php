<?php session_start();
if ($_SESSION["user_level"] == "admin") {
    include "connection.php";
} elseif ($_SESSION["user_level"] == "user") {
    include "connection.php";
} else {
    header("location:../index.php");
} ?>
