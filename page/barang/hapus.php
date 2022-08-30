<?php 

	$kode_barang = $_GET ['kode_barang'];
	$connect->query("DELETE FROM tbbarang WHERE kode_barang='$kode_barang'");

 ?>

 <script type="text/javascript">
 	window.location.href="?page=barang";
 </script>