<html>
<head></head>
    <body>

<?php
require_once '../database/config.php';
session_start();
$nik = trim(mysqli_real_escape_string($koneksi, $_POST['nikterpilih']));
// $user = trim(mysqli_real_escape_string($koneksi, $_POST['usernameterpilih']));
// $nama = trim(mysqli_real_escape_string($koneksi, $_POST['namaterpilih']));
$queryhapuspengguna=mysqli_query($koneksi,"DELETE FROM tbl_pengguna WHERE nik='$nik' ") or die (mysqli_error($koneksi));
?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna telah dihapus", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_administrator";
}, 5000);
</script>
</body>

</html>