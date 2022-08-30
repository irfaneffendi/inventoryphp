<?php 

	$id = $_GET ['id'];
	$connect->query("DELETE FROM tbsementara_penerimaan WHERE id='$id'");

 ?>

 <script type="text/javascript">
 	window.location.href="?page=penerimaan&aksi=tambah";
 </script>