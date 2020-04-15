<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
  echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
  header("Refresh:0 , url=../index.html");
  exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
  <title>หน้าหลัก</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="section">
    <nav class="navbar navbar-success bg-success justify-content-between">
      <a class="navbar-brand" style = "color :white">Home</a>
      <form class="form-inline">
        <a name="" id="" class="btn btn-danger" href="index.html" role="button">ออกจากระบบ</a>
      </form>
    </nav>
  </div>
  <div class="container">
    <h1>รายการสินค้า</h1>
    <h2>สวัสดีคุณ : [<?php echo $username ?>]</h2>
  </div>
  <div class="table-product">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ลำดับ</th>
          <th scope="col">รายการสินค้า</th>
          <th scope="col">จำนวน</th>
          <th scope="col">วันที่ลงทะเบียน</th>
          <th scope="col">แก้ไข</th>
          <th scope="col">ลบ</th>
        </tr>
      </thead>
      <tbody>
        <?php $idpro = 0; ?>
        <?php while ($row = mysqli_fetch_array($query)) { ?>
          <tr>
            <?php $idpro += 1; ?>
            <th scope="row"><?php echo $idpro ?></th>
            <td><?php echo $row['proname'] ?></td>
            <td><?php echo $row['amount'] ?></td>
            <td><?php echo $row['time'] ?></td>
            <td><a name="edit" id="" class="btn btn-warning" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['proname']; ?> "
role="button">
                แก้ไข
              </a></td>
            <td><a name="id" id="" class="btn btn-danger" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                ลบ
              </a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
    <a name="" id="" class="btn btn-success" style="float:right" href="addlist.php" role="button">เพิ่มรายการ</a>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>