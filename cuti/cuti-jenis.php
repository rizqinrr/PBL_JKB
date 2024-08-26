<?php
include('../functions/functions.php');
if (!isset($_SESSION['login'])) {
  header('location:../users/login.php');
}
$db = new Database();
$jenis_cuti = $db->tampil_jenis_cuti();
$catatan_cuti = $db->tampil_catatan_cuti();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jenis Cuti</title>
  <style>
    .satu {
      border: 2px solid;
      padding: 5px;
      padding-left: 10px;
      margin: 10px;
      float: left;
    }
    .dua {
      border: 2px solid;
      padding: 5px;
      padding-left: 10px;
      margin: 10px;
      float: left;
    }
  </style>
</head>

<body>
<a href="index.php">Beranda</a>
  <div class="kontainer" border="1">
    <div class="satu">
        <h2>TABEL JENIS CUTI</h2>
      <br>
      <form action="cuti-jenis-form.php" method="POST">
        <button type="submit" name="tambah_jenis1">Tambah Jenis Cuti</button>
      
      <br><br>
      <table border="1" cellpadding="10" cellspacing="0">

        <tr>
          <th>No</th>
          <th>Jenis Cuti</th>
          <th>Opsi</th>
        </tr>

        <?php
          // menampilkan auto increment untuk nomor
          $i = 1;
          // perulangan untuk menampilkan data
          foreach ($jenis_cuti as $jenis) :
        ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $jenis['jenis_cuti']; ?></td>

          <td>
            <a href="cuti-jenis-form.php?jenis_cuti_id=<?= $jenis['jenis_cuti_id'] ?>">EDIT</a> | 
            <a href="cuti-jenis-act.php?jenis_cuti_id=<?= $jenis['jenis_cuti_id'] ?>">HAPUS</a>
          </td>
        </tr>

        <?php $i++; ?>
        <?php endforeach; ?>
      </table>
      </form>
    </div>

    <div class="dua" border="1">
          <h2>TABEL CATATAN CUTI</h2>
        <br>
        <form action="cuti-jenis-form.php" method="POST">
          <button type="submit" name="tambah_catatan1">Tambah Catatan Cuti</button>
        </form>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">

          <tr>
            <th>No</th>
            <th>Catatan Cuti</th>
            <th>Opsi</th>
          </tr>

          <?php
            // menampilkan auto increment untuk nomor
            $i = 1;
            // perulangan untuk menampilkan data
            foreach ($catatan_cuti as $catatan) :
          ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $catatan['nama_catatan_cuti']; ?></td>
            <td>
              <a href="cuti-jenis-form.php?catatan_cuti_id=<?= $catatan['catatan_cuti_id'] ?>">EDIT</a> | 
              <a href="cuti-jenis-act.php?catatan_cuti_id=<?= $catatan['catatan_cuti_id'] ?>">HAPUS</a>
            </td>
          </tr>

          <?php $i++; ?>
          <?php endforeach; ?>
        </table>
    </div>
  </div>
  
  
</body>
</html>