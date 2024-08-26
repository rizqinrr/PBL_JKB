<?php
include '../functions/functions.php';
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php

  if (isset($_POST['tambah_jenis'])) {
    $db->tambah_jenis_cuti(@$_POST['jenis_cuti']);
  } else if (@$_GET['jenis_cuti_id']){
    $delete = $_GET['jenis_cuti_id'];
    $db->delete_jenis_cuti($delete);
  } else if (isset($_POST['tambah_catatan'])){
    $db->tambah_catatan_cuti(@$_POST['nama_catatan_cuti']);
  } else if (@$_GET['catatan_cuti_id']){
    $delete = $_GET['catatan_cuti_id'];
    $db->delete_catatan_cuti($delete);
  } else {
    echo "";
  }

?>
berhasil !
<br>
<a href="cuti-jenis.php">Kembali</a>
</body>
</html>