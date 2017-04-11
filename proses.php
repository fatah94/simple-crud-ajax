<?php 
	require 'koneksi.php';

	$operasi = $_GET['operasi'];

	if($operasi=='tambahdata'){
		$kode = $_GET['kode'];
		$nama = $_GET['nama'];
		$satuan = $_GET['satuan'];
		$harga = $_GET['harga'];
		$stok = $_GET['stok'];
		$kde = $_GET['kde'];
		if($kde=='tambah')
			mysqli_query($kon,"insert into barang values('$kode','$nama','$satuan','$harga','$stok')");
		else
			mysqli_query($kon,"update barang set nama='".$nama."', satuan='".$satuan."', harga='".$harga."', stok='".$stok."' where kode='".$kode."'");
		$operasi='tampilsemua';
	}

	if($operasi=='hapusdata'){
		$kode = $_GET['kode'];
		$hapusdata = mysqli_query($kon,"delete from barang where kode='".$kode."'");
		$operasi='tampilsemua';	
	}

	if($operasi=='tampilsingle'){
		$kode = $_GET['kode'];
		$ubahdata = mysqli_query($kon,"select * from barang where kode='".$kode."'");
		if($ubahdata){
			$hasil = mysqli_fetch_assoc($ubahdata);
			echo $hasil['kode']."-";
			echo $hasil['nama']."-";
			echo $hasil['satuan']."-";
			echo $hasil['harga']."-";
			echo $hasil['stok'];
		}
	}

	if($operasi=='tampilsemua'){
		$tampilsemua = mysqli_query($kon,'select * from barang');
		if(mysqli_num_rows($tampilsemua)>=1){
			while($hasil = mysqli_fetch_assoc($tampilsemua)){
				echo "<tr>";
				echo "<td>".$hasil['kode']."</td>";
				echo "<td>".$hasil['nama']."</td>";
				echo "<td>".$hasil['satuan']."</td>";
				echo "<td>".$hasil['harga']."</td>";
				echo "<td>".$hasil['stok']."</td>";
				echo "<td><button onclick=tampilsingle('".$hasil['kode']."')>Edit</button> ";
				echo "<button onclick=hapusdata('".$hasil['kode']."')>Delete</button></td>";
				echo "</tr>";	
			}
		}else echo "<tr><td colspan=6>Barang Kosong</td></tr>";
	}
?>