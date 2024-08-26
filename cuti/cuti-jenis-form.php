<?php
include '../functions/functions.php';
$db = new Database();
// if (isset($_POST['tambah_jenis'])) {
//   $db->tambah_jenis_cuti(@$_POST['jenis_cuti']);
// } else if (isset($_POST['tambah_catatan'])){
//   $db->tambah_catatan_cuti(@$_POST['nama_catatan_cuti']);
// } else {
//   echo "";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Jenis Cuti</title>
  <style>
    table {
      border: 2px, solid;
    }
    input {
      width: 200px;
    }
  </style>
</head>
<body>
  <?php if (isset($_POST['tambah_jenis1']) OR @$_GET['jenis_cuti_id']) { ?>
    <!-- untuk menambahkan jenis cuti -->
    <h2>Tambah Jenis Cuti</h2>
    <?php
    if (@$_GET['jenis_cuti_id']) {
      $id = $_GET['jenis_cuti_id'];
      $x = $db->ambil_id_jenis($id);
    }
     ?>
    <form action="cuti-jenis-act.php" method="POST">
      <input type="hidden" name="jenis_cuti_id" value="<?=@$x['jenis_cuti_id']?>">
      <table>
        <tr>
          <td> <input type="text" name=" " value="<?=@$x['jenis_cuti']?>" required autocomplete="off"> </td>
        </tr>
        <tr><td><button type="submit" name="tambah_jenis">Simpan</button></td></tr>
      </table>
    </form>
  <?php } else if (isset($_POST['tambah_catatan1']) OR @$_GET['catatan_cuti_id']) {?>
    <!-- untuk menambahkan catatan cuti -->
    <h2>Tambah Catatan Cuti</h2>
    <?php
    if (@$_GET['catatan_cuti_id']) {
      $id = $_GET['catatan_cuti_id'];
      $x = $db->ambil_id_catatan($id);
    }
    ?>
    <form action="cuti-jenis-act.php" method="POST">
    <input type="hidden" name="catatan_cuti_id" value="<?=@$x['catatan_cuti_id']?>">
      <table>
        <tr>
          <td> <input type="text" name="nama_catatan_cuti" value="<?=@$x['nama_catatan_cuti']?>" required autofocus autocomplete="off"> </td>
        </tr>
        <tr><td><button type="submit" name="tambah_catatan">Simpan</button></td></tr>
      </table>
    </form>
  <?php } else {header('location: cuti-jenis.php');}?>
  <br>
  <a href="cuti-jenis.php">Kembali</a>
</body>
</html>