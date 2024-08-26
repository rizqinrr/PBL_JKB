<?php
include('../functions/functions.php');
if (!isset($_SESSION['login'])) {
  header('location:../users/login.php');
}
$db = new Database();
$data_cuti = $db->tampil_data();
if(@$_POST) {
  $data_cuti = $db->cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
  table, th, td {
      border: 2px solid;
      padding: 5px;
      padding-left: 10px;
      border-collapse: collapse;
      margin: 1px;
      /* float: left; */
    }
    .left {
      text-align: left;
      padding-left: 2px;
    }
    </style>
</head>
<body>
  <h1>DATA CUTI DOSEN</h1>
  <a href="index.php">Beranda</a>
  <a href="cuti-form.php">tambah cuti</a>
  <hr>
  <form action="" method="POST">
    <input type="text" name="keyword" size="40" placeholder="Masukan keyword pencarian.."
    required autofocus autocomplete="off">
    <button type="submit" name="cari ">Cari</button>
  </form><br>
  <form action="cuti-tampil.php">
    <button type="submit">Refresh</button>
  </form>
  <br>

<table class="satu">
		<tr>
			<th>No</th>
			<th colspan="8">Data</th>
		</tr>
		<?php 
		  $no = 1;
		  foreach($data_cuti as $row){
		  ?>
			<tr>
				<th rowspan="6"><?php echo $no++; ?></th>
				<td colspan="8"><?php echo $row['tgl_pengisian_form']; ?></td>
      </tr>
      <tr>
        <th class="left">Nama</th>
				<td><?php echo $row['nama']; ?></td>
        <th class="left">Alasan Cuti</th>
        <td><?php echo $row['alasan_cuti']; ?></td>
        <th class="left">Awal Cuti</th>
        <td><?php echo $row['awal_cuti']; ?></td>
        <th class="left">Dosen ID</th>
        <td><?php echo $row['dosen_id']; ?></td>
      </tr>
      <tr>
        <th class="left">Jabatan</th>
				<td><?php echo $row['jabatan']; ?></td>
        <th class="left">Alamat</th>
        <td><?php echo $row['alamat_selama_cuti']; ?></td>
        <th class="left">Akhir Cuti</th>
        <td><?php echo $row['akhir_cuti']; ?></td>
        <th class="left" rowspan="3">Keterangan</th>
        <td rowspan="3"><?php echo $row['keterangan']; ?></td>
      </tr>
      <tr>
        <th class="left">Unit Kerja</th>
				<td><?php echo $row['unit_kerja']; ?></td>
        <th class="left">Perubahan</th>
        <td><?php echo $row['perubahan']; ?></td>
        <th class="left">Ditangguhkan</th>
        <td><?php echo $row['ditangguhkan']; ?></td>
      </tr>
      <tr>
        <th class="left">NIP</th>
        <td><?php echo $row['nip']; ?></td>
        <th class="left">Masa Kerja</th>
        <td><?php echo $row['masa_kerja']; ?></td>
        <th class="left">Tertanda Dosen</th>
        <td><?= $row['ttd_dsn']; ?></td>
      </tr>
      <tr>
        <th class="left">Telepon</th>
        <td><?php echo $row['telepon']; ?></td>
        <th class="left">Status</th>
        <td><?php echo $row['status']; ?></td>
        <th class="left">Tertanda Atasan</th>
        <td><?php echo $row['ttd_atasan']; ?></td>
        <th colspan="2">
          <a href="cuti-form.php?id=<?= $row['cuti_id'] ?> ">Update</a> | 
          <a href="cuti-act.php?id=<?= $row['cuti_id'] ?> ">Delete</a>
        </th>
      </tr>

			<?php 
		}
		?>
	</table>
  <br>
</body>
</html>