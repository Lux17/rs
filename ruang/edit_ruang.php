<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $kd_ruang = isset($_POST['kd_ruang']) ? $_POST['kd_ruang'] : '';
  $nama_ruang = isset($_POST['nama_ruang']) ? $_POST['nama_ruang'] : '';
  $nama_gedung = isset($_POST['nama_gedung']) ? $_POST['nama_gedung'] : '';


  
 
 
  $query  = "UPDATE ruang SET nama_ruang = '$nama_ruang',  nama_gedung = '$nama_gedung'";
  $query .= "WHERE kd_ruang = '$kd_ruang'";
  $result = mysqli_query($kon, $query);
                    // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($kon).
                                         " - ".mysqli_error($kon));
  } else {                      
  echo "<script>alert('Data berhasil diubah.');window.location='../ruang.php';</script>";
  }
              

 