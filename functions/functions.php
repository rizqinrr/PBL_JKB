<?php
session_start();
class Database {

  protected $host = 'localhost';
  protected $user = 'root';
  protected $pass = '';
  protected $database = 'persuratan_dosen';
  public $koneksi;

  public function __construct()
  {
    $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
		if(!$this->koneksi){
      echo 'Gagal terhubung ke database';
    }
  }

  public function tampil_data()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM cuti_dosen");
    $hasil = [];
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

  public function tampil_jenis_cuti()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM detail_jenis_cuti");
    $jenis = [];
		while($row = mysqli_fetch_array($data)){
			$jenis[] = $row;
		}
		return $jenis;
	}

  public function ambil_id_jenis($jenis_cuti_id)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM detail_jenis_cuti WHERE jenis_cuti_id='$jenis_cuti_id'");
		return $query->fetch_array();
	}

  public function tambah_jenis_cuti($jenis_cuti)
  {
    $query = "INSERT INTO detail_jenis_cuti (jenis_cuti) VALUE ('$jenis_cuti')";
    mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
  }

  public function delete_jenis_cuti($jenis_cuti_id)
  {
    $query = "DELETE FROM detail_jenis_cuti WHERE jenis_cuti_id = $jenis_cuti_id";
    mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
  }

  public function tampil_catatan_cuti()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM detail_catatan_cuti");
    $catatan = [];
		while($row = mysqli_fetch_array($data)){
			$catatan[] = $row;
		}
		return $catatan;
	}

  public function ambil_id_catatan($catatan_cuti_id)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM detail_catatan_cuti WHERE catatan_cuti_id='$catatan_cuti_id'");
		return $query->fetch_array();
	}

  public function tambah_catatan_cuti($catatan_cuti)
  {
    $query = "INSERT INTO detail_catatan_cuti (nama_catatan_cuti) VALUE ('$catatan_cuti')";
    mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
  }

  public function delete_catatan_cuti($catatan_cuti_id)
  {
    $query = "DELETE FROM detail_catatan_cuti WHERE catatan_cuti_id = $catatan_cuti_id";
    mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
  }

  public function tambah_cuti( $tgl_pengisian_form,
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
                        $dosen_id)
  {
    $query = "INSERT INTO cuti_dosen (
                tgl_pengisian_form,
                nama,
                jabatan,
                unit_kerja,
                nip,
                masa_kerja,
                jenis_cuti_id,
                alasan_cuti,
                catatan_cuti_id,
                alamat_selama_cuti,
                perubahan,
                ditangguhkan,
                ttd_dsn,
                ttd_atasan,
                awal_cuti,
                akhir_cuti,
                `status`,
                telepon,
                keterangan,
                dosen_id)
        VALUES (
                '$tgl_pengisian_form',
                '$nama',
                '$jabatan',
                '$unit_kerja',
                '$nip',
                '$masa_kerja',
                '$jenis_cuti_id',
                '$alasan_cuti',
                '$catatan_cuti_id',
                '$alamat_selama_cuti',
                '$perubahan',
                '$ditangguhkan',
                '$ttd_dsn',
                '$ttd_atasan',
                '$awal_cuti',
                '$akhir_cuti',
                '$status',
                '$telepon',
                '$keterangan',
                '$dosen_id')";
    mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
  }

  public function ambil_id($cuti_id)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM cuti_dosen WHERE cuti_id='$cuti_id'");
		return $query->fetch_array();
	}

  public function update_cuti(
                       $tgl_pengisian_form,
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
                       $id)
  {
    $query = "UPDATE cuti_dosen SET
      tgl_pengisian_form = '$tgl_pengisian_form',
      nama = '$nama',
      jabatan  = '$jabatan',
      unit_kerja = '$unit_kerja',
      nip = '$nip',
      masa_kerja = '$masa_kerja',
      jenis_cuti_id = '$jenis_cuti_id',
      alasan_cuti = '$alasan_cuti',
      catatan_cuti_id = '$catatan_cuti_id',
      alamat_selama_cuti = '$alamat_selama_cuti',
      perubahan = 'sudah dirubah',
      ditangguhkan = '$ditangguhkan',
      ttd_dsn = '$ttd_dsn',
      ttd_atasan = '$ttd_atasan',
      awal_cuti = '$awal_cuti',
      akhir_cuti = '$akhir_cuti',
      `status` = '$status',
      telepon = '$telepon',
      keterangan = '$keterangan'
      WHERE cuti_id = '$id'";

  mysqli_query($this->koneksi, $query);
  }

  public function delete_cuti($id)
	{
		mysqli_query($this->koneksi,"DELETE FROM cuti_dosen WHERE cuti_id ='$id'");
	}

  public function cari($keyword)
  {
    $data = mysqli_query($this->koneksi,"SELECT * FROM cuti_dosen
                                          WHERE
                                          nama LIKE '%$keyword%' OR
                                          jabatan LIKE '%$keyword%' OR
                                          unit_kerja LIKE '%$keyword%' OR
                                          nip LIKE '%$keyword%' OR
                                          alasan_cuti LIKE '%$keyword%' OR
                                          perubahan LIKE '%$keyword%' OR
                                          ditangguhkan LIKE '%$keyword%' OR
                                         `status` LIKE '%$keyword%' OR
                                          telepon LIKE '%$keyword%'
                                          ");
    $hasil = [];
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		} 
		return $hasil;
  }

  public function register($username, $password, $cpassword, $email) {

    $username = strtolower(stripslashes($username));
    $password = mysqli_real_escape_string($this->koneksi, $password);
    $cpassword = mysqli_real_escape_string($this->koneksi, $cpassword);
    $email = strtolower(htmlspecialchars($email));

    //cek username
    $data = mysqli_query($this->koneksi,"SELECT username FROM user
                                          WHERE username = '$username'");
    if (mysqli_fetch_assoc($data)) {
      echo "<script>
      alert('Username sudah terdaftar!');
      document.location.href = '../users/register.php';
      </script>";
    return false;
    }
    //cek konfirmasi password
    if ($password !== $cpassword) {
      echo "<script>
      alert('Konfirmasi password tidak sesuai!');
      document.location.href = '../users/register.php';
      </script>";
    return false;
    }
    
    $password = password_hash( $password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (username, `password`, email) VALUE ('$username', '$password', '$email')";
    mysqli_query($this->koneksi, $query) or die(mysqli_error($this->koneksi));
    return 1;
  }

  public function login($username, $password) {
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($this->koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
      //cek password
      $hasil = mysqli_fetch_assoc($result);
      if (password_verify($password, $hasil['password'])) {
        $_SESSION['login'] = true;
        header('location: ../cuti/index.php');
        exit;
      }
    }
    return 1;
  }
}
