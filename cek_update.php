<?php
require 'function.php';
if(edit($_POST)>0){
    echo "<script>alert('data berhasil diubah!');window.location='index.php'</script>";
}else{
    echo mysqli_error($conn);
}
