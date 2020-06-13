<?php
    session_start();
    if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="dp.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="manage.css">
</head>
<body>
    <div class = "content">
        <h1>Login Admin</h1>
        <form action="manage.php" method="POST">
            <label for="username">Username: </label>
            <br>
            <input type="text" name="username" placeholder="Your username :" required>
            <br>
            <label for="pass">Password: </label>
            <br>
            <input type="password" name="password" placeholder="Your password :" required>
            <br>
            <input type="submit" value="Sign in">
        </form>
        <a href="list.php" class="regis">Come back to list page</a>
    </div>
    <div class="footer">
        <p>Ⓒ Narutchai Co. Ltd , 2020</p>
    </div>
</body>
</html>