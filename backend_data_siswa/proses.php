<html>
<head></head>
    <body>

<?php
require_once '../database/config.php';
session_start();
if (isset($koneksi, $_POST['hapus'])){
    $nisn = trim(mysqli_real_escape_string($koneksi, $_POST['nisnterpilih']));
    $queryhapussiswa=mysqli_query($koneksi,"DELETE FROM tbl_siswa WHERE nisn='$nisn' ") or die (mysqli_error($koneksi));
    ?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna telah dihapus", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_siswa";
}, 2000);
</script>
<?php
}

if (isset($koneksi, $_POST['tambah'])){
    $nisn = trim(mysqli_real_escape_string($koneksi, $_POST['nisn']));
    $queryhapussiswa=mysqli_query($koneksi,"INSERT INTO tbl_siswa VALUES ('$nisn','$nama',$email','$no_hp')") or die (mysqli_error($koneksi));
   ?> 
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>swal("Berhasil", "Data pengguna telah dihapus", "success");
 setTimeout(function(){
    window.location.href = "../backend_data_siswa";
}, 2000);
</script>
<?php
}
if (isset($koneksi, $_POST['edit'])){
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $email = trim(mysqli_real_escape_string($koneksi, $_POST['email']));
    $queryhapussiswa=mysqli_query($koneksi,"UPDATE tbl_agama SET agama='$agama' WHERE id='$id'") or die (mysqli_error($koneksi));
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