<?php
  require 'koneksi/conn.php';

  session_start();

  if (!isset($_SESSION["regist"])){
    header("Location: login");
    exit;
  }

  $queryUser = "SELECT * FROM user";
  $resultUser  = mysqli_query($conn, $queryUser);
  $countUser = mysqli_num_rows($resultUser);

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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/indexstyle.css">

    <title>Welcome</title>
  </head>
  <body>
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Daftar <b>Pengguna</b></h2>
              </div>
              <div class="col-sm-6">
                <a class="btn btn-success" href="registrasi"><i class="material-icons">&#xE147;</i> <span>Tambah Pengguna</span></a>
                <a class="btn btn-danger" href="#logoutModal" data-toggle="modal"><i class="material-icons">logout</i> <span>Logout</span></a>            
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                  </span>
                </th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
              if ($countUser>0) {
                while ($dataUser = mysqli_fetch_array($resultUser)) {
            ?>
            <tbody>
              <tr>
                <td>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                  </span>
                </td>
                <td><?php echo "$dataUser[2]"; ?></td>
                <td><?php echo "$dataUser[1]"; ?></td>
                <td><?php echo "$dataUser[3]"; ?></td>
                <td><?php echo "$dataUser[4]"; ?></td>
                <td>
                  <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                  <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
              </tr>
              <?php
                  }
                }
              ?> 
            </tbody>
          </table>
        </div>
      </div>        
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="logoutModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">            
              <h4 class="modal-title">Log Out ?</h4>
            </div>
            <div class="modal-footer bg-white">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <a href="logout" role="button" class="btn bg-primary text-center text-white">Yes</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    

     <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" type="text/javascript" src="js/script.js"></script>
  </body>
</html>
