<?php
    ob_start();
    session_start();
    require_once "Database/Database.php";
    if ($_SESSION['username'] == null){
        echo "<script>alert('Please login.')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    }
    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM user WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    $row = mysqli_fetch_assoc($query_delete,MYSQLI_ASSOC);
    if(!$row){
        echo "<script>alert('Success Deleted')</script>";        
        header("Refresh: 0 , url = list_user.php");
        exit();
    }
    else{
        echo "<script>alert('Fail Delete')</script>";
        header("Refresh: 0 , url = list_user.php");
        exit();
    }
    mysqli_close($conn);
?>