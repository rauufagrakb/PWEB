<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location:../index.php");
    exit();
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
    <title>Dashboard Profile</title>
    <link rel="shortcut icon" href="../assets/DIY.png">
    <link rel="stylesheet" href="../style/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/dashboard_style.css">
    <!-- Poppin -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <main>
        <nav class="sidebar close">
            <header>
                <div class="image-text justify-content-between">
                    <span class="image">
                        <a class="navbar-brand" href=".."><img id="yogyakarta" src="../assets/DIY.png" alt="diy"></a>
                    </span>
                    <div class="text logo-text me-4 text-center">
                        <span class="name"><?= $_SESSION["username"]; ?></span>
                        <?php if(isset($_SESSION["id"])):?>
                            <span class="profession">Superuser</span>
                        <?php endif;?>
                        <form action="" method="post">
                            <button type="submit" class="btn p-0" name="logout2">
                                <i class='bx bx-pie-chart-alt icon'>
                                    <span class="material-symbols-outlined flex">
                                        logout
                                    </span>
                                </i>
                            </button>
                        </form>
                    </div>
                </div>
                <i class='bx bx-chevron-right toggle'>
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <li class="search-box">
                        <i class='bx bx-search icon'>
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </i>
                        <input type="text" placeholder="Search...">
                    </li>
                    <ul id="myList" role="tablist" class="flex-column ps-0">
                        <li class="nav-item" aria-current="page">
                            <a class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-dashboard" role="tab" aria-controls="pills-dashboard" aria-selected="true" type="button">
                                <i class='bx bx-home-alt icon'>
                                    <span class="material-symbols-outlined flex">
                                        dashboard
                                    </span>
                                </i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item" aria-current="page">
                            <a class="nav-link" id="pills-berita-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-berita" type="button" role="tab" aria-controls="pills-berita"
                                aria-selected="true">
                                <i class='bx bx-bar-chart-alt-2 icon'>
                                    <span class="material-symbols-outlined">
                                        newspaper
                                    </span>
                                </i>
                                <span class="text nav-text">Berita</span>
                            </a>
                        </li>
                        <li class="nav-item" aria-current="page">
                            <a class="nav-link" id="pills-presensi-tab" data-bs-toggle="pill" data-bs-target="#pills-presensi"
                                type="button" role="tab" aria-controls="pills-presensi" aria-selected="true">
                                <i class='bx bx-bell icon'>
                                    <span class="material-symbols-outlined">
                                        monitoring
                                    </span>
                                </i>
                                <span class="text nav-text">Presensi</span>
                            </a>
                        </li>
                        <?php if(!isset($_SESSION["id"])):?>
                        <li class="nav-item" aria-current="page">
                            <a class="nav-link" id="pills-slip-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-slip" type="button" role="tab"
                                aria-controls="pills-slip" aria-selected="true">
                                <i class='bx bx-pie-chart-alt icon'>
                                    <span class="material-symbols-outlined">
                                        receipt_long
                                    </span>
                                </i>
                                <span class="text nav-text">Slip Gaji</span>
                            </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
                <?php if(isset($_SESSION["id"])):?>
                    <div class="bottom-content mb-4">
                        <ul role="tablist" class="flex-row ps-0">
                            <li class="text-center">
                                <a href="tambah_user.php" type="button" role="button" class="btn btn-danger p-0 red" name="addUser">
                                    <i class='bx bx-pie-chart-alt icon'>
                                        <span class="material-symbols-outlined">
                                            person_add
                                        </span>
                                    </i>
                                    <span class="text nav-text">Tambah User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </nav>

        <section class="home">
            <div class="tab-content mb-2" id="pills-tabContent">
                <!-- Dashboard -->
                <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab"
                    tabindex="0">
                    <div class="main-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="pe-0 text-center">
                                    <a class="navbar-brand" href="#"><img id="yogyakarta" src="../assets/DIY.png"
                                            alt="diy"></a>
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
                    
                    <div class="pemberitahuan mb-2 m-3">
                        <h1>Dashboard</h1>
                        <?php foreach($pemberitahuan as $row) : ?>
                        <div class="position-relative">
                            <div class="p-3">
                                <div class="card">
                                    <h5 class="card-header"><?= $row["judul"];?></h5>
                                    <div class="card-body">
                                        <p class="card-text"><?= $row["isi"] ?> </p>
                                        <p class="card-text"><small class="text-muted"><?=$row["waktu"]; ?></small></p>
                                        <?php if(isset($_SESSION["id"])):?>
                                        <div class="text-end">
                                            <button class="btn btn-primary pb-0" type="button" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?=$row["id"];?>" name="edit">
                                                <span class="material-symbols-outlined">
                                                    edit
                                                </span>
                                            </button>
                                            <button class="btn btn-danger pb-0" type="button" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete<?=$row["id"];?>" name="delete">
                                                <span class="material-symbols-outlined">
                                                    delete
                                                </span>
                                            </button>
                                            
                                        </div>
                                        <?php endif;?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if(isset($_SESSION["id"])):?>
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <form action="" method="post" class="text-center">
                                    <button class="container text-center" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalAdd" name="addBerita">
                                        <h3 class="tambah mb-0 p-5">TAMBAH PEMBERITAHUAN
                                            <span class="material-symbols-outlined d-block">
                                                add
                                            </span>
                                        </h3>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                    <footer>
                        <div class="footer container-fluid bg-primary text-center text-light p-2 sticky-bottom">
                            Dinas Komunikasi dan Informatika - Daerah Istimewa Yogyakarta
                        </div>
                    </footer>
                </div>

                <!-- Berita -->
                <div class="tab-pane fade m-3" id="pills-berita" role="tabpanel" aria-labelledby="pills-berita-tab"
                    tabindex="0">
                    <h1>Berita</h1>
                    <div class="berita">
                        <?php foreach($berita as $row) : ?>
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4 align-items-stretch d-flex">
                                    <img src="dir/<?=  $row["gambar"];?>" class="img-fluid rounded" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none p1"><h5 class="card-title"><?= $row["judul"];?></h5></a>
                                        <p class="card-text"><?= $row["isi"] ?></p>
                                        <p class="card-text"><small class="text-muted"><?= $row["waktu"] ?></small></p>
                                        <div class="footer text-end end-0 bottom-0 position-absolute m-3">
                                            <?php if(isset($row["edit"])):?>
                                                <p class="card-text"><small class="text-muted">Diedit : <?=$row["edit"]; ?></small></p>
                                            <?php endif;?>
                                            <?php if(isset($_SESSION["id"])):?>
                                            <div class="text-end">
                                                <button class="btn btn-primary pb-0" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditBerita<?=$row["id"];?>" name="editBerita">
                                                    <span class="material-symbols-outlined">
                                                        edit
                                                    </span>
                                                </button>
                                                <button class="btn btn-danger pb-0" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteBerita<?=$row["id"];?>" name="deleteBerita">
                                                    <span class="material-symbols-outlined">
                                                        delete
                                                    </span>
                                                </button>
                                                
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php if(isset($_SESSION["id"])):?>
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <form action="" method="post" class="text-center">
                                    <button class="container text-center" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalAddBerita" name="addBerita">
                                        <h3 class="tambah mb-0 p-5">TAMBAH BERITA
                                            <span class="material-symbols-outlined d-block">
                                                add
                                            </span>
                                        </h3>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php endif;?>
                        
                    </div>
                </div>

                <!-- Presensi -->
                <?php if(isset($_SESSION["id"])):?>
                <div class="tab-pane fade m-3" id="pills-presensi" role="tabpanel" aria-labelledby="pills-presensi-tab"
                    tabindex="0">
                    <h1>Presensi Fingerprint</h1>
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">NIP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">KEHADIRAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>123</td>
                                <td>Joko</td>
                                <td>Hadir</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>456</td>
                                <td>Indro</td>
                                <td>Terlambat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>789</td>
                                <td>Wanto</td>
                                <td>Hadir</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-end"><small class="text-muted">12/07/2022</small></p>
                </div>
                <?php endif;?>
                <?php if(!isset($_SESSION["id"])):?>
                <div class="tab-pane fade m-3" id="pills-presensi" role="tabpanel" aria-labelledby="pills-presensi-tab"
                    tabindex="0">
                    <h1>Presensi Fingerprint</h1>
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">KEHADIRAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>12-06-2022</td>
                                <td>Hadir</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>13-06-2022</td>
                                <td>Terlambat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>14-06-2022</td>
                                <td>Hadir</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endif;?>

                <!-- Gaji -->
                <div class="tab-pane fade m-3" id="pills-slip" role="tabpanel" aria-labelledby="pills-slip-tab"
                    tabindex="0">
                    <h1>Slip Gaji</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Slip Gaji 13</h5>
                                    <p class="card-text">Rincian gaji klik tombol dibawah.</p>
                                    <a href="../php/download.php?file=slip.png" class="btn btn-primary" name="file">Download</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Slip Gaji 14</h5>
                                    <p class="card-text">Rincian gaji klik tombol dibawah.</p>
                                    <a href="download.php?file=slip.png" class="btn btn-primary" name="file">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Edit Pemberitahuan -->
            <?php foreach($pemberitahuan as $row) :?>
                <div class="modal fade" id="modalEdit<?=$row["id"];?>" tabindex="-1" aria-labelledby="modalEditLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="modalEditLabel">Edit Pemberitahuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="container">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$row["id"];?>">
                                    <label for="judul" class="form-label">Judul</label>
                                    <div class="form-floating mb-2">
                                        <input class="form-control" placeholder="Leave a title here"
                                            id="floatingTextarea1" name="judul" value="<?=$row["judul"];?>" required>
                                        <label for="floatingTextarea1">Inti</label>
                                    </div>

                                    <label for="kabar" class="form-label">Isi</label>
                                    <div class="form-floating mb-2">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px" name="isi" required><?=$row["isi"];?></textarea>
                                        <label for="floatingTextarea2">Keterangan</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            
            <!-- Hapus Pemberitahuan -->
            <?php foreach($pemberitahuan as $row) :?>
                <div class="modal fade" id="modalDelete<?=$row["id"];?>" tabindex="-1" aria-labelledby="modalDeleteLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-light" id="modalDeleteLabel">Hapus Pemberitahuan</h5>
                            </div>
                            <div class="container p-0">
                                <form action="" method="post">
                                    <p class="p-3 mt-3 text-center">Apakah anda ingin menghapus pemberitahuan ini?</p>
                                    <input type="hidden" name="id" value="<?=$row["id"];?>">
                                    
                                    <div class="modal-footer border-danger border-2">
                                        <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            
            <!-- Tambah Pemberitahuan -->
            <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-light" id="modalAddLabel">Pemberitahuan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="container">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" >
                                <label for="judul" class="form-label">Judul</label>
                                <div class="form-floating mb-2">
                                    <input class="form-control" placeholder="Leave a title here"
                                        id="floatingTextareaTambah1" name="judul" required>
                                    <label for="floatingTextareaTambah1">Inti</label>
                                </div>

                                <label for="kabar" class="form-label">Isi</label>
                                <div class="form-floating mb-2">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextareaTambah2" style="height: 100px" name="isi" required></textarea>
                                    <label for="floatingTextareaTambah2">Keterangan</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="add">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Edit Berita -->
            <?php foreach($berita as $row) :?>
                <div class="modal fade" id="modalEditBerita<?=$row["id"];?>" tabindex="-1" aria-labelledby="modalEditLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="modalEditLabel">Edit Berita</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="container">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$row["id"];?>">
                                    <input type="hidden" name="gambarLama" value="<?=$row["gambar"];?>">
                                    <label for="judul" class="form-label">Judul</label>
                                    <div class="form-floating mb-2">
                                        <input class="form-control" placeholder="Leave a title here"
                                            id="floatingTextarea1" name="judul" value="<?=$row["judul"];?>" required>
                                        <label for="floatingTextarea1">Inti</label>
                                    </div>

                                    <label for="kabar" class="form-label">Isi</label>
                                    <div class="form-floating mb-2">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px" name="isi" required><?=$row["isi"];?></textarea>
                                        <label for="floatingTextarea2">Keterangan</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <img src="dir/<?= $row['gambar'];?>" width="50px" class="rounded mx-auto d-block" alt="">
                                        <label class="input-group-text" for="file"><?= $row["gambar"];?></label>
                                        <input type="file" class="form-control" id="file" name="gambar">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="editBerita">Edit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <!-- Hapus Berita -->
            <?php foreach($berita as $row) :?>
                <div class="modal fade" id="modalDeleteBerita<?=$row["id"];?>" tabindex="-1" aria-labelledby="modalDeleteLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-light" id="modalDeleteLabel">Hapus Berita</h5>
                            </div>
                            <div class="container p-0">
                                <form action="" method="post">
                                    <p class="p-3 mt-3 text-center">Apakah anda ingin menghapus berita ini?</p>
                                    <input type="hidden" name="id" value="<?=$row["id"];?>">
                                    
                                    <div class="modal-footer border-danger border-2">
                                        <button type="submit" class="btn btn-danger" name="deleteBerita">Hapus</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <!-- Tambah Berita -->
            <div class="modal fade" id="modalAddBerita" tabindex="-1" aria-labelledby="modalAddLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-light" id="modalAddLabel">Berita</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="container">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" >
                                <label for="judul" class="form-label">Judul</label>
                                <div class="form-floating mb-2">
                                    <input class="form-control" placeholder="Leave a title here"
                                        id="floatingTextareaTambah1" name="judul" required>
                                    <label for="floatingTextareaTambah1">Inti</label>
                                </div>

                                <label for="kabar" class="form-label">Isi</label>
                                <div class="form-floating mb-2">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextareaTambah2" style="height: 100px" name="isi" required></textarea>
                                    <label for="floatingTextareaTambah2">Keterangan</label>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="file">Upload</label>
                                    <input type="file" class="form-control" id="file" name="gambar" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="addBerita">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            const body = document.querySelector('body'),
                sidebar = body.querySelector('nav'),
                toggle = body.querySelector(".toggle"),
                searchBtn = body.querySelector(".search-box"),
                modeSwitch = body.querySelector(".toggle-switch"),
                modeText = body.querySelector(".mode-text");

            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            })

            searchBtn.addEventListener("click", () => {
                sidebar.classList.remove("close");
            })
            
        </script>
    </main>
    <!-- Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>