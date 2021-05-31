<?php
session_start();
session_destroy();
echo "<script>alert('Yeay..Anda berhasil Logout! Sampai jumpa kembali');window.location='login.php';</script>";
