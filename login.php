<?php
session_start();
include_once 'app/Controller/Connect.php';
$dbconnect = new accdbconnect();
if (isset($_REQUEST['lg'])) {
    $username = $_POST['un'];
    $pass = $_POST['pw'];
    if ($username == "" || $pass == "") {
       $error='vui lòng nhập tài khoản mật khẩu';
    } else {
        $sql = "SELECT * FROM `member` WHERE `username`=? AND `pass`=?";
        $stmt = $dbconnect->connect()->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $pass);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user === false) {
           $error1='tài khoản or mật khẩu không đúng vui lòng nhập lại';
        } else {

            $_SESSION['username']=$username;
            header('location:indexwatch.php');
        }
    }
} elseif (isset($_POST['si'])) {
    header('location:signup.php');
}?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<form class="form-signin" style="text-align: center;background: #00cec9" method="post">
    <img class="mb-4" src="https://i.pinimg.com/originals/8d/ac/61/8dac61bd15f9e91587d6e5968bed3be0.gif" alt="" width="300"
         height="300">
    <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
    <input type="text" id="inputUser" class="form-control-lg" placeholder="Username" autofocus="" name="un"><br>
    <input type="password" id="inputPassword" class="form-control-lg" placeholder="Password" name="pw"><br>
    <button class="btn btn-primary" type="submit" name="lg">Login</button>
    <button class="btn btn-primary" type="submit" name="si">Singup</button>
 <div><?php if (isset($error)){echo " <p>$error</p>";} ?></div>
    <div><?php if (isset($error1)){echo " <p>$error1</p>";} ?></div>


</form>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
