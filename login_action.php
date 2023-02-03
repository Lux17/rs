<?php
session_start();	
include "koneksi.php";


$username = isset($_POST['username']) ? $_POST['username'] : '';

$password = isset($_POST['password']) ? sha1($_POST['password']) : '';

$sql = "select * from users where username='$username' and password='$password'";
$hasil = mysqli_query ($kon,$sql);
$jumlah = mysqli_num_rows($hasil);


if($jumlah > 0){
 
	$data = mysqli_fetch_assoc($hasil);


 if($data['rolename']=="admin"){

	$_SESSION['idusers'] = $data_user['id'];
	$_SESSION['username'] = $username;
	$_SESSION['rolename'] = $rolename;


	header("Location:admin/dashboard.php");




 }else if($data['rolename']=="operator"){
	$_SESSION['idusers'] = $data_user['id'];
	$_SESSION['username'] = $username;
	$_SESSION['rolename'] = $rolename;


	header("Location:dosen/dashboard.php");

 }else{

	 header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
?>
