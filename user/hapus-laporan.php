<?php
session_start();

if( !isset($_SESSION["user"])) {
    header("Location: ../masuk.php");
    exit;
}  
  include "../query/functions.php";

$id = $_GET["id"];
if (hapusLaporan($id) > 0 ) {
  echo "
      <script>
          alert('Laporan Berhasil Dihapus');
          document.location.href = 'riwayat-laporan.php';
      </script>  
      ";
} else {
  echo "
      <script>
          alert('Laporan Gagal Dihapus');
          document.location.href = 'riwayat-laporan.php';
      </script>  
      ";
}
?>