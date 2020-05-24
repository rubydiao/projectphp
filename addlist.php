<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>หน้าเพิ่มสินค้า</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Mitr", sans-serif;
            background-color: rgb(240, 187, 228);
        }

        .header {
            position: relative;
            left: -7px;
            height: 100%;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: "Mitr", sans-serif;
            margin-top: -10px;
            bottom: 0;
            background-color: rgb(248, 140, 210);
        }

        .header p {
            margin-left: 20px;
            text-align: left;
        }

        .button-logout {
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: 0.05px solid black;
            border-radius: 15px;
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
        }

        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }

        .container {
            margin-left: 480px;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;

        }

        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }

        table {
            width: 100%;
        }

        th {
            color: white;
            background-color: rgb(248, 140, 210);
        }

        tr {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .timeregis {
            text-align: center;
        }

        .form-group {
            margin-left: 600px;
        }

        [type=text], [type=number] {
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: 0.05px solid;
            padding: 7px 200px 7px 5px;
        }

        .return {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
        }

        .return:hover {
            background-color: #fdb515;
            color: white;
        }

        .modify {
            border-radius: 15px;
            border: 0.05px solid;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #00A600;
            font-family: "Mitr", sans-serif;
        }

        .modify:hover {
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>

<body>
    <div class="header">
        <p>Ⓒ Narutchai Co. Ltd , 2020</p>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Log out</a>
    </div>
    <div class="container">
        <h1>List of product:</h1>
        <h2>Hello : (username) [<?php echo $username ?>]</h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Order</th>
                <th scope="col">ID:Product</th>
                <th scope="col">List</th>
                <th scope="col">Amount</th>
                <th scope="col">Date Regis:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <div class="addproduct">
            <form method="POST" action="main/addlist.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">List product : </label>
                    <br>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount : </label>
                    <br>
                    <input type="number" class="form-control" name="amount" required> </div> <br>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Add</button>
                    <a name="" id="" class="return" href="list.php" role="button" style="float:left">Return</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>