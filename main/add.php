<?php
    session_start();
    require_once "../Database/Database.php";
    if($_POST['username'] != null && $_POST['password'] != null && $_POST['name'] != null && $_POST['cfpassword'] != null && $_POST['cfpassword']==$_POST['password']){
        $sql = "INSERT INTO user (username,password,name) VALUES ('". trim($_POST['username']). "','". trim(md5($_POST['password'])). "','". trim($_POST['name']). "')";
        if($conn->query($sql)){
            echo "<script>alert('สมัครสมาชิกเสร็จสิ้น')</script>";
            header("Refresh:0 , url = ../index.html");
            exit();

        }
        else{
            echo "<script>alert('สมัครสมาชิกไม่สำเร็จ')</script>";
            header("Refresh:0 , url = member.php");
            exit();

        }
    }
    else{
        echo "<script>alert('กรุณากรอกข้อมูลใหม่ หรือ รหัสผ่านไม่ตรงกัน')</script>";
        header("Refresh:0 , url = member.php");
        exit();

    }
?>