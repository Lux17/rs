<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
session_start();	
	
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$rolename = isset($_POST['rolename']) ? $_POST['rolename'] : '';


$query = "INSERT INTO users (username, password, rolename) VALUES ('$username', sha1('$password'), '$rolename')";
$result = mysqli_query($kon, $query);

if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($kon).
        " - ".mysqli_error($kon));
} else {                      
echo "<script>alert('Data berhasil ditambah.');window.location='../users.php';</script>";
}
            
