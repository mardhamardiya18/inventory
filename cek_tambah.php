<?php
require 'function.php';
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('Barang berhasil ditambahkan!');window.location='index.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}
