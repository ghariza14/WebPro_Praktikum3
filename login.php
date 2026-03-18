<?php
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $users = file("users.txt");
    $login = false;

    foreach($users as $user){
        list($name, $u_email, $u_pass) = explode("|", trim($user));

        if($email == $u_email && $password == $u_pass){
            $_SESSION['login'] = true;
            $_SESSION['name'] = $name;
            header("Location: dashboard.php");
            exit;
        }
    }

    echo "<script>alert('Email atau password salah');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f5132,#2c7452,#8ca89c);
    font-family:Segoe UI;
}
.box{
    width:350px;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}
input,button{
    width:100%;
    padding:10px;
    margin-top:10px;
}
button{
    background:#265a39;
    color:white;
    border:none;
}
</style>
</head>

<body>

<div class="box">
<h2>Login</h2>

<form method="POST">
<input type="text" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>
</form>

</div>

</body>
</html>