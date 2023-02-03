<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	




if (isset($_POST['simpan'])) {
    $kd_dokter = $_POST['kd_dokter'];
   
    $query = mysqli_query($kon, "SELECT kd_dokter FROM dokter WHERE kd_dokter = '$kd_dokter'"); 
   
    if($query->num_rows > 0) {
        echo "<script>alert('Gagal !! Data sudah Terdaftar');window.location='../pembimbing.php';</script>";
    } else {
        $kd_dokter = isset($_POST['kd_dokter']) ? $_POST['kd_dokter'] : '';
        $nama_dokter = isset($_POST['nama_dokter']) ? $_POST['nama_dokter'] : '';
        $alamat_dokter = isset($_POST['alamat_dokter']) ? $_POST['alamat_dokter'] : '';
        $spesialisasi = isset($_POST['spesialisasi']) ? $_POST['spesialisasi'] : '';
        
        
        
        $query = "INSERT INTO dokter (kd_dokter ,nama_dokter, alamat_dokter, spesialisasi) VALUES ('$kd_dokter','$nama_dokter', '$alamat_dokter', '$spesialisasi')";
        $result = mysqli_query($kon, $query);
                          // periska query apakah ada error
        // $jumlah = mysqli_num_rows($result);
        
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
         " - ".mysqli_error($kon));
        } else {                      
        echo "<script>alert('Data berhasil ditambah.');window.location='../dokter.php';</script>";
        };               
        
    }
};



?>
            






