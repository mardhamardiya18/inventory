<?php
session_start();
require 'function.php';


if (isset($_POST['login'])) {
    if (login($_POST) > 0) {
        echo "<script>alert('Yeay!!!..Anda Berhasil Login!, Selamat datang');window.location='index.php'
        </script>";
    } else {
        echo "<script>alert('Username atau Password anda salah! , Coba lagi');window.location='login.php'
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Inventory | Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <i style="font-size: 50px;" class="fas fa-user-circle mb-2"></i>
                                        <h1 class="h4 text-gray-900 ">Login</h1>
                                        <h1 class="h4 text-gray-900 mb-4">Aplikasi Inventory</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" required placeholder="Masukan Email Anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" required placeholder="Password">
                                        </div>

                                        <button type="submit" name="login" class="btn btn-danger btn-user btn-block">
                                            Login
                                        </button>


                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="register.php">Belum punya akun? Register Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>