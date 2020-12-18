<table border=1 cellpadding=5 cellspacing=0>
<tr>
<td>Id</td>
<td>Kode</td>
<td>Kata</td>
<td>Term Frequency</td>
<td>Document Frequency</td>
<td>Invers Document Frequency</td>
</tr>
<?php
include "index.php";
include "koneksi.php";

$query = "select *, log10(doc_freq/freq) invers from (select id,kode,kata,freq from stemming) as a join (select count(distinct id) doc_freq from stemming) as b;";
$result = mysqli_query($koneksi,$query);
$numrows = mysqli_num_rows($result);

$no=1;
while($row = mysqli_fetch_array($result)){
echo "<tr>";
$id1 = $row['id'];
$kode1 = $row['kode'];
$kata1 = $row['kata'];
$freq1 = $row['freq'];
$doc_freq1 = $row['doc_freq'];
$invers1 = $row['invers'];
echo "<td><font color=blue></font>" . " $row[id] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[kode] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[kata] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[freq] " . "<br></td>";
echo "<td><font color=blue></font>" . " $row[doc_freq] " . "<br></td>"; 
echo "<td><font color=blue></font>" . " $row[invers] " . "<br></td>"; 
echo "</tr>";
$no++;
//echo "ID: $numrows " . " Token : $row[term] " . " = $row[frequency]<br> ";
}
?>