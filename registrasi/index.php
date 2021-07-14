<?php
  require '../koneksi/conn.php';

  session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Welcome</title>
  </head>
  <body>
    <form style="border:1px solid #ccc" method="post">
      <div class="container">
        <div class="bg-secondary">
          <div class="text-white ml-4">
            <h2>Registrasi</h2>
            <p>Silahkan lengkapi formulir untuk membuat akun!</p>
            <hr>
          </div>
        </div>

        <label for="Name"><b>Nama</b></label>
        <input type="text" placeholder="Masukan Nama" name="uname" required>

        <label for="Name"><b>Email</b></label>
        <input type="email" placeholder="Masukan email" name="email" required>

        <label for="jeniskel">Jenis Kelamin</label>
          <select class="form-control" name="jeniskel">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>

        <label for="jurusan">Jurusan</label>
          <select class="form-control" name="jurusan">
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Pendidikan Ilmu Komputer">Pendidikan Ilmu Komputer</option>
          </select>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Masukan Password" name="psw" required>

        <label for="psw-repeat"><b>Ulangi Password</b></label>
        <input type="password" placeholder="Ulangi Password" name="psw-repeat" required>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <div class="clearfix">
          <span class="psw">Already Register? <a href="../login">Login</a></span>
          <button type="submit" class="signupbtn" name="regist">Register</button>
        </div>
        <p>Dengan membuat akun anda menyetujui <a href="#" style="color:dodgerblue">Syarat & Ketentuan</a> kami.</p>
      </div>
    </form>
  <?php

  if (isset($_POST['regist'])) {


    $name = $_POST['uname'];
    $username = strtolower(stripslashes( $_POST['email']));
    $password = mysqli_real_escape_string($conn, $_POST['psw']);
    $password2 = mysqli_real_escape_string($conn, $_POST['psw-repeat']);
    $jeniskel = $_POST['jeniskel'];
    $jurusan = $_POST['jurusan'];

    $result = mysqli_query ($conn, "SELECT username FROM user WHERE username = '$username' ");
    
    if (mysqli_fetch_assoc ($result) ){
      echo "
      <script>
        alert('Email sudah Terdaftar');
      </script>
      ";
      return false;
    }

    if ( $password !== $password2){
      echo "
      <script>
      alert('Konfirmasi Password Tidak Sesuai')
      </script>
      ";

      return false;
    } 

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user VALUES ('','$username','$name','$jeniskel','$jurusan','$password')";
    mysqli_query($conn, $query);
    if ($query) {
            echo "<script>alert('User Berhasil Ditambahkan!')</script>";
            echo "<script>window.location = '..'</script>";
          } else {
            echo "<script>alert('User Gagal Ditambahkan!<br>Koneksi ke database Gagal.')</script>";
          }
    return mysqli_affected_rows($conn);
  }
  ?>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script type="text/javascript" src="../js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" type="text/javascript" src="../js/script.js"></script>
  </body>
</html>
