<?php
require 'function.php';

if (isset($_POST['regis'])) {
    if (regis($_POST) > 0) {
        echo "<script>alert('Akun berhasil ditambahkan!, Silahkan Login');window.location='login.php'
         </script>";
    } else {
        echo mysqli_error($conn);
    }
}
