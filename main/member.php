<?php
session_start();
require_once "../Database/Database.php";
if ($_SESSION['username'] == null) {
  echo "<script>alert('กรุณาเข้าสู่ระบบ')</script>";
  header("Refresh:0 , url = ../index.html");
  exit();
}
$name = $_SESSION['username'];
$sql_fetch_todos = "SELECT * FROM user ORDER BY id DESC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
  <title>หน้าสมัครสมาชิก</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form action="add.php" method="post">
      <div class="section">
        <h1>สมัครสมาชิก</h1>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ชื่อผู้ใช้</label>
        <input type="text" class="form-control" name="username" required />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">ชื่อ-สกุล</label>
        <input type="text" class="form-control" name="name" required />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">รหัสผ่าน</label>
        <input type="password" class="form-control" name="password" required />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">ยืนยันรหัสผ่าน</label>
        <input type="password" class="form-control" name="cfpassword" required />
      </div>
      <div class="form-button">
        <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
      </div>
    </form>
    <br>
    <div class="form-button">
      <a name="" id="" class="btn btn-light" href="../index.html" role="button">มีบัญชีอยู่แล้วใช่ไหม กลับสู่หน้าเข้าสู่ระบบ</a>
    </div>
  </div>
  </form>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>