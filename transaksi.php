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
    <title>Transaksi</title>
  </head>
  <body>

  	<div class="container">
        <h1 class="text-center mb-2 mt-3 ">Transaksi</h1>
      </div>

      <div class="container">
      <table class="table mt-3 mb-2 text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Tanggal Transaksi</th>
          <th scope="col">ID Transaksi</th>
          <th scope="col">Nama Transaksi</th>
        </tr>
      </thead>

<?php
include "config.php";

$sql = 'SELECT tgl_transaksi, id_transaksi, nama_transaksi 
		FROM transaksi';
		
$result = $conn->query($sql);
		
while($row = $result->fetch_assoc()): ?>
          <tbody>
            <tr>
                <td><?php echo $row['tgl_transaksi'];?></td>
                <td><?php echo $row['id_transaksi'];?></td>
                <td><?php echo $row['nama_transaksi'];?></td>
             </tr>   
          </tbody>
          <?php  endwhile; ?>
      </table>
      </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>