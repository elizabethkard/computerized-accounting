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
    <title>Otomatisasi Jurnal</title>
  </head>
  <body>

      <div class="container">
        <h1 class="text-center mb-2 mt-3 ">Otomatisasi Jurnal</h1>
      </div>

<?php
$link = mysqli_connect("localhost","uts_akuntansi","akuntansi2020","uts_elizabeth");

// Check connection
if ($link == false) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if(isset($_POST['jenis'])) {
  $sql = "SELECT * from transaksi";
  if($result = mysqli_query($link, $sql)) {
	$id = mysqli_num_rows($result) + 1;
    $id_transaksi = "T" . str_pad(strval($nomor), 3, '0', STR_PAD_LEFT); 
  }
  
  //transaksi
  $sql = "INSERT INTO transaksi(id_transaksi, tgl_transaksi, nama_transaksi) values('$id_transaksi','".date("Y-m-d",strtotime($_POST['tanggal']))."','".$_POST['deskripsi']."')";
  if(!$result = mysqli_query($link, $sql)) die(mysqli_error($link));
  
  //detil_transaksi
  foreach($_POST['id_akun'] as $key => $n) {
    $sql = "insert into detail_transaksi(id_transaksi, id_akun, debet_kredit, nilai) values('$id_transaksi','".$_POST['id_akun'][$key]."','".$_POST['debet_kredit'][$key]."','".$_POST['nilai'][$key]."')";
    if(!$result = mysqli_query($link, $sql)) die(mysqli_error($link));
  }	
}
?>
<form name="myTransaksi">
Jenis Aktivitas <select name="jenis" />

<?php
$sql = "select * from reaksi order by id_reaksi";
$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($result)){
  echo "<option value='$row[0]'>$row[1]</option>\n";
}
?>
</select><input type="button" value="Tampilkan Akun" onclick="checkAkun(this.form)" /><br />
Tanggal <input type="date" name="tanggal" /><br />
Deskripsi Transaksi <input type="text" name="deskripsi" /><br />
<?php
if(isset($_GET['jenis'])) {
  $sql = "SELECT akun.nama_akun, (IF(detail_reaksi.debet_kredit='D','Debet','Kredit')), detail_reaksi.id_akun, detail_reaksi.debet_kredit FROM detail_reaksi, akun WHERE detail_reaksi.id_akun=akun.id_akun and id_reaksi='".$_GET['jenis']."' order by id_reaksi";
  $result = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($result)){
    echo "<input type='text' value='$row[0]' />";
	echo "<input type='text' value='$row[1]' />";
    echo "<input type='hidden' value='$row[2]' name='id_akun[]' />";
	echo "<input type='hidden' value='$row[3]' name='debet_kredit[]' />";
	echo "Rp. <input type='text' name='nilai[]' /><br />\n";
  }
}
?>
<input type="button" value="Simpan" onclick="simpan(this.form)" />
</form>
<script>
function checkAkun(form) {
  form.method = "GET";
  form.submit();
}
function simpan(form) {
  form.method = "POST";
  form.submit();
}
</script>
<?php
mysqli_close($link);
?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>