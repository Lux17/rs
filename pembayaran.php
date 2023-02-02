<?php
  include('koneksi.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi & Registrasi PKL- Dashboard</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../assets/img/faviconumc.png" rel="icon">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger  sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
            <div class="sidebar-brand-icon">
                <img src="../assets/img/faviconumc.png" alt="" width="43" height="45" class="d-inline-block align-text-top">
            </div>
            <div class="sidebar-brand-text mx-3">SI Rumah Sakit </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>
        
        <!-- Nav Item - Tables -->
        <li class="nav-item ">
            <a class="nav-link" href="pasien.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Pasien</span></a>
        </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="dokter.php">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Dokter</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="petugas.php">
                    <i class="fas fa-fw fa-landmark"></i>
                    <span>Petugas</span></a>
            </li>
        <!-- Nav Item - Pages Collapse Menu -->

                <li class="nav-item">
                            <a class="nav-link" href="ruang.php">
                                <i class="fas fa-fw fa-clipboard-check"></i>
                                <span>Ruang</span></a>
                        </li>
            <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Kelola
                </div>

                <li class="nav-item active">
                    <a class="nav-link " href="pembayaran.php">
                        <i class="fas fa-fw fa-clipboard-check"></i>
                        <span>Pembayaran</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="rawat.php">
                        <i class="fas fa-fw fa-clipboard-check"></i>
                        <span>Rawat inap</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="users.php">
                        <i class="fas fa-fw fa-user-circle"></i>
                        <span>Akun</span></a>
                </li>

        <!-- Nav Item - Charts -->

        

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

      

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                        
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">                               
      
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
                    <p class="mb-4">Daftar List Pembayaran .</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Data Tabel Pembayaran</h6>
                        </div>

                
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                         <!-- Button trigger modal -->


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Tambah Pembayaran
</button>
                
                    </div>

   


<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="pembayaran/tambah_pembayaran.php" enctype="multipart/form-data" >
                        <section class="base align-items-center ">
                            <div class="row mb-3">
                            <label for="kd_pembayaran" class="col-sm-2 col-form-label">Kode pembayaran</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="kd_pembayaran" />
                            </div>
                            </div>
                  
                            <div class="row mb-3">
                            <label for="kd_petugas" class="col-sm-2 col-form-label">Kode Petugas</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="kd_petugas" autofocus="" required=""  />
                        </div>
                    </div>
                    
                            <div class="row mb-3">
                            <label for="kd_pasien" class="col-sm-2 col-form-label">Kode Pasien</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="kd_pasien" required="" />
                            </div>
                            </div>
                  
                            <div class="row mb-3">
                            <label for="jmlh_harga" class="col-sm-2 col-form-label">Total Harga</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="jmlh_harga" />
                            </div>
                            </div>
                  


      
                            
                        </section>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
        </div>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode pembayaran</th>
                                            <th>Kode Petugas</th>
                                            <th>Kode Pasien</th>
                                            <th>Total Harga</th>
                                            
                                        
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Kode pembayaran</th>
                                            <th>Kode Petugas</th>
                                            <th>Kode Pasien</th>
                                            <th>Total Harga</th>
                                            
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                           
                                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan 
                                    $query = "SELECT * FROM pembayaran ORDER BY kd_pembayaran ASC";
                                    $result = mysqli_query($kon, $query);
                                    //mengecek apakah ada error ketika menjalankan query
                                    if(!$result){
                                        die ("Query Error: ".mysqli_errno($kon).
                                        " - ".mysqli_error($kon));
                                    }

                                    //buat perulangan untuk element tabel dari data pembayaran
                                    $no = 1; //variabel untuk membuat nomor urut
                                    // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                    // kemudian dicetak dengan perulangan while
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['kd_pembayaran']; ?></td>
                                        <td><?php echo $row['kd_petugas']; ?></td>
                                        <td><?php echo substr($row['kd_pasien'], 0, 20); ?>...</td>
                                        <td><?php echo $row['jmlh_harga']; ?></td>
                                        
                                       
                                
                                        

                                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalliat<?php echo $row['kd_pembayaran'];?>">
                            Lihat
                            </button>

                                        |
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modalubah<?php echo $row['kd_pembayaran'];?>">
                            Ubah
                            </button>
   
        <div class="modal fade" id="Modalubah<?php echo $row['kd_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="pembayaran/edit_pembayaran.php" enctype="multipart/form-data" >
            
                        <section class="base align-items-center ">

                        <div class="row mb-3">
                        <label for="kd_pembayaran" class="col-sm-2 col-form-label">Kode Pembayaran</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['kd_pembayaran']; ?>" name="kd_pembayaran"  autofocus="" required="" />
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Nama" class="col-sm-2 col-form-label">Kode Petugas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['kd_petugas']; ?>" name="kd_petugas" autofocus="" required="" />
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-2 col-form-label">Kode Pasien</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['kd_pasien']; ?>" name="kd_pasien" required="" />
                        </div>
                        </div>

                        

                        <div class="row mb-3">
                        <label for="jmlh_harga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['jmlh_harga']; ?>" name="jmlh_harga" required="" />
                        </div>
                        </div>


           

                        </section>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
        </div>



        <div class="modal fade" id="Modalliat<?php echo $row['kd_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" >
            
                        <section class="base align-items-center ">
                        <div>
                            <input type="hidden" value="<?php echo $row['kd_pembayaran']; ?>" name="kd_pembayaran" required="" />
                        </div>
                        <div class="row mb-3">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Pembayaran</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['kd_pembayaran']; ?>" name="kd_pembayaran" autofocus="" required="" />
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Nama" class="col-sm-2 col-form-label">Kode Petugas</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['kd_petugas']; ?>" name="kd_petugas" autofocus="" required="" />
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-2 col-form-label">Kode Pasien</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['kd_pasien']; ?>" name="kd_pasien" required="" />
                        </div>
                        </div>

                        

                        <div class="row mb-3">
                        <label for="jmlh_harga" class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row['jmlh_harga']; ?>" name="jmlh_harga" required="" />
                        </div>
                        </div>

           

                        </section>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
            </form>
            </div>
        </div>
        </div>

                                        |
                                            <a href="pembayaran/hapus_pembayaran.php?id=<?php echo $row['kd_pembayaran']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                        
                                    <?php
                                        $no++; //untuk nomor urut terus bertambah 1
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
                        <span>Copyright &copy; Lucky Saputra</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" jika anda ingin mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Keluar</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>