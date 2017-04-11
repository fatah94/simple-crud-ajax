vrb =['kode','nama','satuan','harga','stok'];
    
function buatobjekajax(){
	if(window.XMLHttpRequest)
		return new XMLHttpRequest();
	else if(window.ActiveXObject)
		return new ActiveXObject("Microsoft.XMLHTTP");
	else alert("Browser tidak mendukung ajax");
}

function tampilsemua(){
	ajax = buatobjekajax();
	var url = "proses.php?operasi=tampilsemua";
	url=url+"&sid="+Math.random(); 
	ajax.open("GET",url,true);
	ajax.onreadystatechange=function(){
		if (ajax.readyState==4)
 			document.getElementById('responds').innerHTML=ajax.responseText;
 	};
	ajax.send(null);
}

function hapusdata(kode){
	ajax = buatobjekajax();
	var url = "proses.php?operasi=hapusdata&kode="+kode;
	url=url+"&sid="+Math.random(); 
	ajax.open("GET",url,true);
	ajax.onreadystatechange=function(){
		if (ajax.readyState==4)
 			document.getElementById('responds').innerHTML=ajax.responseText;
 	};
	ajax.send(null);
}

function tambahdata(kde){
	$kode =brg.kode.value;
	$nama = brg.nama.value;
	$satuan = brg.satuan.value;
	$harga = brg.harga.value;
	$stok = brg.stok.value;
	var idinput,ket="Harus diisi";
	if($kode.trim()!="" && $nama.trim()!="" && $satuan.trim()!="" && $harga.trim()!="" && $stok.trim()!=""){
		ajax = buatobjekajax();
		var url="proses.php?kode="+$kode+"&nama="+$nama+"&satuan="+$satuan+"&harga="+$harga+"&stok="+$stok+"&kde="+kde+"&operasi=tambahdata";
		url=url+"&sid="+Math.random(); 
	 	ajax.open("GET",url,true);
	 	ajax.onreadystatechange=function(){
			if (ajax.readyState==4)
	 		 	document.getElementById('responds').innerHTML= ajax.responseText;
	 	};
 	ajax.send(null); 
 	}
}

function tampilsingle(kode){
	formedit();
	ajax = buatobjekajax();
	var url="proses.php?operasi=tampilsingle&kode="+kode;
	url=url+"&sid="+Math.random(); 
 	ajax.open("GET",url,true);
 	ajax.onreadystatechange=function(){
		if (ajax.readyState==4){	
		   var x,data = ajax.responseText.split('-');   
    		for (var i = 0; i<vrb.length; i++) {
    			document.getElementById(vrb[i]).value = data[i];
    		}
		}
 	};
 	ajax.send(null); 
}

function forminput() {
	document.getElementById("btn").value='Save';
	brg.kode.value=brg.nama.value=brg.satuan.value=brg.harga.value=brg.stok.value="";
	document.getElementById("namahead").innerHTML='Input Barang';
	document.getElementById('kode').readOnly = false;
	document.getElementById("btn").setAttribute("onclick","tambahdata('tambah')");
}

function formedit() {
 	document.getElementById('kode').readOnly = true;
	document.getElementById("btn").value='Update';
	document.getElementById("namahead").innerHTML='Update Barang';
	document.getElementById("btn").setAttribute('onclick',"tambahdata()");
}