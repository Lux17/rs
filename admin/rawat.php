<?php
  include('koneksi.php'); 
  session_start();   
  $query = mysqli_query($kon, "SELECT max(kd_rawatinap) as kode_rawat FROM rawat_inap");
  $data = mysqli_fetch_array($query);
  $koderawat= $data['kode_rawat'];

  $urutan = (int) substr($koderawat, 3, 3);

  $urutan++;

  $huruf = "RI";
  $koderawat= $huruf . sprintf("%03s", $urutan);
                             

                              
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pelayanan Rumah Sakit - Rawat Inap</title>


<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../assets/img/favicon.png" rel="icon">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">


<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


<div id="wrapper">

    <ul class="navbar-nav bg-gradient-danger  sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
            <div class="sidebar-brand-icon">
                <img src="../assets/img/favicon.png" alt="" width="43" height="45" class="d-inline-block align-text-top">
            </div>
            <div class="sidebar-brand-text mx-3">SI Rumah Sakit </div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Data
            </div>
            
            <li class="nav-item">
                <a class="nav-link" href="pasien.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Pasien</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="dokter.php">
                    <i class="fas fa-fw fa-user-md"></i>
                    <span>Dokter</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="petugas.php">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <span>Petugas</span></a>
            </li>

                <li class="nav-item">
                    <a class="nav-link" href="ruang.php">
                    <i class="fas fa-fw fa-clinic-medical"></i>
                    <span>Ruang</span></a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Kelola
                </div>

                <li class="nav-item ">
                    <a class="nav-link " href="pembayaran.php">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Pembayaran</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link " href="rawat.php">
                        <i class="fas fa-fw fa-procedures"></i>
                        <span>Rawat inap</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="users.php">
                        <i class="fas fa-fw fa-user-circle"></i>
                        <span>Akun</span></a>
                </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">                               
                                 <?php
                                echo $_SESSION['username'];
                                ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Keluar
                                </a>
                            </div>
                        </li>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Rawat inap</h1>
                    <p class="mb-4">Daftar List Rawat inap .</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Data Tabel Rawat inap</h6>
                        </div>

                
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                         <!-- Button trigger modal -->


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Tambah Rawat inap
</button>
                
                    </div>


<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rawat inap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="rawatinap/tambah_rawat.php" enctype="multipart/form-data" >
                        <section class="base align-items-center ">
                            <div class="row mb-3">
                            <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="kd_rawatinap" value="<?php echo $koderawat ?>"/>
                            </div>
                            </div>
                            
                                                        <div class="row mb-3">
                                                        <label class="col-sm-3">Nama Pasien</label>
                                                        <div class="input-group col-sm-8">
                                                            <select class="custom-select" id="kd_pasien" name="kd_pasien" required="" >
                                                            <option selected value="">Pilih</option> 
                                                            <?php 
                                                                $query = "SELECT * FROM pasien ORDER BY kd_pasien DESC";
                                                                $result = mysqli_query($kon, $query);
                                                                if(!$result){
                                                                    die ("Query Error: ".mysqli_errno($kon).
                                                                    " - ".mysqli_error($kon));
                                                                }
                                                                $no = 1; 

                                                                while($row = mysqli_fetch_assoc($result))
                                                                {
                                                            ?>
                                                            <option value="<?=$row['kd_pasien']?>"><?=$row['nama_pasien']?> - <?=$row['alamat_pasien']?></option>
                                                            <?php
                                                               };
                                                            ?> 
                                                            </select>
                                                            <div class="input-group-append">
                                                        </div>
                                                        </div>
                                                        </div>
                                                

                    <div class="row mb-3">
                            <label class="col-sm-3">Ruang</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="kd_ruang" name="kd_ruang" required="" >
                                <option selected value="">Pilih</option> 
                                <?php 
                                    $query = "SELECT * FROM ruang";
                                    $result = mysqli_query($kon, $query);
                                    if(!$result){
                                        die ("Query Error: ".mysqli_errno($kon).
                                        " - ".mysqli_error($kon));
                                    }
                                    $no = 1;

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <option value="<?=$row['kd_ruang']?>"><?=$row['nama_ruang']?></option>
                                <?php
                                   };
                                ?> 
                                </select>
                                <div class="input-group-append">
                            </div>
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
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Ruang</th>
                                            <th>Gedung</th>
 
                                            
                                        
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Kode rawatinap</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Ruang</th>
                                            <th>Gedung</th>

                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM rawat_inap INNER JOIN pasien ON rawat_inap.kd_pasien = pasien.kd_pasien INNER JOIN ruang ON rawat_inap.kd_ruang = ruang.kd_ruang ORDER BY kd_rawatinap ASC";
                                    $result = mysqli_query($kon, $query);

                                    if(!$result){
                                        die ("Query Error: ".mysqli_errno($kon).
                                        " - ".mysqli_error($kon));
                                    }

                                    $no = 1; 

                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['kd_rawatinap']; ?></td>
                                        <td><?php echo $row['nama_pasien']; ?></td>
                                        <td><?php echo substr($row['alamat_pasien'], 0, 20); ?>...</td>
                                        <td><?php echo $row['jk']; ?></td>
                                        <td><?php echo $row['nama_ruang']; ?></td>
                                        <td><?php echo $row['nama_gedung']; ?></td>

                                        
                                       
                                
                                        

                                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalliat<?php echo $row['kd_rawatinap'];?>">
                            <i class="fas fa-fw fa-eye"></i>
                            </button>

                                        |
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modalubah<?php echo $row['kd_rawatinap'];?>">
                            <i class="fas fa-fw fa-edit"></i>
                            </button>


        <div class="modal fade" id="Modalliat<?php echo $row['kd_rawatinap'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Rawat inap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" >

                        <section class="base align-items-center ">
                        <div>
                            <input type="hidden" value="<?php echo $row['kd_rawatinap']; ?>" name="kd_rawatinap" required="" />
                        </div>
                        <div class="row mb-3">
                        <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['kd_rawatinap']; ?></h5>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['nama_pasien']; ?></h5>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['alamat_pasien']; ?></h5>
                       </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">JK</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['jk']; ?></h5>
                       </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Ruang</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['nama_ruang']; ?></h5>
                       </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Gedung</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['nama_gedung']; ?></h5>
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

        <div class="modal fade" id="Modalubah<?php echo $row['kd_rawatinap'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Rawat inap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="rawatinap/edit_rawat.php" enctype="multipart/form-data" >
            
                        <section class="base align-items-center ">

                        <div class="row mb-3">
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" value="<?php echo $row['kd_rawatinap']; ?>" name="kd_rawatinap"  autofocus="" required="" />
                        </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-3">Nama Pasien</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="kd_pasien" name="kd_pasien" required="" >
                                <option selected value="<?=$row['kd_pasien']?>"><?=$row['nama_pasien']?></option>

                                </select>
                                <div class="input-group-append">
                                </div>
                                </div>
                                </div>


                            <div class="row mb-3">
                            <label class="col-sm-3">Ruang</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="kd_ruang" name="kd_ruang" required="" >
                                <option selected value="<?=$row['kd_ruang']?>"><?=$row['nama_ruang']?></option> 
                                <option value="R001">Mawar - R001</option> 
                                <option value="R002">Melati - R002</option> 
                                <option value="R003">Anggrek - R003</option> 
                                <option value="R004">Kamboja - R004</option> 
                                <option value="R005">Tulip - R005</option> 

                                </select>
                                <div class="input-group-append">
                                </div>
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



                                        |
                                            <a href="rawatinap/hapus_rawat.php?id=<?php echo $row['kd_rawatinap']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                        
                                    <?php
                                        $no++; 
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lucky Saputra</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>