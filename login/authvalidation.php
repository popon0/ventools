<?php include "../database/connection.php";
session_start();
$user = $_POST["username"];
$plain_pass = $_POST["password"];
$enc_pass = sha1($plain_pass);
$username = mysqli_real_escape_string($conn, $user);
$password = mysqli_real_escape_string($conn, $enc_pass);
if (empty($username) && empty($password)) {
    header("location:index.php?error=Username dan Password Kosong!");
} elseif (empty($username)) {
    header("location:index.php?error=Username Kosong!");
} elseif (empty($password)) {
    header("location:index.php?error=Password Kosong!");
}
$check = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'"
);
$row = mysqli_fetch_array($check);
if (mysqli_num_rows($check) == 1) {
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_name"] = $username;
    $_SESSION["user_fullname"] = $row["user_fullname"];
    $_SESSION["user_level"] = $row["user_level"];
    if ($_SESSION["user_level"] == "admin") {
        header("location:../pages/dashboard.php");
    } elseif ($_SESSION["user_level"] == "user") {
        header("location:../pages/dashboard.php");
    }
} else {
    header("location:../index.php");
} ?>
