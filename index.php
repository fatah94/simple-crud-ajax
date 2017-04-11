<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Ajax</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
	<script type="text/javascript" src="fungsi.js"></script>
</head>
<body onload="tampilsemua()">
<h1>Inventory Barang</h1>
<p>
<span id="btninput" onclick="forminput()">Input Barang</span>
</p><hr>
<form method="get" name="brg">
	<h2 id="namahead">Input Barang</h2>
	<label>Kode</label>:
	<input type="text" name="kode" id="kode" placeholder="harus diisi"><br>
	<label>Nama</label>:
	<input type="text" name="nama" id="nama" placeholder="harus diisi"><br>
	<label>Satuan</label>:
	<input type="text" name="satuan" id="satuan" placeholder="harus diisi"><br>
	<label>Harga</label>:
	<input type="text" name="harga" id="harga" placeholder="harus diisi"><br>
	<label>Jumlah Stok</label>:
	<input type="text" name="stok" id="stok" placeholder="harus diisi"><br>
	<input type="button" value="Save" id="btn" onclick="tambahdata('tambah')">
	<input type="reset" value="Reset">
	<hr>
</form>
<h3>Daftar Barang</h3>
<table border="1" cellpadding="5%" align="center">
	<tr>
		<th>Kode</th>
		<th>Nama</th>
		<th>Satuan</th>
		<th>Harga</th>
		<th>Jumlah Stok</th>
		<th>Operasi</th>
	</tr>
	<tbody id='responds' align="center"></tbody>
</table>
</body>
</html>