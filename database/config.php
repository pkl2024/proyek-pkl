<?php
date_default_timezone_set('Asia/Jakarta');
$koneksi = mysqli_connect('localhost', 'root', '', 'pkl');

if(!$koneksi){
    "koneksi ke database bermasalah - periksa service dbms anda";
}
?>