
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Temu Kembali</title>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-top">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="logo">
                                        <h2><a href="index.php">Sistem Temu Kembali Informasi Toko Online Menggunakan Algoritma Dice</a></h2>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12 col-xs-12">
                                    <div class="menu">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="index.php">HOME</a></li>
                                            <li><a href="koneksi.php">Koneksi</a></li>
                                            <li><a href="buatberita.php">Buat Dokumen</a></li>
                                            <li><a href="lihatberita.php">Lihat Dokumen</a></li>
                                            <li><a href="lowercase.php">Lower Case Dokumen</a></li>
                                            <li><a href="hapustandabaca.php">Hapus Tanda Baca</a></li>
                                            <li><a href="tokenisasi.php">Tokenisasi Kata</a></li>
                                            <li><a href="hasiltokenisasikata.php">Hasil Token Kata</a></li>
                                            <li><a href="datastopword.php">Data Stopword</a></li>
                                            <li><a href="prosesstopword.php">Proses Stopword</a></li>
                                            <li><a href="prosesstemming.php">Proses Stemming</a></li>
                                            <li><a href="tf.php">Term Frequency</a></li>
                                            <li><a href="idf.php">Invers Document Frequency</a></li>
                                            <li><a href="tfidf.php">TF.IDF</a></li>
                                            <li><a href="search.php">Tfidf1</a></li>
                                            <li><a href="search1.php">Tfidf2</a></li>
                                            <li><a href="search2.php">Tfidf3</a></li>
                                            <li><a href="searchjaccard1.php">Jaccard1</a></li>
                                            <li><a href="searchjaccard2.php">Jaccard2</a></li>
                                            <li><a href="searchjaccard3.php">Jaccard3</a></li>
                                            <li><a href="searchdice1.php">Dice1</a></li>
                                            <li><a href="searchdice2.php">Dice2</a></li>
                                            <li><a href="searchdice3.php">Dice3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
   body {margin:0;}
   #latar {
      background-position: center;
      background-size: cover;
      position: relative;
      background-image: url(wah.jpg);
      height:100vh;
   }
   .tembus {
      position:relative;
      top:33%;
      background-color: rgba(0, 150, 0, 0.2);
      height:200px;
      width:100%;
      display:flex;
      justify-content:center;
   }
   .teks {text-align:center; font-family:Arial;}
   h1 {font-size:40px; color:#009900;}
   h3 {font-size:24px; color:#2288ee;}
   p {color:#f55;}
</style>

<?php
include 'koneksi.php';
?>

<body>
<form method='POST'>
<table>
<tr><td><b>Judul Berita: </b></td> <td><input  type='text' name='judul' style='width:500px' /></td></tr>
<tr><td><b>Isi berita: </b> </td><td><textarea name='isi' cols='100' rows='10' tabindex='4'></textarea></td><tr>
<tr><td><b>URL: </b></td> <td><input  type='text' name='url' style='width:300px' /></td></tr>
</table>
          <input type="submit" value="Tambah!" name="BtnAdd" ></td>
</body>  
</form>

<?php
if(isset($_POST['BtnAdd'])){ // jika tombol 'BtnAdd' di klik, lakukan proses:
// ambil judul, isi berita, url
$judul1 = $_POST['judul'];
$isi1 = $_POST['isi'];
$url1 = $_POST['url'];
$id1 = str_replace(" ", "_", $judul1); // replace spasi dgn '_' utk dijadikan id_berita/

// masukkan ke database
		$query = "INSERT INTO berita VALUES ('$id1','$judul1','$isi1','$url1')"; 
		$insert_query  = mysqli_query($koneksi,$query);
}

?>