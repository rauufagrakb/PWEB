<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location:../index.php");
    exit;
}
require('../php/functions.php');
include('../php/postalert.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo DIY - Add User</title>
    <link rel="icon" href="../assets/DIY.png">
    <link rel="stylesheet" href="../style/register.css">
    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex flex-wrap align-items-center vh-100 justify-content-center position-relative">
        <div class="col-lg-6 text-center">
            <a href="../index.php"><img class="w-50"src="../assets/DIY.png" alt="yogyakarta"></a>
            <div class="mt-2 text-center">
                <h6 class="mb-0"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></h6>
                <h6>DAERAH ISTIMEWA YOGYAKARTA</h6>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form p-1 m-2">
                <form method="post" class="align-items-center">
                    <div class="row mb-5">
                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nip" name="nip">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password2" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password2" name="password2">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-end" name="registrasi">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</html>