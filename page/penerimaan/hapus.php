<?php 

	$kode_terima = $_GET ['kode_terima'];
	$hapusTabelPenerimaan = mysqli_query($connect, "DELETE FROM tbpenerimaan WHERE kode_terima='$kode_terima'") or die (mysql_error());

		if ($hapusTabelPenerimaan) {
			$hapusTabelPenerimaan = mysqli_query($connect, "DELETE FROM tbdetail_penerimaan WHERE kode_terima='$kode_terima'");
		}

 ?>

 <script type="text/javascript">
 	window.location.href="?page=penerimaan";
 </script>