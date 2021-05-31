<?php 
require 'function.php';
if(isset($_POST['barangmasuk'])){
    if(barangmasuk($_POST)>0){
        echo "<script>alert('Barang Berhasil Masuk!');window.location='masuk.php'</script>";
    }else{
        echo mysqli_error($conn);
    }
}
