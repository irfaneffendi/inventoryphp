<?php 

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
$data = mysqli_query($connect,"SELECT * FROM tbuser WHERE username='$username' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$r = mysqli_fetch_array($data);

if($cek > 0){
	session_start();
	$_SESSION['id_user'] = $r['id_user'];
	$_SESSION['username'] = $r['username'];
	$_SESSION['password'] = $r['password'];
	$_SESSION['nama'] = $r['nama'];
	$_SESSION['status'] = $r['status'];
	
	echo "
		<script>
			alert('Anda Berhasil Login, Selamat Datang $_SESSION[nama]');
			window.location = 'index.php';
		</script>
	";
}else{
	echo "
		<script>
			alert('Username atau Password Salah, Silahkan Diulang Kembali');
			window.location = 'login.php';
		</script>
	";
}


?>