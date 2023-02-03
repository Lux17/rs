<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	



// cek nis
if (isset($_POST['simpan'])) {
    $kd_rawatinap = $_POST['kd_rawatinap'];
   
    $query = mysqli_query($kon, "SELECT kd_rawatinap FROM rawat_inap WHERE kd_rawatinap = '$kd_rawatinap'"); 
   
    if($query->num_rows > 0) {
        echo "<script>alert('Gagal !! Data sudah Terdaftar');window.location='../rawat.php';</script>";
    } else {
        $kd_rawatinap = isset($_POST['kd_rawatinap']) ? $_POST['kd_rawatinap'] : '';
        $kd_ruang = isset($_POST['kd_ruang']) ? $_POST['kd_ruang'] : '';
        $kd_pasien = isset($_POST['kd_pasien']) ? $_POST['kd_pasien'] : '';
        
        
        
        $query = "INSERT INTO rawat_inap (kd_rawatinap ,kd_ruang, kd_pasien) VALUES ('$kd_rawatinap','$kd_ruang', '$kd_pasien')";
        $result = mysqli_query($kon, $query);
                          // periska query apakah ada error
        // $jumlah = mysqli_num_rows($result);
        
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
                                               " - ".mysqli_error($kon));
        } else {                      
        echo "<script>alert('Data berhasil ditambah.');window.location='../rawat.php';</script>";
        };               
        
    }
};



?>
            






