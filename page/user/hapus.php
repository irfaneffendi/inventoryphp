<?php 

	$id_user = $_GET ['id_user'];
	$connect->query("DELETE FROM tbuser WHERE id_user='$id_user'");

 ?>

 <script type="text/javascript">
 	window.location.href="?page=user";
 </script>