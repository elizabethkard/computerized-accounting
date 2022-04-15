<?php include "header.php"; ?>
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
    <title>Posting</title>
  </head>
  <body>

    
    <h1 class="text-center  pb-3">Form Data Posting</h1>

    <div class="container">
      <form action="server_posting.php" method="post" class="p-3" >
        <div class="form-group">
          <label for="kode">ID Transaksi</label>
          <input type="text" class="form-control" name="id_transaksi" placeholder="Masukkan ID Transaksi" required>
        </div>
        <div class="form-group">
          <label for="kode">Tgl Transaksi</label>
          <input type="date" class="form-control" name="tgl_transaksi" placeholder="Masukkan Tgl Transaksi" required>
        </div>
        <div class="form-group">
          <label for="kode">Nama Transaksi</label>
          <input type="text" class="form-control" name="nama_transaksi" placeholder="Nama Transaksi" required>
        </div>
        <div class="form-group">
          <label for="kode">Nama Penginput</label>
          <input type="text" class="form-control" name="namainput" placeholder="Nama Penginput" required>
        </div>
        <div class="form-group">
          <label for="kode">Tgl Posting</label>
          <input type="date" class="form-control" name="tglposting" placeholder="Tgl Posting" required>
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button> 
        <a class="btn btn-outline-danger" href="reaksi.php">Cancel</a>
      </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>