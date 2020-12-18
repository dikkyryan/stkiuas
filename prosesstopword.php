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

<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>No</td>
<td>Kode</td>
<td>Kata</td>
<td>Freq</td>

</tr>

<?php 
include "koneksi.php";

$query2 = "DELETE FROM token where kata IN (SELECT * FROM stopword)";
$result2 = mysqli_query($koneksi,$query2);
$query3 = "SELECT * FROM token";
$result3 = mysqli_query($koneksi,$query3);
$numrows = mysqli_num_rows($result3);
$no=1;
while($row = mysqli_fetch_array($result3)){  
echo "<tr>";

$id3 = $row['id'];
$no3 = $row['no'];
$kode3 = $row['kode']; 
$isi3 = $row['kata'];
$freq3 = $row['freq'];
echo "<td><font color=blue></font>" .  $id3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $no3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  $kode3 . "<br></td>"; 
echo "<td><font color=blue></font>" .  strtolower($isi3) . "<br></td>"; 
echo "<td><font color=blue></font>" .  $freq3 . "<br></td>"; 
echo "</tr>";
$no++;

}

?>