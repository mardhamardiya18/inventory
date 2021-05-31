<?php
$conn = mysqli_connect("localhost", "root", "", "inventory_baru");

function regis($data)
{
    global $conn;
    $nama = stripslashes($data["nama"]);
    $email = stripslashes($data["email"]);
    $password1 = mysqli_real_escape_string($conn, $data["password1"]);
    $password2 =  mysqli_real_escape_string($conn, $data["password2"]);
    if ($password1 !== $password2) {
        echo "<script>alert('Password tidak sesuai!, Silahkan ulangi lagi');window.location='register.php'</script>";
        return false;
    }
    $query = "insert into user values('','$nama','$email','$password1')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function login($login)
{
    global $conn;
    $email = $login["email"];
    $password = $login["password"];
    $query = "SELECT * From user where email='$email' and password='$password'";
    $cek = mysqli_query($conn, $query);
    session_start();
    while ($data = mysqli_fetch_row($cek)) {
        $id_user = $data[0];
        $_SESSION['iduser'] = $id_user;
    }
    $_SESSION['login'] = true;
    return mysqli_affected_rows($conn);
}
function tambah($tambah)
{
    global $conn;
    $namabarang = $tambah['namabarang'];
    $deskripsi = $tambah['deskripsi'];
    $stock = $tambah['stock'];
    $query = "insert into stock values('','$namabarang','$deskripsi','$stock')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function edit($edit)
{
    global $conn;
    $idb = $edit['idb'];
    $namab = $edit['namabarang'];
    $deskripsi = $edit['deskripsi'];
    $stock = $edit['stock'];
    mysqli_query($conn, "update stock set namabarang='$namab', deskripsi='$deskripsi', stock='$stock' where idbarang='$idb'");
    return mysqli_affected_rows($conn);
}
function hapus($hapus)
{
    global $conn;
    $idb = $hapus['idb'];
    mysqli_query($conn, "delete from stock where idbarang='$idb'");
    return mysqli_affected_rows($conn);
}
function barangmasuk($masuk)
{
    global $conn;
    $barang = $masuk['namabarang'];
    $penerima = $masuk['penerima'];
    $qty = $masuk['quantity'];
    $cekstock = mysqli_query($conn, "select * from stock where idbarang='$barang'");
    $ambildata = mysqli_fetch_row($cekstock);
    $stock = $ambildata[3];
    $stockupdate = $stock + $qty;
    mysqli_query($conn, "update stock set stock='$stockupdate' where idbarang='$barang'");
    mysqli_query($conn, "insert into masuk (idbarang,keterangan,quantity) values ('$barang','$penerima','$qty')");
    return mysqli_affected_rows($conn);
}
function keluar($keluar)
{
    global $conn;
    $idb = $keluar['keluar'];
    $qty = $keluar['qty'];
    $penerima = $keluar['penerima'];
    $query = mysqli_query($conn, "select * from stock where idbarang='$idb'");
    $get = mysqli_fetch_row($query);
    $prestock = $get[3];
    if ($prestock >= $qty) {
        $poststock = $prestock - $qty;
        mysqli_query($conn, "update stock set stock='$poststock' where idbarang='$idb'");
    } else {
        echo "<script>alert('Mohon maaf stock barang ini habis! tersisa $prestock kg/liter lagi');windows.location='keluar.php';</script>";
        return false;
    }
    mysqli_query($conn, "insert into keluar (idbarang,penerima,quantity) values('$idb','$penerima','$qty')");
    return mysqli_affected_rows($conn);
}
