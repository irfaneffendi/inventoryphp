<?php 

	$kode_keluar = $_GET ['kode_keluar'];
	$hapusTabelPengeluaran = mysqli_query($connect, "DELETE FROM tbpengeluaran WHERE kode_keluar='$kode_keluar'") or die (mysql_error());

		if ($hapusTabelPengeluaran) {
			$hapusTabelPengeluaran = mysqli_query($connect, "DELETE FROM tbdetail_pengeluaran WHERE kode_keluar='$kode_keluar'");
		}

 ?>

 <script type="text/javascript">
 	window.location.href="?page=pengeluaran";
 </script>