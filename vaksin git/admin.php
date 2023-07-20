<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="RPL">

    <title>
        Admin | Data Vaksin
    </title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INVENTORY</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            

            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-one d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <form action="{{url('logout')}}">
                                <div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
            </div>                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Data Vaksin</h1>
                        <p class="mb-4">Manajemen Vaksin | Inventory Vaksin</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-4">
                                <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel
                                    <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                                </h6>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Vaksin</th>
                                                <th>Nama</th>
                                                <th>Tanggal Datang</th>
                                                <th>Expired</th>
                                                <th>Asal</th>
                                                <th>Jumlah</th>
                                                <th>Penggunaan</th>
                                                <th>Sisa</th>
                                                <th>Kuota</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;
                                            $hasil = $koneksi->query("SELECT * FROM datavaksin");
                                            ?>
                                            <?php
                                            while ($row = $hasil->fetch_assoc()) {
                                                # code...

                                            ?>
                                                <tr>
                                                    <td width="5%"><?= $no++; ?></td>
                                                    <td><?= $row['idVaksin']; ?></td>
                                                    <td><?= $row['Nama']; ?></td>
                                                    <td><?= $row['tgl_datang']; ?></td>
                                                    <td><?= $row['expired']; ?></td>
                                                    <td><?= $row['asal']; ?></td>
                                                    <td><?= $row['jumlah']; ?></td>
                                                    <td><?= $row['penggunaan']; ?></td>
                                                    <td><?= $row['sisa']; ?></td>
                                                    <td><?= $row['kuota']; ?></td>
                                                    <td><?= $row['keterangan']; ?></td>
                                                    <td>
                                                        <a href="editvaksin.php?edit=<?= $row['idVaksin'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusdata<?= $row['idVaksin']; ?>">
                                                            Hapus
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="hapusdata<?= $row['idVaksin']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"> Yakin ingin menghapus data</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <a href="koneksi.php?idVaksin=<?= $row['idVaksin']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    <?php
                                            }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="koneksi.php" method="POST">
                                        <div class="form-group">
                                            <label for="id_barang">ID Vaksin</label>
                                            <input type="text" class="form-control" id="idVaksin" aria-describedby="idVaksin" name="idVaksin">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_barang">Nama Vaksin</label>
                                            <input type="text" class="form-control" id="Nama" aria-describedby="Nama" name="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_barang">Tanggal Datang</label>
                                            <input type="date" class="form-control" id="tgl_datang" aria-describedby="tgl_datang" name="tgl_datang">
                                        </div>
                                        <div class="form-group">
                                            <label for="spesifikasi">Expired</label>
                                            <input type="date" class="form-control" id="expired" name="expired">
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Asal</label>
                                            <input type="text" class="form-control" id="asal" name="asal">
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_barang">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumber_dana">Penggunaan</label>
                                            <input type="text" class="form-control" id="penggunaan" name="penggunaan">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumber_dana">Sisa</label>
                                            <input type="text" class="form-control" id="sisa" name="sisa">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumber_dana">Kuota</label>
                                            <input type="text" class="form-control" id="kuota" name="kuota">
                                        </div>
                                        <div class="form-group">
                                            <label for="sumber_dana">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                                    </form>
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
                        <span>Copyright &copy; Fred 2023</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/sweetalert2.all.js"></script>


    <script src="js/bootstrap.min.js"></script>

    <script>
        @if($message = Session::get('dataTambah'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Data Barang Berhasil Ditambah'
        })
        @endif
    </script>
</body>

</html>