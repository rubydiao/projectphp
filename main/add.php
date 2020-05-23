<?php
    session_start();
    require_once "../Database/Database.php";
    if($_POST['username'] != null && $_POST['password'] != null && $_POST['name'] != null && $_POST['cfpassword'] != null && $_POST['cfpassword']==$_POST['password']){
        $sql = "INSERT INTO user (username,password,name) VALUES ('". trim($_POST['username']). "','". trim(md5($_POST['password'])). "','". trim($_POST['name']). "')";
        if($conn->query($sql)){
            echo "<script>alert('Registration is complete.')</script>";
            header("Refresh:0 , url = ../index.html");
            exit();

        }
        else{
            echo "<script>alert('Registration isn't complete.')</script>";
            header("Refresh:0 , url = member.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please enter new information or the password does not match.')</script>";
        header("Refresh:0 , url = member.php");
        exit();

    }
?>