<?php
require 'function.php';
if (isset($_POST['barangkeluar'])) {
    if (keluar($_POST) > 0) {
        echo "<script>alert('Data barang keluar berhasil disimpan $prestock');window.location='keluar.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
