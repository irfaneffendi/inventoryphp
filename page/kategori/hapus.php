<?php 

	$kode_kategori = $_GET ['kode_kategori'];
	$connect->query("DELETE FROM tbkategori WHERE kode_kategori='$kode_kategori'");

 ?>

 <script type="text/javascript">
 	window.location.href="?page=kategori";
 </script>