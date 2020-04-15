<?php
    session_start();
    require_once "../Database/Database.php";
    if ($_SESSION['username'] == null){
        echo "<script>alert('กรุณาเข้าสู่ระบบ')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();

    }
    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM product WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    $row = mysqli_fetch_assoc($query_delete,MYSQLI_ASSOC);
    if(!$row){
        echo "<script>alert('ลบสำเร็จ')</script>";        
        header("Refresh: 0 , url = ../list.php");
        exit();

    }
    else{
        echo "<script>alert('ลบไม่สำเร็จ')</script>";
        header("Refresh: 0 , url = ../list.php");
        exit();

    }
?>