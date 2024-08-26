<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location:../users/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Ini dashboard</h1>
  <a href="cuti-tampil.php">Data</a><br><br>
  <a href="cuti-jenis.php">Daftar Jenis Cuti</a><br><br>
  <a href="../users/logout.php">Keluar</a>
</body>
</html>