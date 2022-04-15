<?php require_once "header.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style5.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Jurnal Umum</title>
  </head>
  <body>

      <div class="container">
        <h1 class="text-center mb-2 mt-3 ">Jurnal Umum</h1>
      </div>

      <div class="container">
      <table class="table mt-3 mb-2 text-center">
     	<thead class="thead-dark">
        <tr>
          <th scope="col">Tanggal</th>
          <th scope="col">Kode</th>
          <th scope="col">Perkiraan</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Debit</th>
          <th scope="col">Kredit</th>
        </tr>
      </thead>



<?php
include 'config.php';
?>

<br/><br/><br/>
		<form method="get">
			<label>Pilih Waktu Transaksi </label>
			<input type="date" name="tanggal">
			<input type="submit" value="FILTER">
		</form>
 
		<br/> <br/>
 
	</center>

<?php
$sql = 'SELECT transaksi.*, akun.nama_akun, akun.id_akun, (IF(detail_transaksi.debet_kredit="D",
		detail_transaksi.nilai, 0)) as Debit, (IF(detail_transaksi.debet_kredit="D", 0, detail_transaksi.nilai)) as Kredit 
		FROM akun, transaksi LEFT JOIN detail_transaksi 
		ON transaksi.id_transaksi = detail_transaksi.id_transaksi 
		WHERE detail_transaksi.id_akun=akun.id_akun';

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['tgl_transaksi'].'</td>
			<td>'.$row['id_akun'].'</td>
			<td>'.$row['nama_akun'].'</td>
			<td>'.$row['nama_transaksi'].'</td>
			<td>'.number_format($row['Debit'], 0, ',', '.').'</td>
			<td>'.number_format($row['Kredit'], 0, ',', '.').'</td>
		</tr>';
}
echo '
	</tbody>
</table>';

mysqli_free_result($query);

mysqli_close($conn);
?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>