<?php
error_reporting(0);
include 'koneksi.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);
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
        <h1><a href="index.php">Toko Baju</a></h1>
        <ul>
            <li><a href="produk.php">Produk</a></li>

</ul>
</div>
</header>
<!--search-->
<div class="search">
    <div class="container">
    <form action="produk.php">
        <input type="text" name="search" placeholder="Cari Produk">
        <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
        <input type="submit" name="cari" value="Cari Produk">
    </form>
    </div>
    </div>

    <!--produk detail-->
    <div class="section">
    <div class="container">
    <h2>Detail Produk</h2>
    <div class="box">
    <div class="col-2">
    <img src="produk/<?php echo $p->produk_image ?>" width="100%">
    </div>
    <div class="col-2">
    <h3><?php echo $p->produk_name ?></h3>
    <h4>Rp. <?php echo number_format($p->produk_price) ?></h4>
    <p>Deskripsi : <br>
    <?php echo $p->produk_deskripsi ?>
    </p>
    </div>
    </div>
    </div>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>
            
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No Hp</h4>
            <p><?php echo $a->admin_telp ?></p>

        <small>Copyright &copy; 2021 - TokoBuku.</small>
        </div>

    </div>
</body>
</html>