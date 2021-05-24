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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
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
    <div class="section">
        <div class="container">
            <h1>Tambah Data Produk</h1>
            <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <SELECT class="input-control" name="kategori" required>
                <option value="">---PILIH---</option>
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                WHILE($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?>-</option>
                <?php } ?>
                </SELECT>
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                <input type="file" name="gambar" class="input-control" placeholder="" required>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                <SELECT class="input-control" name="status">
                <option value="">---PILIH---</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
                </SELECT>
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                //print_r($_FILES['gambar']);
                //menampung inputan dari form
                $kategori = $_POST['kategori'];
                $nama = $_POST['nama'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                //menampung data file yang diapload
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $tipe1 = explode('.',$filename);
                $tipe2 = $tipe1[1];
                $newname = 'produk'.time().'.'.$tipe2;
                //menampung data format file yang diizinkan
                $tipe_diizinkan = array('jpg','JPEG','png');
                //validasi format file
                if(!in_array($tipe2, $tipe_diizinkan)){
                    //jika format tidak ada tipe diizinkan
                    echo '<script>alert("format file tidak diizinkan")</script>';
                }else{
                    //jika format sesuai dengan array
                    //proses apload file sekaligus insert database
                    move_uploaded_file($tmp_name, './produk/'.$newname);

                    $insert = mysqli_query($conn, "INSERT INTO tb_produk VALUES (
                        null,
                        '".$kategori."',
                        '".$nama."',
                        '".$harga."',
                        '".$deskripsi."',
                        '".$newname."',
                        '".$status."',
                        null
                        )");

                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="data_produk.php"</script>';
                        }else{
                            echo 'Gagal'.mysqli_error($conn);
                        }
                }
               
            }
            ?>
</div>
</div>
</div>
<!--footer-->
<footer>
    <div class="container">
        <small>Copyright &copy; 2021 - Toko Baju</small>
</footer>
<script>
                        CKEDITOR.replace( 'deskripsi' );
                </script>
</body>
</html>