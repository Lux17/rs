<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	



// cek nis
if (isset($_POST['simpan'])) {
    $kd_petugas = $_POST['kd_petugas'];
   
    $query = mysqli_query($kon, "SELECT kd_petugas FROM petugas WHERE kd_petugas = '$kd_petugas'"); 
   
    if($query->num_rows > 0) {
        echo "<script>alert('Gagal !! Data sudah Terdaftar');window.location='../pembimbing.php';</script>";
    } else {
        $kd_petugas = isset($_POST['kd_petugas']) ? $_POST['kd_petugas'] : '';
        $nama_petugas = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';
        $alamat_petugas = isset($_POST['alamat_petugas']) ? $_POST['alamat_petugas'] : '';
        $jam_jaga = isset($_POST['jam_jaga']) ? $_POST['jam_jaga'] : '';
        
        
        
        $query = "INSERT INTO petugas (kd_petugas ,nama_petugas, alamat_petugas, jam_jaga) VALUES ('$kd_petugas','$nama_petugas', '$alamat_petugas', '$jam_jaga')";
        $result = mysqli_query($kon, $query);
                          // periska query apakah ada error
        // $jumlah = mysqli_num_rows($result);
        
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($kon).
            " - ".mysqli_error($kon));
        } else {                      
        echo "<script>alert('Data berhasil ditambah.');window.location='../petugas.php';</script>";
        };               
        
    }
};



?>
            






