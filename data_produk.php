<?php
session_start();
include 'koneksi.php';
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
            <h1>Data Produk</h1>
            <div class="box">
                <p><a href="tambah_produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width = "60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width = "150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN tb_category USING (category_id) ORDER BY produk_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                        WHILE($row = mysqli_fetch_array($produk)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['produk_name'] ?></td>
                            <td>Rp. <?php echo number_format ($row['produk_price']) ?></td>
                            
                            <td><a href="produk/<?php echo $row['produk_image'] ?>" target="_blank"><img src="produk/<?php echo $row['produk_image'] ?>"width="80px"></a></td>
                            <td><?php echo ($row['produk_status'] == 0)? 'Tidak Aktif':'Aktif' ?></td>
                            <td>
                                <a href="edit_produk.php?id=<?php echo $row['produk_id']?>">Edit</a> || <a href="hapus_produk.php?idp=<?php echo $row['produk_id']?>">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                        <tr>
                        <td colspan="7">Tidak ada data</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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