<?php
include "koneksi.php";
session_start();

$pw = mysqli_fetch_array(mysqli_query($connect,"SELECT * from tblogin where id_login = '$_SESSION[id_login]'"));

$pass_lama = md5($_POST['pass_lama']);
$pass_baru = md5($_POST['pass_baru']);

if($pass_lama== $pw['password']){
		if(md5($_POST['pass_baru'])==md5($_POST['pass_baru1'])){
			mysqli_query($connect,"UPDATE tblogin SET password = '$pass_baru' where id_login = '$_SESSION[id_login]'");
			echo "<script>alert('Ganti Password Berhasil'); window.location = 'index.php'</script>";
		}else{
			echo "<script>alert('Password Baru dan Konfirmasi Password Baru tidak Sama'); window.location = '?page=ubahpassword'</script>";
		}

}else{
			echo "<script>alert('Password Lama tidak Salah'); window.location = '?page=ubahpassword'</script>";
		}

?>