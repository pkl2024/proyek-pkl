<?php
session_start();
$konstruktor = 'data_administrator';
require_once '../database/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PMB</title>
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
        <div class="col-lg-12">
        <div class="card">
              <div class="card-header"style="background-color:#800000">
                <h3 class="card-title"><font color="ffffff"><i class="nav-icon fas fa-user"></i> &nbsp Data Administrator</font></h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">

              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tambahdata">
              <i class="nav-icon fas fa-plush"></i>Tambah Data 
            </button>
            <br>
            <br>
                <table id="example1" class="table table-bordered table-striped table-s">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th><center>NIK</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Agama</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                  <thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sqlpanggilpengguna = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna") or die (mysqli_error($koneksi));
                        if (mysqli_num_rows($sqlpanggilpengguna)>0){
                            //jika ada data di database

                            //lakukan perulangan panggilan data
                            while ($data = mysqli_fetch_array($sqlpanggilpengguna)){
                            ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$data['nik'];?></td>
                                <td><?=$data['nama'];?></td>
                                <td>
                                  <?php
                                  // punya modal apa?
                                  $nekat = $data['id_agama'];
                                  // panggil query agama
                                  $querynekat = mysqli_query($koneksi, "SELECT agama FROM tbl_agama WHERE id='$nekat'") or die (mysqli_error($koneksi));
                                  // tampungan array dari query
                                  $tampungnekat = mysqli_fetch_array($querynekat);
                                  // tampilkan berdasarkan nama kolom pada database
                                  $agama = $tampungnekat['agama'];

                                  ?>
                                  <?=$agama
                                  ?>
                                </td>
                                <td> 

                                <center>
                                     <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit" data-nik="<?=$data ['nik'];?>" data-user="<?=$data['user'];?>" data-nama="<?=$data['nama'];?>">
                                     <i class="nav-icon fas fa-edit"></i>Edit  
                                    </button>
                          
                                
                                     <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-default" data-nik="<?=$data ['nik'];?>" data-user="<?=$data['user'];?>" data-nama="<?=$data['nama'];?>">
                                     <i class="nav-icon fas fa-trash-alt"></i>Hapus   
                                    </button>
                            </center>
                                    <!-- <a href="hapus2.php?unique=<?=$data['nik'];?>&jeneng=<?=$data['nama'];?>" class="btn btn-sm btn-info">
                                    <i class="nav-icon fas fa-trash-alt"></i> -->

                                    </a>
                              </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //jika tidaK ada data di database
                            echo "<tr><td> colspan=\"4\"aligan=\"center\"><h5>Datanya Kosong</h5></td></tr>";
                        }
                        ?>
                        <tr>

                        </tr>
                    </tbody>
                </thead>
                </table>
              </div>
              <!-- /.card-body -->
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
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"style="background-color:#800000;"> 
              <h4 class="modal-title"><font color="#ffffff">HAPUS DATA</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="hapus.php" method="POST" id="hapusdata">
            <div class="modal-body">
              <table>
                <thead>
                      </thead>
                      <tbody>
                      <tr>
                        <td width="30%">NIK</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="nikterpilih" class="form-control"hidden>
                        <input type="text" name="nikterpilih2" class="form-control" disabled>
                        </td>

                      </tr>
                      <tr>
                        <td width="30%">Nama Pengguna</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="namaterpilih" class="form-control"disabled></td>

                      </tr>
                      <tr>
                        <td width="30%">Username</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="usernameterpilih" class="form-control"disabled></td>

                      </tr>
                      </tbody>
                      </table>
           
            </div>
            <div class="modal-footer pull-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" name="hapus"class="btn btn-primary">Hapus</button>
                     
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
      </div>
<div class="modal fade" id="modal-tambahdata">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"style="background-color:#800000;"> 
              <h4 class="modal-title"><font color="#ffffff">Tambah Data Pengguna</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="tambahdata.php" method="POST" id="tambahdata">
            <div class="modal-body">
            <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Input NIK">
                  </div>
            <div class="form-group">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Pengguna">
                  </div>
            <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">
                  </div>
            <div class="form-group">
                  <label for="agama">Agama</label>
                  <select class="custom-select form-control-border" id="agama" name="agama">
                    <option value="">-- Pilih Agama --</option>
                    <?php
                    $sqlpanggilagama = mysqli_query($koneksi,"SELECT * FROM tbl_agama") or die (mysqli_error($koneksi));
                    while($dt_agama=mysqli_fetch_array($sqlpanggilagama)){
                      echo '<option value="'.$dt_agama['id'].'"> '.$dt_agama[agama].' </option>';
                    }
                    ?>
                  </select>
                  </div>
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" name="tambah" class="btn btn-danger"color="#000000"><h6><b><i class="nav-icon fas fa-download"> &nbsp </i>Tambah Data</b></h6>
            </button>
                     
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"style="background-color:#800000;"> 
              <h4 class="modal-title"><font color="#ffffff">Edit Data</font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="editdata">
            <div class="modal-body">
              <table>
                <thead>
                      </thead>
                      <tbody>
                      <tr>
                        <td width="30%">NIK</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_nikterpilih" class="form-control"hidden>
                        <input type="text" name="ed_nikterpilih2" class="form-control" disabled>
                        </td>

                      </tr>
                      <tr>
                        <td width="30%">Username</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_usernameterpilih" class="form-control"disabled></td>

                      </tr>
                      <tr>
                        <td width="30%">Nama Pengguna</td>
                        <td width="5%">:</td>
                        <td><input type="text" name="ed_namaterpilih" class="form-control"></td>

                      </tr>
                     
                      </tbody>
                      </table>
           
            </div>
            <div class="modal-footer pull-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" name="edit" class="btn btn-primary">Edit data</button>
                     
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<?php
include '../script.php';
?>

<script type="text/javascript">
  $('#modal-default').on('show.bs.modal',function(e){
    var nik  = $(e.relatedTarget).data('nik');
    var user = $(e.relatedTarget).data('user');
    var nama = $(e.relatedTarget).data('nama');

    $(e.currentTarget).find('input[name="nikterpilih"]').val(nik);
    $(e.currentTarget).find('input[name="nikterpilih2"]').val(nik);

    $(e.currentTarget).find('input[name="usernameterpilih"]').val(user);
    $(e.currentTarget).find('input[name="namaterpilih"]').val(nama);
  });
  </script>
  <script type="text/javascript">
  $('#modal-edit').on('show.bs.modal',function(e){
    var ed_nik  = $(e.relatedTarget).data('nik');
    var ed_user = $(e.relatedTarget).data('user');
    var ed_nama = $(e.relatedTarget).data('nama');

    $(e.currentTarget).find('input[name="ed_nikterpilih"]').val(ed_nik);
    $(e.currentTarget).find('input[name="ed_nikterpilih2"]').val(ed_nik);

    $(e.currentTarget).find('input[name="ed_usernameterpilih"]').val(ed_user);
    $(e.currentTarget).find('input[name="ed_namaterpilih"]').val(ed_nama);
  });
  </script>

  
</body>
</html>
