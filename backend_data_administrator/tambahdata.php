<html>
<head>
</head>
<body>

<?php
require_once '../database/config.php';
session_start();
//triger tambah data pada halaman sebelumnya
if(isset($koneksi, $_POST['tambah'])){

    $unique = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $user = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $agama = trim(mysqli_real_escape_string($koneksi, $_POST['agama']));
    $kelamin = trim(mysqli_real_escape_string($koneksi, $_POST['kelamin']));

    $pass = md5($user);
    $Queryceknikuser = mysqli_query($koneksi, "SELECT nik, user FROM tbl_pengguna WHERE nik='$unique' OR user='$user'") or die (mysqli_error($koneksi));

if (mysqli_num_rows($Queryceknikuser)>0){

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Duplikat Data", "Data pengguna sudah terdapat pada database", "error");
 setTimeout(function(){
    window.location.href = "../backend_data_administrator";
}, 2000);
</script>
<?php
}
else
{
 
 $tambahdata = mysqli_query($koneksi,"INSERT INTO tbl_pengguna VALUES ('$unique','$user','$pass','$nama','$agama','$kelamin')") or die (mysqli_error($koneksi));  
 
 ?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna berhasil diinput", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_administrator";
}, 2000);
</script> 
<?php 
 }
}
?>
</body>

</html>