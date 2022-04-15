<?php 
      include "config.php";
      
      //INSERT SERVER
          if (isset($_POST['submit'])) {
            $id_akun = $_POST['id_akun'];
            $nama_akun = $_POST['nama_akun'];

          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM akun WHERE id_akun='$id_akun'"));

          if ($cek > 0){
          echo "<script>window.alert('ID Akun yang anda masukan sudah ada')
          window.location='formakun.php'</script>";
          }else {
          	mysqli_query($conn,"INSERT INTO akun (id_akun, nama_akun) VALUES ('$id_akun','$nama_akun')");
 
    		echo "<script>window.alert('Data Berhasil ditambahkan')
        document.location.href = 'akun.php'</script>";
            }
          }

          //EDIT SERVER
          if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $id_akun = $_POST['id_akun'];
            $nama_akun = $_POST['nama_akun'];
          

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM akun WHERE id_akun='$id_akun'"));

                  if ($cek > 0){
                    mysqli_query($conn, "UPDATE akun set nama_akun = '$nama_akun' where id='$id'");
                  echo "<script>window.alert('ID Akun yang anda masukan sudah ada')
                  window.location='akun.php'</script>";
                  }else {
                    mysqli_query($conn, "UPDATE akun set id_akun='$id_akun', nama_akun = '$nama_akun' where id='$id'");
                    echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'akun.php'
                </script>"; 
            }
        }


          //DELETE SERVER
          if( isset($_GET['id']) ){

        // ambil id dari query string
        $id = $_GET['id'];

        // buat query hapus
        $sql = "UPDATE  akun SET deleted = '1' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'akun.php'
        </script>"; 

        } else {
            echo "<script>
            alert('Data Gagal dihapus!');
            document.location.href = 'akun.php'
        </script>"; 
        }

    } else {
        die("akses dilarang...");
    }
       ?>
