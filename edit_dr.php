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
    <title>Edit Detail Reaksi</title>
  </head>
  <body>
    
    <h1 class="text-center">Edit Detail Reaksi</h1>

    <?php
    include 'config.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn,"select * from detail_reaksi where id='$id'");
    while($row = mysqli_fetch_array($data)){
        ?>
        <div class="container">
          <form action="server_dr.php" method="post" class="p-5" >
             <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
            <div class="form-group">
              <label for="kota">ID Reaksi</label>
              <select name="id_reaksi" class="form-control">
                <option value="<?php echo $row['id_reaksi'];?>"><?php echo $row['id_reaksi'];?></option>
                        <?php
                          $sql_reaksi = mysqli_query($conn, "SELECT * FROM reaksi where deleted = 0");
                          while($data_reaksi = mysqli_fetch_array($sql_reaksi)){ 
                           echo "<option value=".$data_reaksi['id_reaksi']."";
                           echo ">".$data_reaksi['id_reaksi']."</option>";
                         }
                         ?>
                       </select>
                     </div> 
            <div class="form-group">
              <label for="kota">ID Akun</label>
              <select name="id_akun" class="form-control">
                <option value="<?php echo $row['id_akun'];?>"><?php echo $row['id_akun'];?></option>
                        <?php
                          $sql_akun = mysqli_query($conn, "SELECT * FROM akun where deleted = 0");
                          while($data_akun = mysqli_fetch_array($sql_akun)){ 
                           echo "<option value=".$data_akun['id_akun']."";
                           echo ">".$data_akun['id_akun']."</option>";
                         }
                         ?>
                       </select>
                     </div> 
            <div class="form-group">
              <label for="nama">Debet/Kredit</label>
              <input type="text" class="form-control" name="debet_kredit" placeholder="Masukkan D/K" value="<?php echo $row['debet_kredit'] ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button> 
            <a class="btn btn-outline-danger" href="detail_reaksi.php">Cancel</a>
          </div>

        <?php 
    }
    ?>




    




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>