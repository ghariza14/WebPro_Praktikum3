<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = fopen("users.txt", "a");
    fwrite($file, $name."|".$email."|".$password."\n");
    fclose($file);

    echo "<script>alert('Berhasil daftar'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
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
}
input,button{
    width:100%;
    padding:10px;
    margin-top:10px;
}
button{
    background:#28c76f;
    color:white;
    border:none;
}
</style>
</head>

<body>

<div class="box">
<h2>Register</h2>

<form method="POST">
<input type="text" name="name" placeholder="Nama" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="submit">Daftar</button>
</form>

</div>

</body>
</html>