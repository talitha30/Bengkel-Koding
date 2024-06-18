<?php
	if(isset($_GET['page'])){
		$page=$_GET['page'];
		//var_dump($page);
		switch ($page){
		    case 'data_obat': 
			   include "../data_obat.php";
			   break; 
        case 'tambah_obat':
                include '../tambah_obat.php';
                break;
        case 'ubah_obat';
                include '../ubah_obat.php';
                break;  
		}
	}if(isset($_GET['page'])){
		$page=$_GET['page'];
		//var_dump($page);
		switch ($page){
		    case 'data_dokter': 
			   include "../data_dokter.php";
			   break; 
        case 'tambah_dokter':
                include '../tambah_dokter.php';
                break;
        case 'ubah_dokter';
                include '../ubah_dokter.php';
                break;
		case 'jadwal_periksa';
				include 'jadwal_periksa.php';
				break;
		case 'ubah_jadwal_periksa';
				include 'ubah_jadwal_periksa.php';
				break;		
		case 'tambah_jadwal_periksa';
                include 'tambah_jadwal_periksa.php';
				break;
		case 'daftar_periksa_pasien';
				include 'daftar_periksa_pasien.php';
				break;
		case 'periksa_pasien';
				include 'periksa_pasien.php';
				break;
		case 'periksa_pasien_edit';
				include 'periksa_pasien_edit.php';
				break;
		}
		
	}if(isset($_GET['page'])){
		$page=$_GET['page'];
		//var_dump($page);
		switch ($page){
		    case 'dataa_pasien': 
			   include "../dataa_pasien.php";
			   break; 
        case 'tambah_pasien':
                include '../tambah_pasien.php';
                break;
        case 'ubah_pasien';
                include '../ubah_pasien.php';
                break;  
		case 'riwayat_pasien';
				include 'riwayat_pasien.php';
				break;
		case 'detail_riwayat_pasien';
				include 'detail_riwayat_pasien.php';
				break;
		} 
	}if(isset($_GET['page'])){
		$page=$_GET['page'];
		switch ($page){
		    case 'data_poli': 
			   include "../data_poli.php";
			   break; 
        case 'tambah_poli':
                include '../tambah_poli.php';
                break;
        case 'ubah_poli';
                include '../ubah_poli.php';
                break;  
		}
	} 
	else{
		include '../admin/home.php';
	}

?>