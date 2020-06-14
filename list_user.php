<?php
ob_start();
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM user ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);
?>
<!doctype html>
<html lang="en">
<head>
    <title>หน้าหลัก</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="list_user.css">
</head>
<body>
    <div class="header">
        <p>Ⓒ Narutchai Co. Ltd , 2020</p>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Log out</a>
    </div>
    <div class="container">
        <h1>List of user :</h1>
        <h2>Hello : [<?php echo $username ?>]</h2>
    </div>
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">Order</th>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Name-Surname</th>
                <th scope="col">Time-Registration</th>
                <th scope="col">Delete</th>
            </tr>
            <tbody>
                <?php
                $id_user = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $id_user ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td class="user"><?php echo $row['username'] ?></td>
                        <td class="myname"><?php echo $row['name'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="delete_user.php?id=<?php echo $row['id'] ?>" role="button">
                                Delete
                            </a></td>
                    </tr>
                <?php
                    $id_user++;
                } ?>
            </tbody>
        </table>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>