<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $kd_rawatinap = isset($_POST['kd_rawatinap']) ? $_POST['kd_rawatinap'] : '';
  $kd_pasien = isset($_POST['kd_pasien']) ? $_POST['kd_pasien'] : '';
  $kd_ruang = isset($_POST['kd_ruang']) ? $_POST['kd_ruang'] : '';

  $query  = "UPDATE rawat_inap SET kd_pasien = '$kd_pasien', kd_ruang = '$kd_ruang'";
  $query .= "WHERE kd_rawatinap = '$kd_rawatinap'";
  $result = mysqli_query($kon, $query);
  //periksa query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($kon).
            " - ".mysqli_error($kon));
  } else {                      
  echo "<script>alert('Data berhasil diubah.');window.location='../rawat.php';</script>";
  }
              

 