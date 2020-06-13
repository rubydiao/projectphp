<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = trim($_POST['username']);
$password = trim(md5($_POST['password']));
$sql_select = "SELECT username,password FROM admin WHERE username = '" . $username . "' and password = '" . $password . "'";
$query = mysqli_query($conn, $sql_select);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
if (!$result) {
    echo "<script>alert('Username or Password , Invalid.');</script>";
    header("Refresh:0 , url=manage_user.php");
    exit();
} 
else {
    session_start();
    $_SESSION['username'] = $result['username'];
    header("Location: list_user.php");
}
mysqli_close($conn);
?>
