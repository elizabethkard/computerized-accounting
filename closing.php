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
    <title>Closing</title>
  </head>
  <body>

      <div class="container">
        <h1 class="text-center mb-2 mt-3 ">Closing</h1>
      </div>

      <div class="container">
      <table class="table mt-3 mb-2 text-center">
      <thead class="thead-dark">
      </thead>

<?php 
include "config.php";
session_start();
$nama=$_SESSION['name'];
$posisi = $_SESSION['position'];
$unitinput = $_SESSION['kd_unit'];
$sql4 = mysql_query("SELECT tanggal FROM namabulan where kd_unit = '$unitinput' order by id desc limit 1");
while ( $rps = mysql_fetch_array($sql4)) { 
				$tglnama = $rps['tanggal'];}

$bulan = date('Y-m-d',strtotime($_POST['bulan']));
$bulannya = date('m',strtotime($_POST['bulan']));
$year = date('Y',strtotime($_POST['bulan']));
$yearsblm  = date('Y',strtotime($tglnama));
$bulansblm  = date('m',strtotime($tglnama));
$bulansblm2 = date('m',strtotime('-1 month',strtotime($bulan)));

$bulantok = date('Y-m-d',strtotime('+1 month',strtotime($tanggal)));
	$jenis = $_POST['jenis'];
	$namabulan = $_POST['bulan'];

if($jenis =='close' && $bulan == $bulantok)
{	if ($tglnama < $bulan){
$sql2 = mysqli_query("SELECT kode2,status FROM kode_rek2");
while ( $rp = mysql_fetch_array($sql2)) { 
				$kode2 = $rp['kode2'];
				$status = $rp['status'];
			$jp = 0;
		$sql = mysql_query("SELECT jurnal.noakun,jurnal.unit,jurnal.tipe,jurnal.jumlah FROM transaksi join jurnal on jurnal.nobukti = jurnalumum.nobukti where transaksi.deleted = '0' and transaksi.deleted = '0' and transaksi.posting ='1'and akun.id_akun = '$kode2' and month(transaksi.tgltransaksi) ='$bulannya' and year(transaksi.tgltransaksi) ='$year' ");
		
		while ( $r = mysql_fetch_array($sql)) { 
		
		if ($status =='d'){
				if($r['tipe'] =='K'){
					$jp = $jp + $r['jumlah'];}
				else {
					$jp = $jp - $r['jumlah'];}
				}
				else {if($r['tipe'] =='K'){
					$jp = $jp - $r['jumlah'];}
				else {
					$jp = $jp + $r['jumlah'];}
				}
		}$jumlah22 = 0;
		$sql6 = mysql_query("SELECT id,koderek,jumlah FROM saldobulan where month(bulan) ='$bulansblm' and koderek = '$kode2' ");
		while ( $kod1 = mysql_fetch_array($sql6)) {
				$jumlah22 = $kod1['jumlah'];
			 }
		$jumlah22 = $jumlah22 + $jp;
   $input = mysql_query("INSERT INTO saldobulan (id, bulan, koderek,jumlah) VALUES ('', '$bulan','$kode2', '$jumlah22')");	
		}
	}
?>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>