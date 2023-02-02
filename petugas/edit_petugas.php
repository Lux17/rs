<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $kd_petugas = isset($_POST['kd_petugas']) ? $_POST['kd_petugas'] : '';
  $nama_petugas = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';
  $alamat_petugas = isset($_POST['alamat_petugas']) ? $_POST['alamat_petugas'] : '';
  $jam_jaga = isset($_POST['jam_jaga']) ? $_POST['jam_jaga'] : '';


  
 
 
  $query  = "UPDATE petugas SET nama_petugas = '$nama_petugas', jam_jaga = '$jam_jaga', alamat_petugas = '$alamat_petugas'";
  $query .= "WHERE kd_petugas = '$kd_petugas'";
  $result = mysqli_query($kon, $query);
                    // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($kon).
                                         " - ".mysqli_error($kon));
  } else {                      
  echo "<script>alert('Data berhasil diubah.');window.location='../petugas.php';</script>";
  }
              

 