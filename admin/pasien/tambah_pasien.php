<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	

	// mengambil data barang dengan kode paling besar


// cek alamat_pasien
$kd_pasien = isset($_POST['kd_pasien']) ? $_POST['kd_pasien'] : '';
$nama_pasien = isset($_POST['nama_pasien']) ? $_POST['nama_pasien'] : '';
$jk = isset($_POST['jk']) ? $_POST['jk'] : '';
$alamat_pasien = isset($_POST['alamat_pasien']) ? $_POST['alamat_pasien'] : '';
$tgl_datang = isset($_POST['tgl_datang']) ? $_POST['tgl_datang'] : '';
$keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : '';
$kd_dokter= isset($_POST['kd_dokter']) ? $_POST['kd_dokter'] : '';


$query = "INSERT INTO pasien (kd_pasien ,nama_pasien, jk, alamat_pasien, tgl_datang, keluhan, kd_dokter) VALUES ('$kd_pasien','$nama_pasien', '$jk','$alamat_pasien', '$tgl_datang', '$keluhan', '$kd_dokter')";
$result = mysqli_query($kon, $query);
                  // periska query apakah ada error
// $jumlah = mysqli_num_rows($result);

if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($kon).
                                       " - ".mysqli_error($kon));
} else {                      
echo "<script>alert('Data berhasil ditambah.');window.location='../pasien.php';</script>";
};
     






?>
            






