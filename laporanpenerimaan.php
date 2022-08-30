<?php 
	ob_start();
	session_start();
	include 'koneksi.php';
	include 'fungsiTanggal.php';
	$tgl_awal = $_POST['tgl-awal'];
	$tgl_akhir = $_POST['tgl-akhir'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
   <style type="text/css">
  body{
    font-family: sans-serif;
  }
  table{
    position: center;
    border: collapse;
  }


 </style>
</head>
<body>

<h1 style="text-align: center;">Laporan Stok Barang Masuk Pada Warung Mie Aceh Bang Udin</h1>
<hr>
<br><br>


<table border="1" style="border-collapse: collapse; text-align: center;" >
	<thead align="center">
		<?php 
			$query    = $connect->query("SELECT DISTINCT * FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan on tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbbarang ON tbdetail_penerimaan.kode_barang = tbbarang.kode_barang WHERE (tbpenerimaan.tanggal_terima BETWEEN '$tgl_awal' AND '$tgl_akhir')");
		 ?>
		<tr>
			<th style="width: 25%; height: 30px; padding: 5px;">Tanggal Terima</th>
			<th style="width: 25%; height: 30px; padding: 5px;">Kode Penerimaan</th>
			<th style="width: 25%; height: 30px; padding: 5px;">Nama Barang</th>
			<th style="width: 25%; height: 30px; padding: 5px;">Jumlah Barang</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			while ($data = mysqli_fetch_array($query)){
			?>
			<tr>
				<td style="padding: 5px;"><?php echo tgl_indo( $data['tanggal_terima']) ?></td>
				<td style="padding: 5px;"><?php echo $data['kode_terima'] ?></td>
				<td style="padding: 5px;"><?php echo $data['nama_barang'] ?></td>
				<td style="padding: 5px;"><?php echo $data['jumlah_barang'] ?></td>
			</tr>
		<?php  
		}
		?>	
	</tbody>
</table>


</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','fr');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Barang Masuk.pdf');
?>