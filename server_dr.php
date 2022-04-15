<?php 
      include "config.php";
      
      //INSERT SERVER
          if (isset($_POST['submit'])) {
            $id_reaksi = $_POST['id_reaksi'];
            $id_akun = $_POST['id_akun'];
            $debet_kredit = $_POST['debet_kredit'];

          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM detail_reaksi WHERE id_reaksi='$id_reaksi'"));

          
          	mysqli_query($conn,"INSERT INTO detail_reaksi (id_reaksi, id_akun, debet_kredit)
			VALUES ('$id_reaksi','$id_akun', '$debet_kredit')");
 
    		echo "<script>window.alert('Data Berhasil ditambahkan')
        document.location.href = 'detail_reaksi.php'</script>";
            
          
          //EDIT SERVER
          if (isset($_POST['update'])) {
            $id                 = $_POST['id'];
            $id_reaksi          = $_POST['id_reaksi'];
            $id_akun            = $_POST['id_akun'];
            $debet_kredit       = $_POST['debet_kredit'];

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM detail_reaksi WHERE id_reaksi='$id_reaksi'"));

                  if ($cek > 0){
                    mysqli_query($conn, "UPDATE detail_reaksi set id_reaksi = '$id_reaksi' , id_akun = '$id_akun', debet_kredit='$debet_kredit' where id='$id'");
                  echo "<script>window.alert('ID Reaksi yang anda masukan sudah ada')
                  window.location='detail_reaksi.php'</script>";
                  }else {
                    mysqli_query($conn, "UPDATE detail_reaksi set id_reaksi = '$id_reaksi', id_akun = '$id_akun', debet_kredit='$debet_kredit' where id='$id'");
                    echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'detail_reaksi.php'
                </script>"; 
            }
        }


          //DELETE SERVER
          if( isset($_GET['id']) ){

        // ambil id dari query string
        $id = $_GET['id'];

        // buat query hapus
        $sql = "UPDATE  detail_reaksi SET deleted = '1' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'detail_reaksi.php'
        </script>"; 

        } else {
            echo "<script>
            alert('Data Gagal dihapus!');
            document.location.href = 'detail_reaksi.php'
        </script>"; 
        }

    } else {
        die("akses dilarang...");
    }
  }
       ?>
