<?php 

	$id = $_GET ['id'];
	$connect->query("DELETE FROM tbsementara_pengeluaran WHERE id='$id'");

 ?>

 <script type="text/javascript">
 	window.location.href="?page=pengeluaran&aksi=tambah";
 </script>