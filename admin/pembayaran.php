<?php
  include('koneksi.php'); 
  session_start();   
  $query = mysqli_query($kon, "SELECT max(kd_pembayaran) as kode_pembayaran FROM pembayaran");
  $data = mysqli_fetch_array($query);
  $kodepembayaran = $data['kode_pembayaran'];

  $urutan = (int) substr($kodepembayaran, 3, 3);

  $urutan++;

  $huruf = "I";
  $kodepembayaran= $huruf . sprintf("%03s", $urutan);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pelayanan Rumah Sakit - Pembayaran</title>

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../assets/img/favicon.png" rel="icon">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


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

                <li class="nav-item active">
                    <a class="nav-link " href="pembayaran.php">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Pembayaran</span></a>
                </li>

                <li class="nav-item">
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

                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
                    <p class="mb-4">Daftar List Pembayaran .</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Data Tabel Pembayaran</h6>
                        </div>

                
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


<div class="d-sm-flex align-items-center justify-content-between mb-4">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Tambah Pembayaran
</button>
</div>


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
                            <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="kd_pembayaran" value="<?php echo $kodepembayaran?>"/>
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
                                                        <label class="col-sm-3">Petugas</label>
                                                        <div class="input-group col-sm-8">
                                                            <select class="custom-select" id="kd_petugas" name="kd_petugas" required="" >
                                                            <option selected value="">Pilih</option> 
                                                            <?php 
                                                                $query = "SELECT * FROM petugas ORDER BY kd_petugas DESC";
                                                                $result = mysqli_query($kon, $query);
                                                                if(!$result){
                                                                    die ("Query Error: ".mysqli_errno($kon).
                                                                    " - ".mysqli_error($kon));
                                                                }
                            
                                                                $no = 1; 

                                                                while($row = mysqli_fetch_assoc($result))
                                                                {

                                                            ?>
                                                            <option value="<?=$row['kd_petugas']?>"><?=$row['nama_petugas']?> - <?=$row['kd_petugas']?></option>
                                                            <?php
                                                               };
                                                            ?> 
                                                            </select>
                                                            <div class="input-group-append">
                                                        </div>
                                                        </div>
                                                        </div>
                  
                            <div class="row mb-3">
                            <label for="jmlh_harga" class="col-sm-3 col-form-label">Total Biaya</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="jmlh_harga" placeholder="Rp." />
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
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Keluhan</th>
                                        <th>Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Petugas</th>
                                        <th>Total Biaya</th>
                                            
                                        
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Kode pembayaran</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Keluhan</th>
                                        <th>Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Petugas</th>
                                        <th>Total Biaya</th>
                                            
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM pembayaran INNER JOIN petugas ON pembayaran.kd_petugas = petugas.kd_petugas INNER JOIN pasien ON pembayaran.kd_pasien = pasien.kd_pasien INNER JOIN dokter ON pasien.kd_dokter = dokter.kd_dokter ORDER BY kd_pembayaran ASC";
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
                                        <td><?php echo $row['kd_pembayaran']; ?></td>
                                        <td><?php echo $row['nama_pasien']; ?></td>
                                        <td><?php echo substr($row['alamat_pasien'], 0, 20); ?>...</td>
                                        <td><?php echo $row['keluhan']; ?></td>
                                        <td><?php echo $row['nama_dokter']; ?></td>
                                        <td><?php echo $row['spesialisasi']; ?></td>
                                        <td><?php echo $row['nama_petugas']; ?></td>
                                        <td><?php echo $row['jmlh_harga']; ?></td>
                                        
                                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalliat<?php echo $row['kd_pembayaran'];?>">
                            <i class="fas fa-fw fa-eye"></i>
                            </button>

                                        |
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modalubah<?php echo $row['kd_pembayaran'];?>">
                            <i class="fas fa-fw fa-edit"></i>
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
                            <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="kd_pembayaran" value="<?php echo $row['kd_pembayaran'];?>"/>
                            </div>
                            </div>
                  
                            <div class="row mb-3">
                                                        <label class="col-sm-3">Nama Pasien</label>
                                                        <div class="input-group col-sm-8">
                                                            <select class="custom-select" id="kd_pasien" name="kd_pasien" required="" >
                                                            <option selected value="<?php echo $row['kd_pasien']; ?>"><?php echo $row['nama_pasien']; ?></option> 
                                                            </select>
                                                            <div class="input-group-append">
                                                        </div>
                                                        </div>
                                                        </div>


                                                        <div class="row mb-3">
                                                        <label class="col-sm-3">Petugas</label>
                                                        <div class="input-group col-sm-8">
                                                            <select class="custom-select" id="kd_petugas" name="kd_petugas" required="" >
                                                            <option selected value="<?=$row['kd_petugas']?>"><?=$row['nama_petugas']?></option> 
                                                            <option value="E001">Abdul - E001</option> 
                                                            <option value="E002">Rey - E002</option> 
                                                            <option value="E003">Hendra - E003</option> 
                                                            <option value="E004">Jainal - E004</option> 
                                                            <option value="E005">Maharani - E005</option> 

                                                            </select>
                                                            <div class="input-group-append">
                                                        </div>
                                                        </div>
                                                        </div>
                  
                            <div class="row mb-3">
                            <label for="jmlh_harga" class="col-sm-3 col-form-label">Total Biaya</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="jmlh_harga" placeholder="Rp."  value="<?php echo $row['jmlh_harga']; ?>"/>
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
                        <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['kd_pembayaran']; ?></h5>
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
                        <label for="Alamat" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['keluhan']; ?></h5>
                       </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Dokter</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['nama_dokter']; ?></h5>
                       </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Spesialis</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['spesialisasi']; ?></h5>
                       </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Petugas</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['nama_petugas']; ?></h5>
                       </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Biaya</label>
                        <div class="col-sm-8">
                        <h5>  Rp.  <?php  echo $row['jmlh_harga']; ?></h5>
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