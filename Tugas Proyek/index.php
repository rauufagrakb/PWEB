<?php
session_start();

if(!isset($_SESSION["login"])){
    $error = true;
}

require 'php/functions.php';
include 'php/postalert.php';
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo DIY</title>
    <link rel="icon" href="assets/DIY.png">
    <link rel="stylesheet" href="style/style.css">
    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Map -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="js/script.js"></script>
    <!-- Poppin -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="main-header" id="beranda">
        <div class="container-fluid">
            <div class="row">
                <div class="pe-0 text-center">
                    <a class="navbar-brand" href="index.php"><img id="yogyakarta" src="assets/DIY.png" alt="diy"></a>
                </div>
            </div>
            <div class="row">
                <div class="p-0 mt-2 text-center">
                    <h6 class="mb-0"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></h6>
                    <h6>DAERAH ISTIMEWA YOGYAKARTA</h6>
                </div>
            </div>
        </div>
    </div>
    <header class="sticky-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg bg-primary shadow">
            <div class="container-fluid">
                <button class="navbar-toggler border-2 border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-end mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#berita">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#galeri">Galeri</a>
                        </li>
                        <?php if(!isset($error)):?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="dashboard/dashboard.php">Dashboard Profile</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <!-- Button trigger modal -->
                <?php if(isset($error)):?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter" >
                        <span class="material-symbols-outlined">
                            login
                        </span>
                        <span class="text">
                            Login
                        </span>
                    </button>
                <?php endif;?>
                <?php if(!isset($error)):?>
                    <div class="avatar">
                        <p class="mb-0 me-4 text-light"><?= $_SESSION["username"];?></p>
                    </div>
                    <form action="" method="post">
                        <button type="submit" class="btn btn-primary" name="logout">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                            <span class="text">
                                Logout
                            </span>
                        </button>
                    </form>
                <?php endif;?>
            </div>
        </nav>
    </header>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="container">
                        <div class="mb-3">
                            <label for="user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" aria-describedby="adminHelp">
                        </div>
                        <div id="help" class="form-text">Jika lupa username atau sandi silahkan tanyakan petugas</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

    <!-- Isi -->
    <main>
        <!-- Tentanf -->
        <div class="container p-3">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <h1>Tentang</h1>
                    <p>Dinas Komunikasi dan Informatika DIY mempunyai tugas membantu Gubernur melaksanakan urusan pemerintahan bidang persandian. Pembentukan Dinas Kominfo Pemerintah Daerah DIY merupakan implementasi dari Undang - Undang Nomor 23 Tahun 2014 tantang pemerintahan Daerah dan Peratuaran Pemerintah Nomor 18 Tahun 2016 tentang Perangkat Daerah yang mengamanatkan kepada setiap pemerintah daerah untuk menyelenggarakan urusan pemerintahan wajib yang tidak berkaitan dengan pelayanan dasar, antara lain mencakup komunikasi dan informatika, statistik dan persandian.</p>
                </div>
                <div class="col-md-5 col-sm-12 text-center">
                    <img id="Pancasila" src="assets/Pancasila.png" alt="Pancasila">
                </div>
            </div>
        </div>

        <!-- Berita -->
        <section class="section-1 container shadow-lg rounded" id="berita">
            <div class="container">
                <h1>Berita</h1>
                <!-- BERITA 1 -->
                <?php  foreach($berita as $row):?>
                <div class="news-1 row bg-light rounded shadow-sm">
                    <div class="row col-md-6 align-items-center justify-content-center">
                        <img class="rounded w-75" src="dashboard/dir/<?= $row["gambar"]?>" alt="berita 1">
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="text-decoration-none p-1">
                            <h5><?= $row["judul"];?> </h5>
                        </a>
                        <br>
                        <p class="card-text"><small class="text-muted"><?= $row["waktu"] ?></small></p>
                        <p><?= $row["isi"];?></p>
                        <div class="mini-icon">
                        <p class="text-end"><small class="text-muted"><?= "Edit : ";?><?=$row["waktu"];?></small></p>
                            <button class="btn border-0" type="submit"><img class="navbar-toggler-icon"
                                    src="assets/heart.svg" alt="heart"></button>
                            <button class="btn border-0" type="submit"><img class="navbar-toggler-icon"
                                    src="assets/comment.svg" alt="comment"></button>
                            <button class="btn border-0" type="submit"><img class="navbar-toggler-icon"
                                    src="assets/arrow.svg" alt="arrow"></button>
                            
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </section>
    
        <!-- Galeri -->
        <section id="galeri" class="section-2">
            <div class="container text-center col-md-8 col-md-offset-2">
                <h1>Galeri</h1>
                <div id="carouselExampleCaptions" class="carousel slide shadow-lg" data-bs-ride="carousel">
                    <div class="carousel-inner rounded">
                        <!-- GAMBAR 1 -->
                        <div class="carousel-item active">
                            <img src="assets/foto-1.jpg" class="d-block w-100" alt="foto1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Literasi digital untuk Meningkatkan Kinerja PNS Diskominfo DIY</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <!-- GAMBAR 2 -->
                        <div class="carousel-item">
                            <img src="assets/foto-2.jpg" class="d-block w-100" alt="foto2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Pernak - pernik Upacara HUT RI ke-74 Diskominfo DIY</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <!-- GAMBAR 3 -->
                        <div class="carousel-item">
                            <img src="assets/foto-3.png" class="d-block w-100" alt="foto3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Syawalan dalam rangka Hari Raya Idul Fitri 1440 H</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <!-- PREV -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <!-- NEXT -->
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <!-- Map kontak -->
        <section class="section-3 mt-5">
            <div class="container">
                <div class="map text-center justify-content-center row">
                    <h1>Lokasi</h1>
                    <div class="rounded shadow" id="googleMap" style="width:80%;height:380px;"></div>
                </div>
            </div>
            <div class="container justify-content-center d-flex flex-wrap align-items-center mt-5 mb-5">
                <div class="p-1 m-2 col-5">
                    <div class="row">
                        <label for="alamat" class="col-sm-3">Alamat</label>
                        <div class="col-sm-5">
                            <h6>Jl. Brigjen Katamso Komplek THR Yogyakarta Indonesia</h6>
                        </div>
                    </div>
                    <div class="row">
                        <label for="telepon" class="col-sm-3">Telepon</label>
                        <div class="col-sm-5">
                            <h6>(0274) 373444</h6>
                        </div>
                    </div>
                    <div class="row">
                        <label for="fax" class="col-sm-3">Fax</label>
                        <div class="col-sm-5">
                            <h6>(0274) 374496</h6>
                        </div>
                    </div>
                    <div class="row">
                        <label for="email" class="col-sm-3">Email</label>
                        <div class="col-sm-5">
                            <a href="mailto:diskominfo@jogjaprov.go.id" class="unstyle"><h6>diskominfo@jogjaprov.go.id</h6></a>
                        </div>
                    </div>
                </div>
                <div class="p-1 m-2 col-5 align-items-center">
                    <div class="row align-items-center text-center">
                        <img src="assets/joiswa.png" alt="jogja istimewa">
                    </div>            
                </div>
            </div> 
        </section>
    </main>
    <footer>
        <div class="footer container-fluid bg-primary text-center text-light p-2">
            Dinas Komunikasi dan Informatika - Daerah Istimewa Yogyakarta
        </div>
    </footer>

    <!-- Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>

