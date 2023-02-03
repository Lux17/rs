<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	




if (isset($_POST['simpan'])) {
    $kd_pembayaran = $_POST['kd_pembayaran'];
   
    $query = mysqli_query($kon, "SELECT kd_pembayaran FROM pembayaran WHERE kd_pembayaran = '$kd_pembayaran'"); 
   
    if($query->num_rows > 0) {
        echo "<script>alert('Gagal !! Data sudah Terdaftar');window.location='../pembimbing.php';</script>";
    } else {
        $kd_pembayaran = isset($_POST['kd_pembayaran']) ? $_POST['kd_pembayaran'] : '';
        $kd_petugas = isset($_POST['kd_petugas']) ? $_POST['kd_petugas'] : '';
        $kd_pasien = isset($_POST['kd_pasien']) ? $_POST['kd_pasien'] : '';
        $jmlh_harga = isset($_POST['jmlh_harga']) ? $_POST['jmlh_harga'] : '';
        
        
        
        $query = "INSERT INTO pembayaran (kd_pembayaran ,kd_petugas, kd_pasien, jmlh_harga) VALUES ('$kd_pembayaran','$kd_petugas', '$kd_pasien', '$jmlh_harga')";
        $result = mysqli_query($kon, $query);
                          // periska query apakah ada error
        // $jumlah = mysqli_num_rows($result);
        
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
                                               " - ".mysqli_error($kon));
        } else {                      
        echo "<script>alert('Data berhasil ditambah.');window.location='../pembayaran.php';</script>";
        };               
        
    }
};



?>
            






