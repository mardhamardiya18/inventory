<?php
require 'function.php';
if (hapus($_POST) > 0) {
    echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
} else {
    echo mysqli_error($conn);
}
