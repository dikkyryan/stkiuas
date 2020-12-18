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
<?php
include "koneksi.php";
$query="delete from katakunci where id='0'";
$result=mysqli_query($koneksi,$query);

echo "<p align=center></p";

$keyword = $_GET["keyword"]; // ambil keyword

   $search_exploded = explode(" ",$keyword); // hilangkan keyword dari spasi

   // 
   $x=0;
   $construct="";   
   foreach($search_exploded as $search_each)
   {
   // membuat query utk pencarian
   $x++;
    if ($x==1){
     $construct .= " kata LIKE '%$search_each%'";

	 }
    else
     {
	 $construct .= " OR kata LIKE '%$search_each%'"; // query jika kata lebih dari 1
	 }
$query="insert into katakunci values('0','$search_each')";
$result=mysqli_query($koneksi,$query);	 
   }
   
	// tampilkan kotak pencarian dan jumlah hasil pencarian

	  echo "<br /><br><table><tr><td></td><td><form action='searchsjaccard1.php' method='GET'><input type='text' onclick=value='' size='50' name='keyword' value='$keyword' style='width: 500px; height: 30px; font-size: 16px;'> <input type='submit' value='Search'></form></td></tr></table>";
// select distinct utk mengambil berita agar tdk duplikasi
?>

<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>Kata</td>
<td>A</td>
<td>Jml Kata Kunci</td>
<td>B</td>
<td>Jml Kata Dokumen</td>
<td>C</td>
<td>Jaccard</td>
</tr><br><br>



<!--
<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>Judul</td>
<td>Isi</td>
<td>Url</td>
</tr><br><br>-->
<?php
 
$query="SELECT g.id id,kata, A, jmlkatakunci, B, jmlkatadok, jmlkatadok-A C, A/(A+B+(jmlkatadok-A)) jaccard FROM (SELECT *,jmlkatakunci-A B FROM (SELECT y.id,y.kata,y.freq A FROM (SELECT * FROM katakunci WHERE id='0') AS x JOIN (SELECT * FROM token WHERE id!='0' ORDER BY id+0) as Y ON x.kata=y.kata) AS d JOIN (SELECT COUNT(kata) jmlkatakunci FROM katakunci) AS e) AS f JOIN (SELECT id,COUNT(kata) jmlkatadok FROM token GROUP BY id) AS g ON f.id=g.id GROUP BY g.id ORDER BY jaccard DESC";
//$query="SELECT y.id,z.judul,z.isi,z.url,y.tf_idf FROM (SELECT * FROM (SELECT g.id id,g.kata kata,g.freq,g.jmlkata,g.tf tf,h.jmldok,h.katajmldok,h.idf idf,(g.tf*h.idf) tf_idf from (SELECT a.id,a.kata,a.freq,b.jmlkata,(a.freq/b.jmlkata) tf FROM (SELECT id,kata,SUM(freq) freq FROM token GROUP BY id,kata ORDER BY id+0,NO+0) AS a JOIN (SELECT id,SUM(freq) jmlkata FROM token GROUP BY id+0) AS b ON a.id=b.id) AS g JOIN (SELECT kata,f.jmldok,e.katajmldok,LOG10(f.jmldok/e.katajmldok) idf FROM (SELECT kata,COUNT(kata) katajmldok FROM (SELECT id,no,kata,SUM(freq) freq FROM token GROUP BY id,kata ORDER BY id+0,NO+0) AS d GROUP BY kata ORDER BY id+0,NO+0) AS e JOIN (SELECT COUNT(id) jmldok FROM (SELECT id FROM token GROUP BY id+0) AS c) AS f) AS h ON g.kata=h.kata) AS s WHERE $construct ORDER BY tf_idf DESC) AS y INNER JOIN (SELECT * FROM berita) AS z ON y.id=z.id";
$result=mysqli_query($koneksi,$query);
$numrows=mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td><font color=blue></font>" . " $row[id] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[kata] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[A] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[jmlkatakunci] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[B] " . "<br></td>";
echo "<td><font color=blue></font>" . " $row[jmlkatadok] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[C] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[jaccard] " . "<br></td>";  
echo "</tr>";
$no++;
}
?>


</html>