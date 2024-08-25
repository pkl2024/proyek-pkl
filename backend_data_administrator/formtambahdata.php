<?php
session_start();
$konstruktor = "data_administrator";
require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>
<?php
include '../listlink.php';
?>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light"style="background-color:#800000">
    <!-- Left navbar links -->
    <?php
    include '../navbar.php';
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-danger elevation-4"style="background-color:#ffffff">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../gagal/assets/img/upblogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><font color="#000000">UPB PMB</font></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
          include '../sidebar.php';
          ?>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header" style="background-color:#800000">
                    <h3 class="card-title"><font color="white"><i class="nav-icon fas fa-users"></i>Tambah Data Administrator</font></h3>
                 
</div>
<form class="form-horizontal" action="tambahdata.php" method="POST" id="tambahdata">
<div class="card-body">
<a href="../backend_data_administrator" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-chevron-left"></i>Kembali Halaman Sebelumnya</a>
           <br>
           <br> 
           <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Input NIK" required>
                  </div>
            <div class="form-group">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Pengguna" required>
                  </div>
            <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Input Username"required>
                  </div>
            <div class="form-group">
                  <label for="agama">Agama</label>
                  <select class="custom-select form-control-border" id="agama" name="agama"required>
                    <option value="">-- Pilih Agama --</option>
                    <?php
                    $sqlpanggilagama = mysqli_query($koneksi,"SELECT * FROM tbl_agama") or die (mysqli_error($koneksi));
                    while($dt_agama=mysqli_fetch_array($sqlpanggilagama)){
                      echo '<option value="'.$dt_agama['id'].'"> '.$dt_agama[agama].' </option>';
                    }
                    ?>
                  </select>
            </div>
            <div class="form-group">
                  <label for="kelamin">Kelamin</label>
                  <select class="custom-select form-control-border" id="kelamin" name="kelamin"required>
                    <option value="">-- Pilih Kelamin --</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" name="tambah" class="btn btn-danger"><h6><i class="nav-icon fas fa-download"> </i> Tambah Data</h6>
            </button>     
            </div>
                </form>
</div>
</div>
</div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <?php
include '../footer.php';
?>
 
</div>
<?php
include '../script.php';
?>
</body>
</html>
