<?php
include "index.php";
include "koneksi.php";

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
	 //echo "$construct";
	 //echo '<br/>';
	 }
    else
     {
	 $construct .= " OR kata LIKE '%$search_each%'"; // query jika kata lebih dari 1
	 //echo "$construct";
	 } 
   }
   
	// tampilkan kotak pencarian dan jumlah hasil pencarian

	  echo "<br /><br><table><tr><td></td><td><form action='searchsjaccard3.php' method='GET'><input type='text' onclick=value='' size='50' name='keyword' value='$keyword' style='width: 500px; height: 30px; font-size: 16px;'> <input type='submit' value='Search'></form></td></tr></table>";
// select distinct utk mengambil berita agar tdk duplikasi
?>

<?php


//$query="select * from (SELECT g.id id,g.kata kata,g.freq,g.jmlkata,g.tf tf,h.jmldok,h.katajmldok,h.idf idf,(g.tf*h.idf) tf_idf from (SELECT a.id,a.kata,a.freq,b.jmlkata,(a.freq/b.jmlkata) tf FROM (SELECT id,kata,SUM(freq) freq FROM token GROUP BY id,kata ORDER BY id+0,NO+0) AS a JOIN (SELECT id,SUM(freq) jmlkata FROM token GROUP BY id+0) AS b ON a.id=b.id) AS g JOIN (SELECT kata,f.jmldok,e.katajmldok,LOG10(f.jmldok/e.katajmldok) idf FROM (SELECT kata,COUNT(kata) katajmldok FROM (SELECT id,no,kata,SUM(freq) freq FROM token GROUP BY id,kata ORDER BY id+0,NO+0) AS d GROUP BY kata ORDER BY id+0,NO+0) AS e JOIN (SELECT COUNT(id) jmldok FROM (SELECT id FROM token GROUP BY id+0) AS c) AS f) AS h ON g.kata=h.kata) as x where $construct order by tf_idf DESC";
//$query="SELECT y.id,z.judul,z.isi,z.url,y.tf_idf FROM (SELECT * FROM (SELECT g.id id,g.kata kata,g.freq,g.jmlkata,g.tf tf,h.jmldok,h.katajmldok,h.idf idf,(g.tf*h.idf) tf_idf from (SELECT a.id,a.kata,a.freq,b.jmlkata,(a.freq/b.jmlkata) tf FROM (SELECT id,kata,SUM(freq) freq FROM token GROUP BY id,kata ORDER BY id+0,NO+0) AS a JOIN (SELECT id,SUM(freq) jmlkata FROM token GROUP BY id+0) AS b ON a.id=b.id) AS g JOIN (SELECT kata,f.jmldok,e.katajmldok,LOG10(f.jmldok/e.katajmldok) idf FROM (SELECT kata,COUNT(kata) katajmldok FROM (SELECT id,no,kata,SUM(freq) freq FROM token GROUP BY id,kata ORDER BY id+0,NO+0) AS d GROUP BY kata ORDER BY id+0,NO+0) AS e JOIN (SELECT COUNT(id) jmldok FROM (SELECT id FROM token GROUP BY id+0) AS c) AS f) AS h ON g.kata=h.kata) AS s WHERE $construct ORDER BY tf_idf DESC) AS y INNER JOIN (SELECT * FROM berita) AS z ON y.id=z.id";
$query="SELECT * FROM (SELECT g.id id,kata, A, jmlkatakunci, B, jmlkatadok, jmlkatadok-A C, A/(A+B+(jmlkatadok-A)) jaccard FROM (SELECT *,jmlkatakunci-A B FROM (SELECT y.id,y.kata,y.freq A FROM (SELECT * FROM katakunci WHERE id='0') AS x JOIN (SELECT * FROM token WHERE id!='0' ORDER BY id+0) as Y ON x.kata=y.kata) AS d JOIN (SELECT COUNT(kata) jmlkatakunci FROM katakunci) AS e) AS f JOIN (SELECT id,COUNT(kata) jmlkatadok FROM token GROUP BY id) AS g ON f.id=g.id GROUP BY g.id ORDER BY jaccard DESC) AS r JOIN (SELECT * FROM berita) AS s ON r.id=s.id"; 
$result=mysqli_query($koneksi,$query);
$numrows=mysqli_num_rows($result);
$no=1;
while($row = mysqli_fetch_array($result)){
echo "<p align='left'><font color=blue> <a href=" . " $row[url] " . "target='_blank'".">$row[url]</a>  " . "</font><br>" . " <font size='5' color=green> $row[judul] " . "</font><br>" . " $row[isi] " . "<br><br></p>"; 
$no++;
}
?>