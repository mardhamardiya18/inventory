<?php
session_start();
require 'function.php';
if (!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit;
} else {

    if (isset($_SESSION['iduser'])) {
        $iduser = $_SESSION['iduser'];
        $ambildata = mysqli_query($conn, "SELECT * FROM user where `iduser`='$iduser'");
        while ($a = mysqli_fetch_row($ambildata)) {
            $nama = $a[1];
            $email = $a[2];
        }
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
    <title>Barang masuk | Inventory</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger  sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-10">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="sidebar-brand-text mx-3 mt-2">Aplikasi <br>Inventory Gudang</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-3">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-toolbox text-white"></i>
                    <span class="font-weight-bold">Stock Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="masuk.php">
                    <i class="fas fa-sign-in-alt text-white"></i>
                    <span class="font-weight-bold">Barang Masuk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="keluar.php">
                    <i class="fas fa-sign-out-alt text-white"></i>
                    <span class="font-weight-bold">Barang Keluar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-door-open  text-white"></i>
                    <span class="font-weight-bold">Logout</span></a>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-danger topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 font-weight-bold text-white  d-lg-inline small"><i style="font-size: 20px;" class="fas fa-user-circle mr-2"></i><?php echo $nama ?></span>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">

                                    </a>
                                </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h2 class="font-weight-bold text-dark">Data Barang Masuk</h2>
                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark text-center">Data barang yang masuk ke gudang</h6>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i> Tambah Barang Masuk
                            </button>
                            <a href="exportmasuk.php" class="btn btn-warning">Export Data</a>
                        </div>
                        <!-- Button trigger modal -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Penerima</th>
                                            <th class="text-center">Jumlah barang masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, "select * from masuk");
                                        while ($ambil = mysqli_fetch_row($query)) {
                                            $tanggal = $ambil[2];
                                            $penerima = $ambil[3];
                                            $qty = $ambil[4];
                                        ?>
                                            <tr>

                                                <td class="text-center"><?= $no++; ?>.</td>
                                                <td><?= $tanggal; ?> WITA</td>
                                                <td><?= $penerima; ?></td>
                                                <td><?= $qty; ?> kg/liter</td>
                                            </tr>
                                        <?php
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Inventory Barang 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Barang Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="cek_barangmasuk.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <select name="namabarang" class="form-control" id="">
                                <?php
                                $query = mysqli_query($conn, "Select * from stock");
                                while ($semuabarang = mysqli_fetch_row($query)) {
                                    $idb = $semuabarang[0];
                                    $nama = $semuabarang[1];
                                ?>

                                    <option value="<?= $idb; ?>"><?= $nama; ?></option>

                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="penerima" placeholder="Penerima" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="quantity" placeholder="Jumlah" required>
                        </div>

                        <button type="submit" class="btn btn-success" name="barangmasuk"><i class="fas fa-save mr-2"></i>Simpan</button>

                    </div>
                </form>
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