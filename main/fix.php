<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('กรุณาเข้าสู่ระบบ')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }
    if($_POST['name'] != null && $_POST['value'] != null){
        $sql = "UPDATE product SET proname = '" . trim($_POST['name']) . "' ,amount = '" . trim($_POST['value']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('แก้ไขสำเร็จ')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
        else{
            echo "<script>alert('แก้ไขไม่สำเร็จ')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('กรุณากรอกข้อมูล')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }

?>
