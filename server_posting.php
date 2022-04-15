<?php 
      include "config.php";
      
      //INSERT SERVER
          if (isset($_POST['submit'])) {




            $id_transaksi = $_POST['id_transaksi'];
            $tgl_transaksi = $_POST['tgl_transaksi'];
            $nama_transaksi = $_POST['nama_transaksi'];
            $namainput = $_POST['namainput'];
            $tglposting = $_POST['tglposting'];
            $id_transaksi = $_POST['id_transaksi'];




          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'"));

          if ($cek > 0){
          echo "<script>window.alert('ID Transaksi yang anda masukan sudah ada')
          window.location='formposting.php'</script>";
          }else {
          	mysqli_query($conn,"INSERT INTO transaksi (id_transaksi, tgl_transaksi, nama_transaksi, namainput, tglposting, id_transaksi, tglkoreksi) VALUES ('$id_transaksi', '$tgl_transaksi', '$nama_transaksi', '$namainput', '$tglposting', '$id_transaksi', '$tglkoreksi')");
 
    		echo "<script>window.alert('Data Berhasil ditambahkan')
        document.location.href = 'posting.php'</script>";
            }
          }

          //EDIT SERVER
          if (isset($_POST['update'])) {
            $id_transaksi = $_POST['id_transaksi'];
            $tgl_transaksi = $_POST['tgl_transaksi'];
            $nama_transaksi = $_POST['nama_transaksi'];
            $namainput = $_POST['namainput'];
            $tglposting = $_POST['tglposting'];
            $id_transaksi = $_POST['id_transaksi'];
            


          

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM transaksi INNER JOIN detail_transaksi ON transaksi.kode_transaksi = detail_transaksi.kode_transaksi WHERE posting=0 AND deleted=0 ORDER BY id DESC"));

                  if ($cek > 0){
                    mysqli_query($conn, "UPDATE transaksi set tgl_transaksi = '$tgl_transaksi' where id='$id'");
                  echo "<script>window.alert('ID Transaksi yang anda masukan sudah ada')
                  window.location='posting.php'</script>";
                  }else {
                    mysqli_query($conn, "UPDATE transaksi set id_reaksi='$id_reaksi', nama_reaksi = '$nama_reaksi' where id='$id'");
                    echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'posting.php'
                </script>"; 
            }
        }


          //DELETE SERVER
          if( isset($_GET['id_transaksi']) ){

        // ambil id dari query string
        $id = $_GET['id_transaksi'];

        // buat query hapus
        $sql = "UPDATE  transaksi SET deleted = '1' WHERE id_transaksi=$id_transaksi";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'posting.php'
        </script>"; 

        } else {
            echo "<script>
            alert('Data Gagal dihapus!');
            document.location.href = 'posting.php'
        </script>"; 
        }

    } else {
        die("akses dilarang...");
    }
       ?>