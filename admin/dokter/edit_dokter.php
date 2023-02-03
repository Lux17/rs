<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $kd_dokter = isset($_POST['kd_dokter']) ? $_POST['kd_dokter'] : '';
  $nama_dokter = isset($_POST['nama_dokter']) ? $_POST['nama_dokter'] : '';
  $alamat_dokter = isset($_POST['alamat_dokter']) ? $_POST['alamat_dokter'] : '';
  $spesialisasi = isset($_POST['spesialisasi']) ? $_POST['spesialisasi'] : '';


  
 
 
  $query  = "UPDATE dokter SET nama_dokter = '$nama_dokter', spesialisasi = '$spesialisasi', alamat_dokter = '$alamat_dokter'";
  $query .= "WHERE kd_dokter = '$kd_dokter'";
  $result = mysqli_query($kon, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($kon).
          " - ".mysqli_error($kon));
  } else {                      
  echo "<script>alert('Data berhasil diubah.');window.location='../dokter.php';</script>";
  }
              

 