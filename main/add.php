<?php
ob_start();
session_start();
require_once "../Database/Database.php";
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password = mysqli_real_escape_string($conn, trim(md5($_POST['password'])));
$sql = "SELECT username FROM user WHERE username ='" . $username . "'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
$cf = trim($_POST['cfpassword']);
if ($result) {
    echo "<script>alert('Username is used!')</script>";
    header("Refresh:0 , url = member.html");
    exit();
} else {
    if (trim($_POST['username']) != null && trim($_POST['password']) != null && trim($_POST['name']) != null && trim($_POST['cfpassword']) != null && trim($_POST['cfpassword']) == trim($_POST['password'])) {
        if (strlen($password) >= 8 && strlen($cf) >=8) {
            $sql = "INSERT INTO user (username,password,name) VALUES ('" . trim($_POST['username']) . "','" . trim(md5($_POST['password'])) . "','" . trim($_POST['name']) . "')";
            if ($conn->query($sql)) {
                echo "<script>alert('Registration is complete.')</script>";
                header("Refresh:0 , url = ../index.html");
                exit();
            } else {
                echo "<script>alert('Registration isn't complete.')</script>";
                header("Refresh:0 , url = member.html");
                exit();
            }
        } else {
            echo "<script>alert('Please enter new password,password characters should be at least 8 characters.')</script>";
            header("Refresh:0 , url = member.html");
            exit();
        }
    } else {
        echo "<script>alert('Please enter new information or the password does not match.')</script>";
        header("Refresh:0 , url = member.html");
        exit();
    }
    mysqli_close($conn);
}
