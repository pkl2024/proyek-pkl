<html>
<head></head>
    <body>

<?php
require_once '../database/config.php';
session_start();
if (isset($koneksi, $_POST['hapus'])){
    $idagama = trim(mysqli_real_escape_string($koneksi, $_POST['hpid']));
    $queryhapusagama=mysqli_query($koneksi,"DELETE FROM tbl_agama WHERE id='$idagama' ") or die (mysqli_error($koneksi));
    ?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna telah dihapus", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_agama";
}, 2000);
</script>
<?php
}

if (isset($koneksi, $_POST['tambah'])){
    $agama = trim(mysqli_real_escape_string($koneksi, $_POST['tm_agama']));
    $queryhapusagama=mysqli_query($koneksi,"INSERT INTO tbl_agama VALUES ('','$agama')") or die (mysqli_error($koneksi));
   ?> 
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna telah dihapus", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_agama";
}, 2000);
</script>
<?php
}
if (isset($koneksi, $_POST['edit'])){
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $agama = trim(mysqli_real_escape_string($koneksi, $_POST['agama']));
    $queryhapusagama=mysqli_query($koneksi,"UPDATE tbl_agama SET agama='$agama' WHERE id='$id'") or die (mysqli_error($koneksi));
   ?> 
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna telah dihapus", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_agama";
}, 2000);
</script>
<?php
}

?>
</body>

</html>