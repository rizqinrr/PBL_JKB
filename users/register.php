<?php
include('../functions/functions.php');
$db = new Database();

if (@$_POST) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $email = $_POST['email'];

  
  $register = $db->register($username, $password, $cpassword, $email);
  if ($register > 0) {
    echo "<script>
    alert('User baru berhasil ditambahkan!');
    </script>";
  } else {
    mysqli_error($this->koneksi);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    .username, .password, .confirm-password, .email{
      display:flex;
      flex-direction: column;
      margin-bottom: 15px;
    }
    .card {
      width: 300px;
    }
  </style>
</head>
<body>
  <form action="" method="POST">
    <div class="container">
      <div class="card">
        <div class="username">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="masukan username" required autofocus autocomplete="off">
        </div>
        <div class="password">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="masukan password">
        </div>
        <div class="confirm-password">
          <label for="password">Confirm Password</label>
          <input type="password" name="cpassword" placeholder="masukan password">
        </div>
        <div class="email">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="masukan email">
        </div>
        <button type="submit">Register</button>
        <p>sudah punya akun? <a href="login.php">masuk</a></p>
      </div>
    </div>
  </form>
</body>
</html>