<?php
session_start();

$_SESSION['id_user']='';
$_SESSION['username']='';
$_SESSION['password']='';
$_SESSION['rolename']='';

unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['rolename']);

session_unset();
session_destroy();
header('Location:../index.php');

?>