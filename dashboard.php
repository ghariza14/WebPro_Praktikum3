<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:#f4f4f4;
}
.app{display:flex}

.sidebar{
    width:220px;
    height:100vh;
    background:#265a39;
    color:white;
    padding:20px;
}
.sidebar a{
    color:white;
    display:block;
    margin-top:10px;
    text-decoration:none;
}

.main{
    flex:1;
    padding:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
}
input,button{
    padding:8px;
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

<div class="app">

<div class="sidebar">
<h2>GreenDayeuh</h2>
<p>Halo, <?php echo $_SESSION['name']; ?></p>

<a href="#">🏠 Home</a>
<a href="#">📝 Laporan</a>
<br>
<a href="logout.php">Logout</a>
</div>

<div class="main">

<div class="card">
<h3>Input Laporan</h3>

<form action="create.php" method="POST">
<input type="text" name="nama" placeholder="Nama"><br>
<input type="text" name="kategori" placeholder="Kategori"><br>
<input type="text" name="deskripsi" placeholder="Deskripsi"><br>
<button type="submit">Kirim</button>
</form>
</div>

<div class="card">
<h3>Data Laporan</h3>

<?php
if(file_exists("laporan.txt")){
    $data = file("laporan.txt");

    foreach($data as $d){
        list($nama,$kategori,$deskripsi)=explode("|",trim($d));
        echo "<b>Nama:</b> $nama <br>";
        echo "<b>Kategori:</b> $kategori <br>";
        echo "<b>Deskripsi:</b> $deskripsi <br><hr>";
    }
}else{
    echo "Belum ada data";
}
?>
</div>

</div>
</div>

</body>
</html>