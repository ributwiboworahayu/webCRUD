<?php
  require '../koneksi/conn.php';

  session_start();

  if (isset($_SESSION["regist"])){
    header("Location: ..");
    exit;
  }
?>
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

  <form method="post">
    <div class="container text-center">
      <h1>Selamat Datang</h1>
      <p>Silahkan login!</p>
    </div>
    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="email" placeholder="Masukan Email" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Masukan Password" name="psw" required>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <span class="psw">Forgot <a href="#">password?</a></span>
      <button type="submit" name="login">Login</button>
       <label for="regist">Don't have account?</label><br>
      <a href="../registrasi" role="button" class="mt-5 pr-4 pl-4 pt-2 mb-4 registbtn bg-primary text-center text-white" name="regist">Register</a>
    </div>
  </form>
    
    <?php
    if (isset($_POST["login"])) {

      $username = $_POST["uname"];
      $password = $_POST["psw"];

      $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

      if (mysqli_num_rows($hasil)==1){

        $row = mysqli_fetch_assoc($hasil);
        if (password_verify($password, $row["password"]) ){

          $_SESSION["regist"] = true;
          echo "<script>alert('Login Berhasil!')</script>";
          echo "<script>window.location = '..'</script>";
          exit;
        }
      }
      echo "<script>alert('Nama atau Password salah!')</script>";
      echo "<script>window.location = '/'</script>";
      $error=true;
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