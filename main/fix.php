<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }
    if($_POST['name'] != null && $_POST['value'] != null){
        $sql = "UPDATE product SET proname = '" . trim($_POST['name']) . "' ,amount = '" . trim($_POST['value']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
            echo "<script>alert('Successfully resolved')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
        else{
            echo "<script>alert('Unsuccessful resolved')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>
