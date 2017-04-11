<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "simplecrudajax";
$kon = mysqli_connect($host, $user, $pass);
if(!$kon)
	die("Gagal Koneksi...");
$hasil = mysqli_select_db($kon, $dbName);

if(!$hasil){
	$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
	if(!$hasil)
		die("Gagal Buat Database");
	else
		$hasil = mysqli_select_db($kon, $dbName);
	if(!$hasil) die ("Gagal Kondek Database");
	$sqlTabelBarang = "create table if not exists barang(
					kode varchar(40) not null primary key,
					nama varchar(40) not null,
					satuan varchar(40) not null,
					harga int not null,
					stok int not null,
					KEY(kode) )";
	mysqli_query ($kon, $sqlTabelBarang) or die("Gagal Buat Tabel Barang ");
}
?>