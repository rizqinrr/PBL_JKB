<?php 
include('../functions/functions.php');
$koneksi = new Database();

$tgl_pengisian_form = $_POST['tgl_pengisian_form'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$unit_kerja = $_POST['unit_kerja'];
$nip = $_POST['nip'];
$masa_kerja = $_POST['masa_kerja'];
$jenis_cuti_id = $_POST['jenis_cuti_id'];
$alasan_cuti = $_POST['alasan_cuti'];
$catatan_cuti_id = $_POST['jenis_cuti_id'];
$alamat_selama_cuti = $_POST['alamat_selama_cuti'];
$perubahan = $_POST['perubahan'];
$ditangguhkan = $_POST['ditangguhkan'];
$ttd_dsn = $_POST['ttd_dsn'];
$ttd_atasan = $_POST['ttd_atasan'];
$awal_cuti = $_POST['awal_cuti'];
$akhir_cuti = $_POST['akhir_cuti'];
$status = $_POST['status'];
$telepon = $_POST['telepon'];
$keterangan = $_POST['keterangan'];
$dosen_id = $_POST['dosen_id'];

if (@$_GET['id']) {
  $id = $_GET['id'];
  $koneksi->delete_cuti($id);
}
else if (@$_POST['cuti_id']) {
  $id = $_POST['cuti_id'];
  $koneksi->update_cuti($tgl_pengisian_form,
                        $nama,
                        $jabatan,
                        $unit_kerja,
                        $nip,
                        $masa_kerja,
                        $jenis_cuti_id,
                        $alasan_cuti,
                        $catatan_cuti_id,
                        $alamat_selama_cuti,
                        $perubahan,
                        $ditangguhkan,
                        $ttd_dsn,
                        $ttd_atasan,
                        $awal_cuti,
                        $akhir_cuti,
                        $status,
                        $telepon,
                        $keterangan,
                        $id);
  
} else {

$koneksi->tambah_cuti($tgl_pengisian_form,
                        $nama,
                        $jabatan,
                        $unit_kerja,
                        $nip,
                        $masa_kerja,
                        $jenis_cuti_id,
                        $alasan_cuti,
                        $catatan_cuti_id,
                        $alamat_selama_cuti,
                        $perubahan,
                        $ditangguhkan,
                        $ttd_dsn,
                        $ttd_atasan,
                        $awal_cuti,
                        $akhir_cuti,
                        $status,
                        $telepon,
                        $keterangan,
                        $dosen_id);

}
header('location:cuti-tampil.php');

?>