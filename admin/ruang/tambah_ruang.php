<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	



// cek nis
if (isset($_POST['simpan'])) {
    $kd_ruang = $_POST['kd_ruang'];
   
    $query = mysqli_query($kon, "SELECT kd_ruang FROM ruang WHERE kd_ruang = '$kd_ruang'"); 
   
    if($query->num_rows > 0) {
        echo "<script>alert('Gagal !! Data sudah Terdaftar');window.location='../pembimbing.php';</script>";
    } else {
        $kd_ruang = isset($_POST['kd_ruang']) ? $_POST['kd_ruang'] : '';
        $nama_ruang = isset($_POST['nama_ruang']) ? $_POST['nama_ruang'] : '';
        $nama_gedung = isset($_POST['nama_gedung']) ? $_POST['nama_gedung'] : '';
        
        
        
        $query = "INSERT INTO ruang (kd_ruang ,nama_ruang, nama_gedung) VALUES ('$kd_ruang','$nama_ruang', '$nama_gedung')";
        $result = mysqli_query($kon, $query);
                          // periska query apakah ada error
        // $jumlah = mysqli_num_rows($result);
        
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
        " - ".mysqli_error($kon));
        } else {                      
        echo "<script>alert('Data berhasil ditambah.');window.location='../ruang.php';</script>";
        };               
        
    }
};



?>
            






