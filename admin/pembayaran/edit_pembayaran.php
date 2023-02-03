<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $kd_pembayaran = isset($_POST['kd_pembayaran']) ? $_POST['kd_pembayaran'] : '';
  $kd_petugas = isset($_POST['kd_petugas']) ? $_POST['kd_petugas'] : '';
  $kd_pasien = isset($_POST['kd_pasien']) ? $_POST['kd_pasien'] : '';
  $jmlh_harga = isset($_POST['jmlh_harga']) ? $_POST['jmlh_harga'] : '';


  
 
 
  $query  = "UPDATE pembayaran SET kd_petugas = '$kd_petugas', jmlh_harga = '$jmlh_harga', kd_pembayaran = '$kd_pembayaran', kd_pasien = '$kd_pasien'";
  $query .= "WHERE kd_pembayaran = '$kd_pembayaran'";
  $result = mysqli_query($kon, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($kon).
          " - ".mysqli_error($kon));
  } else {                      
  echo "<script>alert('Data berhasil diubah.');window.location='../pembayaran.php';</script>";
  }
              

 