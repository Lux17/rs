<?php
  include('koneksi.php'); 
  session_start();   

  $query = mysqli_query($kon, "SELECT max(kd_pasien) as kode_pasien FROM pasien");
  $data = mysqli_fetch_array($query);
  $kodepasien = $data['kode_pasien'];

  $urutan = (int) substr($kodepasien, 3, 3);

  $urutan++;

  $huruf = "P";
  $kodepasien= $huruf . sprintf("%03s", $urutan);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pelayanan Rumah Sakit- Pasien</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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
            

            <li class="nav-item active">
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
                    <h1 class="h3 mb-2 text-gray-800">Pasien</h1>
                    <p class="mb-4">Daftar List Pasien .</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Data Tabel Pasien</h6>
                        </div>

                
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



<div class="d-sm-flex align-items-center justify-content-between mb-4">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Tambah Pasien
</button>
                
                    </div>

   


<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="pasien/tambah_pasien.php" enctype="multipart/form-data" >
                        <section class="base align-items-center ">

                        <div class="row mb-3">
                            <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="kd_pasien" value="<?php echo $kodepasien ?>" />
                        </div>
                    </div>
                            <div class="row mb-3">
                            <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_pasien" autofocus="" required=""  />
                        </div>
                    </div>
                    <div class="row mb-3">
                            <label class="col-sm-3">JK</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="jk" required="" >
                                <option selected value="">Pilih</option> 
                                <option value="Laki-laki">Laki-laki</option>
                                <option  value="Perempuan">Perempuan</option>
                                </select>
                                <div class="input-group-append">
                            </div>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control" name="alamat_pasien" required="" > </textarea>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">TGL Datang</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" name="tgl_datang" />
                            </div>
                            </div>
                  
                            <div class="row mb-3">
                            <label for="keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                            <div class="col-sm-8">
                            <textarea type="text" class="form-control" name="keluhan" > </textarea>
                            </div>
                            </div>
                  
                            <div class="row mb-3">
                            <label class="col-sm-3">Dokter</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="kd_dokter" name="kd_dokter" required="" >
                                <option selected value="">Pilih</option> 
                                <option value="D001">Dr. Adik - Penyakit Dalam</option>
                                <option value="D002">Dr. Lukman - Dokter Umum</option>
                                <option value="D003">Dr. Adi - Dokter Anak</option>
                                <option value="D004">Dr. Nana - Dokter Umum</option>
                                <option value="D005">Dr. Masduki - THT</option>
                                <option value="D006">Dr. Annisa - Dokter Kandungan</option>
                                <option value="D007">Dr. Hadi Suproyadi - Radiologi</option>
                                <option value="D008">Dr. Grealdine - Dokter Gigi</option>
                                <option value="D009">Dr. Faisal Rahman - Dokter Mata</option>
                                <option value="D010">Dr. Bobi Sunandar - Dokter Bedah</option>
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
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>TGL Datang</th>
                                            <th>Keluhan</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialisasi</th>
                                        
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>TGL Datang</th>
                                            <th>Keluhan</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialisasi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                           

                                    $query = "SELECT p.kd_pasien,p.nama_pasien,p.alamat_pasien,p.keluhan,p.kd_dokter,p.tgl_datang,d.nama_dokter,d.spesialisasi,p.jk FROM pasien p INNER JOIN dokter d ON d.kd_dokter=p.kd_dokter ORDER BY kd_pasien DESC";
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
                                        <td><?php echo $row['kd_pasien']; ?></td>
                                        <td><?php echo $row['nama_pasien']; ?></td>
                                        <td><?php echo $row['jk']; ?></td>
                                        <td><?php echo substr($row['alamat_pasien'], 0, 20); ?>...</td>
                                        <td><?php echo $row['tgl_datang']; ?></td>
                                        <td><?php echo $row['keluhan']; ?></td>
                                        <td><?php echo $row['nama_dokter']; ?></td> 
                                        <td><?php echo $row['spesialisasi']; ?></td>  
                                        
                                       
                                
                                        

                                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalliat<?php echo $row['kd_pasien'];?>">
                            <i class="fas fa-fw fa-eye"></i>
                            </button>

                                        |
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modalubah<?php echo $row['kd_pasien'];?>">
                            <i class="fas fa-fw fa-edit"></i>
                            </button>
   
        <div class="modal fade" id="Modalubah<?php echo $row['kd_pasien'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="pasien/edit_pasien.php" enctype="multipart/form-data" >
            
                        <section class="base align-items-center ">
                        <div>
                            <input type="hidden" value="<?php echo $row['kd_pasien']; ?>" name="kd_pasien" required="" />
                        </div>
                        <div class="row mb-3">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo $row['nama_pasien']; ?>" name="nama_pasien" autofocus="" required="" />
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3"> JK</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="jk" >
                                    <option selected ><?php echo $row['jk']; ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option  value="Perempuan">Perempuan</option>
                                </select>
                                <div class="input-group-append">
                            </div>
                            </div>
                            </div>

                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control" value="<?php echo $row['alamat_pasien']; ?>" name="alamat_pasien" required="" > <?php echo $row['alamat_pasien']; ?></textarea>
                        </div>
                        </div>

                        
                        <div class="row mb-3">
                        <label for="TGL" class="col-sm-3 col-form-label">TGl Datang</label>
                        <div class="col-sm-8">
                        <input type="date" class="form-control" value="<?php echo $row['tgl_datang']; ?>" name="tgl_datang" required="" />
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control" value="<?php echo $row['keluhan']; ?>" name="keluhan" required="" ><?php echo $row['keluhan']; ?> </textarea>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="kd_dokter" class="col-sm-3 col-form-label">Kode Dokter</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?php echo $row['kd_dokter']; ?>" name="kode_dokter" readonly/>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3">Dokter</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="kd_dokter" name="kd_dokter" required="" >
                                <option selected value="<?php echo $row['kd_dokter']; ?>">
                                <?php $kode_dok = $row['kd_dokter'];
                                switch($kode_dok){

                                    case 'D001':
                                        echo ('Dr. Adik - Penyakit Dalam');
                                        break;
                                    case 'D002':
                                        echo ('Dr. Lukman - Dokter Umum');
                                        break;
                                    case 'D003':
                                        echo ('Dr. Adi - Dokter Anak');
                                        break;
                                    case 'D004':
                                        echo ('Dr. Nana - Dokter Umum');
                                        break;
                                    case 'D005':
                                        echo ('Dr. Masduki - THT');
                                        break;
                                    case 'D006':
                                        echo ('Dr. Annisa - Dokter Kandungan');
                                        break;
                                    case 'D007':
                                        echo ('Dr. Hadi Suproyadi - Radiologi');
                                        break;
                                    case 'D008':
                                        echo ('Dr. Grealdine - Dokter Gigi');
                                        break;
                                    case 'D009':
                                        echo ('Dr. Faisal Rahman - Dokter Mata');
                                        break;
                                    case 'D010':
                                        echo ('Dr. Bobi Sunandar - Dokter Bedah');
                                        break;
                                    default:
                                    echo "Dokter tidak ditemukan";
                                    break;
                                    


                                };

                                    
                                
                                ?>
                                </option> 
                                <option value="D001">Dr. Adik - Penyakit Dalam</option>
                                <option value="D002">Dr. Lukman - Dokter Umum</option>
                                <option value="D003">Dr. Adi - Dokter Anak</option>
                                <option value="D004">Dr. Nana - Dokter Umum</option>
                                <option value="D005">Dr. Masduki - THT</option>
                                <option value="D006">Dr. Annisa - Dokter Kandungan</option>
                                <option value="D007">Dr. Hadi Suproyadi - Radiologi</option>
                                <option value="D008">Dr. Grealdine - Dokter Gigi</option>
                                <option value="D009">Dr. Faisal Rahman - Dokter Mata</option>
                                <option value="D010">Dr. Bobi Sunandar - Dokter Bedah</option>
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



        <div class="modal fade" id="Modalliat<?php echo $row['kd_pasien'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" >
            
                        <section class="base align-items-center ">
                        <div>
                            <input type="hidden" value="<?php echo $row['kd_pasien']; ?>" name="kd_pasien" required="" />
                        </div>
                        <div class="row mb-3">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                        <h5>  <?php echo $row['nama_pasien']; ?></h5>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                        <h5> <?php echo $row['jk']; ?></h5>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                        <h5> <?php echo $row['alamat_pasien']; ?></h5>
                        </div>
                        </div>

                        
                        <div class="row mb-3">
                        <label for="TGL" class="col-sm-3 col-form-label">TGl Datang</label>
                        <div class="col-sm-8">
                        <h5> <?php echo $row['tgl_datang']; ?></h5>
                       </div>
                        </div>

                        <div class="row mb-3">
                        <label for="Keluhan" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-8">
                        <h5> <?php echo $row['keluhan']; ?></h5>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="nm_dokter" class="col-sm-3 col-form-label">Dokter</label>
                        <div class="col-sm-8">
                        <h5><?php $kode_dok = $row['kd_dokter'];
                                switch($kode_dok){

                                    case 'D001':
                                        echo ('Dr. Adik - Penyakit Dalam');
                                        break;
                                    case 'D002':
                                        echo ('Dr. Lukman - Dokter Umum');
                                        break;
                                    case 'D003':
                                        echo ('Dr. Adi - Dokter Anak');
                                        break;
                                    case 'D004':
                                        echo ('Dr. Nana - Dokter Umum');
                                        break;
                                    case 'D005':
                                        echo ('Dr. Masduki - THT');
                                        break;
                                    case 'D006':
                                        echo ('Dr. Annisa - Dokter Kandungan');
                                        break;
                                    case 'D007':
                                        echo ('Dr. Hadi Suproyadi - Radiologi');
                                        break;
                                    case 'D008':
                                        echo ('Dr. Grealdine - Dokter Gigi');
                                        break;
                                    case 'D009':
                                        echo ('Dr. Faisal Rahman - Dokter Mata');
                                        break;
                                    case 'D0010':
                                        echo ('Dr. Bobi Sunandar - Dokter Bedah');
                                        break;
                                    default:
                                    echo "Dokter tidak ditemukan";
                                    break;
                                    


                                }; 
                                ?></h5>
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
                                            <a href="pasien/hapus_pasien.php?id=<?php echo $row['kd_pasien']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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
                        <span aria-hidden="true">??</span>
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