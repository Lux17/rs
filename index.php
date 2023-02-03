<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <title>Sistem Informasi Pelayanan Rumah Sakit - Masuk</title>
  </head>
  <body>
 <style>
    body {
  background-image: url("assets/img/bgmerah6.png");
    }
  </style>

<div class="m-4" >
    <a class="navbar-brand" href="index.php" >
        <!-- <img src="assets/img/rs.png"  alt="" width="70" height="40" class="d-inline-block align-text-top"> -->
    </a>  
</div>
  <div style="display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    min-height: 100%;
    margin-left: 5px;
    margin-right: 10px;
    padding: 20px;">
  <div class="card shadow-sm" style="width: 27rem;" >
  <div class="card-body">
    <h1 class="card-title" style="color: #b31919;">Masuk Akun</h1>
    <p class="card-text" style="color: #b31919;">Silahkan  masuk ke akunmu.</p>
    <form method="POST"  action="login_action.php">
      <div class="col-12">
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Username</label>
            <input type="username" class="form-control" id="username" name="username" >
        </div>
        <label for="Password" class="form-label" >Password</label>
        <div class="mb-3 input-group">
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelpInline" data-toggle="password" name="password">
            <div class= "input-group-append">
            <span class="input-group-text" onclick="password_show_hide();">
                  <i class="mb-2 fas fa-eye" id="show_eye"></i>
                  <i class="mb-2 fas fa-eye-slash d-none" id="hide_eye"></i>
            </span>
            </div>
          </div>
  </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">ingat saya</label>
        </div>
        <div class="d-grid mx-auto">
            <button class="btn btn-large btn-block btn-danger tombol" type="submit" value="login">Masuk</button>
        </div>
    </form>
    
    <div class="d-flex py-2 mt-3 border-top">

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
<?php

				if(isset($_GET['pesan'])){
	        if($_GET['pesan'] == "gagal"){
		       echo "Login gagal! username dan password salah!";
	        }else if($_GET['pesan'] == "logout"){
		       echo "Anda telah berhasil logout";
	        }else if($_GET['pesan'] == "belum_login"){
		       echo "Anda harus login untuk mengakses dashboard";
	        }
        }
				?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>