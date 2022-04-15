<?php 
      include "config.php";
      
      //INSERT SERVER
          if (isset($_POST['submit'])) {
            $id_reaksi = $_POST['id_reaksi'];
            $nama_reaksi = $_POST['nama_reaksi'];

          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM reaksi WHERE id_reaksi='$id_reaksi'"));

          if ($cek > 0){
          echo "<script>window.alert('ID Reaksi yang anda masukan sudah ada')
          window.location='formreaksi.php'</script>";
          }else {
          	mysqli_query($conn,"INSERT INTO reaksi (id_reaksi, nama_reaksi) VALUES ('$id_reaksi','$nama_reaksi')");
 
    		echo "<script>window.alert('Data Berhasil ditambahkan')
        document.location.href = 'reaksi.php'</script>";
            }
          }

          //EDIT SERVER
          if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $id_reaksi = $_POST['id_reaksi'];
            $nama_reaksi = $_POST['nama_reaksi'];
          

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM reaksi WHERE id_reaksi='$id_reaksi'"));

                  if ($cek > 0){
                    mysqli_query($conn, "UPDATE reaksi set nama_reaksi = '$nama_reaksi' where id='$id'");
                  echo "<script>window.alert('ID Reaksi yang anda masukan sudah ada')
                  window.location='reaksi.php'</script>";
                  }else {
                    mysqli_query($conn, "UPDATE reaksi set id_reaksi='$id_reaksi', nama_reaksi = '$nama_reaksi' where id='$id'");
                    echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'reaksi.php'
                </script>"; 
            }
        }


          //DELETE SERVER
          if( isset($_GET['id']) ){

        // ambil id dari query string
        $id = $_GET['id'];

        // buat query hapus
        $sql = "UPDATE  reaksi SET deleted = '1' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'reaksi.php'
        </script>"; 

        } else {
            echo "<script>
            alert('Data Gagal dihapus!');
            document.location.href = 'reaksi.php'
        </script>"; 
        }

    } else {
        die("akses dilarang...");
    }
       ?>
