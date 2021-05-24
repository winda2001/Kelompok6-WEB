<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Toko Baju</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
    <header> 
        <div class="container">
        <h1><a href="dasboard.php">Toko Baju</a></h1>
        <ul>
            <li><a href="dasboard.php">Dasboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data_kategori.php">Data Kategori</a></li>
            <li><a href="data_produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
</ul>
</div>
</header>
<!-- content-->
<div>
    <div class="section">
        <div class="container">
            <h1>Dasboard</h1>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Toko Baju</h4>
</div>
</div>
</div>
<!--footer-->
<footer>
    <div class="container">
        <small>Copyright &copy; 2021 - Toko Baju</small>
</footer>
</body>
</html>