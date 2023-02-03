<?php
  include('../koneksi.php'); 
  session_start();       
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pelayanan Rumah Sakit - User</title>

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

                <li class="nav-item">
                    <a class="nav-link " href="rawat.php">
                        <i class="fas fa-fw fa-procedures"></i>
                        <span>Rawat inap</span></a>
                </li>

                <li class="nav-item active">
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

                    <h1 class="h3 mb-2 text-gray-800">Kelola Akun</h1>
                    <p class="mb-4">Kelola Akun.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-danger">Data Tabel Akun</h6>
                        </div>

<center><h3>Data Akun</h3><center>

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Tambah Users
</button>
    <br>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div>
            <form method="POST" action="users/tambah_users.php" enctype="multipart/form-data" >
                        <section class="base align-items-center ">

                            <div class="row mb-3">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="username" autofocus="" required="" />
                            </div>
                            </div>
                            
                            <div class="row mb-3">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelpInline" data-toggle="password"  />
                            <div class= "input-group-append">
                            <span class="input-group-text" onclick="password_show_hide();">
                                <i class="mb-2 fas fa-eye" id="show_eye"></i>
                                <i class="mb-2 fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                            </div>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label class="col-sm-3"> Rolename</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="rolename" required="" >
                                <option selected value="">Pilih</option> 
                                <option value="admin">Admin</option>
                                <option  value="operator">Operator</option>
                                </select>
                                <div class="input-group-append">
                            </div>
                            </div>
                            </div>


   
           
                        </section>
                        
            </div>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
                    <br/>

                    <table class="table table-hover">

                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Rolename</th>
                        <th scope="col"></th>
                   
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM users ORDER BY iduser ASC";
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
                        <td  scope="row"><?php echo $no; ?></td>
                        <td  scope="row"><?php echo $row['username']; ?></td>
                        <td  scope="row"><?php echo $row['password']; ?></td>
                        <td  scope="row"><?php echo $row['rolename']; ?></td>
                    
                        <td  scope="row">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $row['iduser'];?>">
                        <i class="fas fa-fw fa-edit"></i>
                        </button>
   
        <div class="modal fade" id="exampleModal<?php echo $row['iduser'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="users/edit_users.php" enctype="multipart/form-data" >
            
                        <section class="base align-items-center ">
                        <div>
                            
                            <input type="hidden" value="<?php echo $row['iduser']; ?>" name="iduser" required="" />
                            </div>
                            <div>
                            <div class="row mb-3">
                            <label for="username" class="col-sm-3 col-form-label">username</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="username" autofocus="" required="" />
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label for="password" class="col-sm-3 col-form-label">password</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="password" required="" />
                            </div>
                            </div>

                            <div class="row mb-3">
                            <label class="col-sm-3"> Rolename</label>
                            <div class="input-group col-sm-8">
                                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="rolename" required="" >
                                <option selected value="<?php echo $row['rolename']; ?>"><?php echo $row['rolename']; ?></option> 
                                <option value="admin">admin</option>
                                <option  value="pembimbing">pembimbing</option>
                                <option  value="mahasiswa">mahasiswa</option>
                                </select>
                                <div class="input-group-append">
                            </div>
                            </div>
                            </div>
                            </div>

                        </section>
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
                            <a href="users/hapus_users.php?id=<?php echo $row['iduser']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                        
                    <?php
                        $no++; 
                    }
                    ?>
                    </tbody>
                    </table>
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
    <script type="text/javascript">
    function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
    }
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>