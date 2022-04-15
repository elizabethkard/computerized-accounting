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
    <title>Detail Reaksi</title>
  </head>
  <body>

    
    <h1 class="text-center  pb-3">Form Detail Reaksi</h1>

    <div class="container">
      <form action="server_dr.php" method="post" class="p-3" >
        <div class="form-group">
          <label for="kode">ID Reaksi</label>
            <select name="id_reaksi" class = "form-control" value="<?php echo $id_reaksi; ?>">
                  <option value=""> Please Select</option>
                  <?php
                  require_once "config.php";
                  $sql = "SELECT * from reaksi where deleted = 0"; 
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){ 
                   echo "<option value=".$row['id_reaksi']."";
                   echo ">".$row['id_reaksi']."</option>";
                  }
                  ?>
            </select> 
        </div>
        <div class="form-group">
          <label for="kode">ID Akun</label>
            <select name="id_akun" class = "form-control" value="<?php echo $id_akun; ?>">
                  <option value=""> Please Select</option>
                  <?php
                  require_once "config.php";
                  $sql = "SELECT * from akun where deleted = 0"; 
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){ 
                   echo "<option value=".$row['id_akun']."";
                   echo ">".$row['id_akun']."</option>";
                  }
                  ?>
            </select> 
        </div>
        <div class="form-group">
          <label for="kode">Debet/Kredit</label>
          <input type="text" class="form-control" name="debet_kredit" placeholder="Masukkan D/K" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button> 
        <a class="btn btn-outline-danger" href="detail_reaksi.php">Cancel</a>
      </div>
    </form>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>