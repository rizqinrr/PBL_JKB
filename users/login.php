<?php
include('../functions/functions.php');
if (isset($_SESSION['login'])) {
  header('location:../cuti/index.php');
}
$db = new Database();

if (@$_POST) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = $db->login($username, $password);
  if ($login = 1) :?>
  <p style="color: red; font-style:italic">username / password anda salah</p>
  <?php endif;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>

    .username, .password, .confirm-password, .email{
      display:flex;
      flex-direction: column;
      margin-bottom: 15px;
    }
    .card {
      width: 300px;
      align-items: center;
    }
  </style>
</head>
<body>
  <h1>Halaman Login</h1>
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
        <button type="submit">Login</button>
        <p>Belum punya akun? <a href="register.php">daftar</a></p>
        
      </div>
    </div>
  </form>
</body>
</html>