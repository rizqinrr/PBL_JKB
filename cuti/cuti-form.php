<?php
include('../functions/functions.php');
if (!isset($_SESSION['login'])) {
  header('location:../users/login.php');
}
$date = date('Y-m-d');
$db = new Database();
$jenis_cuti = $db->tampil_jenis_cuti();
$catatan_cuti = $db->tampil_catatan_cuti();

  if(@$_GET['id']) {
    $id = $_GET['id'];
    $x = $db->ambil_id($id);
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
    .left {
      text-align: left;
      /* margin: 1px; */
    }
    .satu {
      margin: 1px;
      border: 2px solid;
      padding: 5px;
    }
  </style>
</head>
<body>
<h3>DAFTAR CUTI</h3>
<hr/>
<form method="POST" action="cuti-act.php">
  <div class="satu">
  <table>
    <tr>
      <th class="left">Nama</th>
      <td> : <input type="text" name="nama" value="<?=@$x['nama']?>" required autocomplete="off"></td>
      <td> <input type="hidden" value="<?=@$x['cuti_id']?>" name="cuti_id"></td>
    </tr>
    <tr>
      <th class="left">Jabatan</th>
      <td> : <input type="text" name="jabatan" value="<?=@$x['jabatan']?>" required autocomplete="off"></td>
    </tr>
    <tr>
      <th class="left">Unit Kerja</th>
      <td> : <input type="text" name="unit_kerja" value="<?=@$x['unit_kerja']?>" required autocomplete="off"></td>
    </tr>
    <tr>
      <th class="left">NIP</th>
      <td> : <input type="text" name="nip" value="<?=@$x['nip']?>" required autocomplete="off"></td>
    </tr>
    <tr>
      <th class="left">Masa Kerja</th>
      <td> : <input type="text" name="masa_kerja" value="<?=@$x['masa_kerja']?>" required autocomplete="off"></td>
    </tr>
    <tr>
      <th class="left">Telepon</th>
      <td> : <input type="text" name="telepon" value="<?=@$x['telepon']?>" required autocomplete="off"></td>
    </tr>
  </table>
  </div><br>

  <div class="dua">
  <table>
    <tr>
      <th class="left">Jenis Cuti</th>
      <td>
        <select name="jenis_cuti_id" id="">
          <option value="">pilih jenis cuti</option>
          <?php foreach ($jenis_cuti as $key => $value) : ?>
            <option value="<?= $value['jenis_cuti_id'] ?>"
            <?= ( $value['jenis_cuti_id'] == @$x['jenis_cuti_id'] ) ? 'selected' : '' ?>>
            <?= $value['jenis_cuti'] ?>
          </option>
          <?php endforeach; ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="left">Catatan Cuti</th>
      <td>
        <select name="alasan_cuti" id="">
          <option value="">pilih catatan cuti</option>
            <?php foreach ($catatan_cuti as $key => $value) : ?>
          <option value="<?= $value['nama_catatan_cuti'] ?>" 
            <?= ($value['nama_catatan_cuti'] == @$x['alasan_cuti']) ? 'selected' : '' ?>>
            <?= $value['nama_catatan_cuti'] ?>
          </option>
            <?php endforeach; ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="left">Mulai dari </th>
      <td><input type="date" name="awal_cuti" value="<?=@$x['awal_cuti']?>" required>  Sampai : <input type="date" name="akhir_cuti" value="<?=@$x['akhir_cuti']?>" required></td>

    </tr>
    <tr>
      <th class="left">Alamat </th>
      <td><textarea name="alamat_selama_cuti" cols="30" rows="3"><?=@$x['alamat_selama_cuti']?></textarea></td>
    </tr>

    <tr>
      <th class="left">Keterangan</th>
      <td>
        <textarea name="keterangan" cols="30" rows="3"><?=@$x['keterangan']?></textarea>
      </td>
      <th class="left">Tertanda Dosen</th>
      <td><input type="file" value="<?=@$x['ttd_dsn']?>" name="ttd_dsn" id=""></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <th class="left">Tertanda Atasan</th>
      <td><input type="file" name="ttd_atasan" id=""></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <th class="left"><input type="text" value="<?= $date ?>" name="tgl_pengisian_form" style="width: 70px; padding: 2px" readonly></th>
      <td></td>
    </tr>
 
  </table>
  <?php $x = mt_rand(1, 10); ?>
  <input type="hidden" value="<?= $x; ?>" name="dosen_id">
 
  <input type="hidden" value="tidak ada" name="perubahan">
  <input type="hidden" value="ditangguhkan" name="ditangguhkan">
  <input type="hidden" value="1" name="status">
  <button type="submit">Simpan</button> 
  </div>
</form>
<br><br>
<form action="cuti-tampil.php">
  <button type="submit">Kembali</button>
</form>
</body>
</html>