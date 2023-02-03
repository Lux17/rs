<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $kd_pasien = isset($_POST['kd_pasien']) ? $_POST['kd_pasien'] : '';
  $nama_pasien = isset($_POST['nama_pasien']) ? $_POST['nama_pasien'] : '';
  $jk = isset($_POST['jk']) ? $_POST['jk'] : '';
  $alamat_pasien = isset($_POST['alamat_pasien']) ? $_POST['alamat_pasien'] : '';
  $tgl_datang = isset($_POST['tgl_datang']) ? $_POST['tgl_datang'] : '';
  $keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : '';
  $kd_dokter = isset($_POST['kd_dokter']) ? $_POST['kd_dokter'] : '';


  
 
 
  $query  = "UPDATE pasien SET nama_pasien = '$nama_pasien', jk = '$jk', tgl_datang = '$tgl_datang', keluhan = '$keluhan', alamat_pasien = '$alamat_pasien', kd_dokter = '$kd_dokter'";
  $query .= "WHERE kd_pasien = '$kd_pasien'";
  $result = mysqli_query($kon, $query);
                    // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($kon).
                                         " - ".mysqli_error($kon));
  } else {                      
  echo "<script>alert('Data berhasil diubah.');window.location='../pasien.php';</script>";
  }
              

 