<html>
<head>
</head>
<body>

<?php
require_once '../database/config.php';
session_start();
//triger tambah data pada halaman sebelumnya
if(isset($koneksi, $_POST['edit'])){

    $unique = trim(mysqli_real_escape_string($koneksi, $_POST['ed_nikterpilih']));
    $nama   = trim(mysqli_real_escape_string($koneksi, $_POST['ed_namaterpilih']));
    
$queryupdate = mysqli_query($koneksi, "UPDATE tbl_pengguna SET nama='$nama' WHERE nik='$unique'") or die (mysqli_error($koneksi));
   
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna sudah berhasil di edit", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_administrator";
}, 1000);
</script>
<?php 
}
?>
</body>
</html>