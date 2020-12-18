<?php

include 'index.php';
include 'koneksi.php';


// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){
	
	// ambil data dari formulir
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$url = $_POST['url'];
	
	// buat query
	$sql = "INSERT INTO berita (id, judul, isi, url) VALUE ('$id', '$judul', '$isi', '$url')";
	$query = mysqli_query($koneksi, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		header('Location: buatberita.php');
	} else {
		header('Location: buatberita.php?status=gagal');
	}
}

?>
