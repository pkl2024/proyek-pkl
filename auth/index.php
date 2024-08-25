<?php
session_start();
require_once '../database/config.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>UNIVERSITAS PERADABAN</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="styles/app.min.css"/>
  <link rel="shortcut icon" href="assets/img/logo upb.png">

</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin v2 usersession">
    <div class="session-wrapper">
      <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image:url(assets/img/upb1.jpg);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
           <div class="item" style="background-image:url(assets/img/upb2.jpg);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(assets/img/upb3.jpg);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
        </div>
      </div>
      <div class="card bg-white  blue no-border" style="background-color:#ffffff;">
        <div class="card-block">
          <form role="form" class="form-layout" action="" method="post">
            <div class="text-center m-b">    

              <img src="assets/img/logo upb.png" style='width:300px; height:100px;'/> 
              <h4 class="text-uppercase"><b><font color="#000000">SISFO PMB</font></b></h4>
              <h4 class="text-uppercase"><font color="#000000">UNIVERSITAS PERADABAN</font></h4>
            </div>
            <div class="form-inputs p-b">
              <label class="text-uppercase"><font color="#000000">Username</font></label>
              <input type="username" class="form-control input-lg" name="pengguna" id="pengguna" placeholder="input username" required>
              <label class="text-uppercase"><font color="#000000">Password</font></label>
              <input type="password" class="form-control input-lg" name="password" id="password"  placeholder="input password" required>
              <!-- <a href="lupapassword.php"><font color="#ffffff">Lupa Password?</font></a>
             --></div>
              
               <button class="btn btn-warning btn-block btn-lg" type="submit" name= "masuk" style="background-color:#800000;"><font color="#ffffff"><img src="assets/img/personkey-white.png">&nbsp<b>Login</b></font></button>

          <br>
          <center><font color="#000000"><small><em> Copyright &copy; UNIVERSITAS PERADABAN </a></em></</small></font>
          <br/>  
           <font color="#000000"><?php echo date("Y"); ?></</small></font>
            </center>
          </form>
          <?php
          if(isset($koneksi, $_POST['masuk'])){
            $isianusername = trim(mysqli_escape_string($koneksi, $_POST['pengguna']));
            $isianpw = md5(trim(mysqli_escape_string($koneksi, $_POST['password'])));
            $cekdatabase = mysqli_query($koneksi,"SELECT * FROM tbl_pengguna WHERE user = '$isianusername' AND pass = '$isianpw'") or die (mysqli_error($koneksi));

            $returnvalue = mysqli_num_rows($cekdatabase);
            if($returnvalue>0){
              // 1 = jika ada penggunanya di database
              $tampunganarray = mysqli_fetch_assoc($cekdatabase);
              $_SESSION['user'] = $isianusername;
              $_SESSION['nama'] = $tampunganarray['nama'];
              //echo $_SESSION['nama'];
              echo '<script>window.location="../backend"</script>';
            }
            else
            // 0 = jika tidak ada usernya
            {
              //jika tidak ada penggunanya
              echo '<script>window.location="../gagal"</script>';
            }
            


          }

          ?>

        </div>
      </div>
    </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="scripts/app.min.js"></script>
</body>

</html>
