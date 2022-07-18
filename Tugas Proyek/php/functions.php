<?php
$conn = mysqli_connect("localhost", "root", "", "pweb");
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );

function ambil($data){
    global $conn;
    $result = mysqli_query($conn, $data);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    global $date;
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $waktu = $date->format('l, d-m-Y / H:i:s') ;

    $query = "INSERT INTO pemberitahuan VALUES ('', '$judul', '$isi', '$waktu')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahberita($data){
    global $conn;
    global $date;
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $waktu = $date->format('l, d-m-Y / H:i:s') ;
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $query = "INSERT INTO berita VALUES ('', '$judul', '$isi', '$gambar', '$waktu', '$waktu')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($data){
    global $conn;
    $id = $data["id"];
    mysqli_query($conn, "DELETE FROM pemberitahuan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapusBerita($data){
    global $conn;
    $id = $data["id"];
    mysqli_query($conn, "DELETE FROM berita WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    global $date;
    $id = $data["id"];
    
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $waktu = $date->format('l, d-m-Y / H:i:s') ;
    $query = "UPDATE pemberitahuan SET judul = '$judul', isi = '$isi', waktu = '$waktu' WHERE id = $id";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahBerita($data){
    global $conn;
    global $date;
    $id = $data["id"];
    
    $judul = htmlspecialchars($data["judul"]);
    $isi = htmlspecialchars($data["isi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $waktuEdit = $date->format('l, d-m-Y / H:i:s') ;
    if($_FILES['gambar']['error']===4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE berita SET judul = '$judul', isi = '$isi', gambar = '$gambar', edit = '$waktuEdit' WHERE id = $id";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
                <script>
                    alert ('Pemberitahuan gagal Diedit');
                </script>
            ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'dir/'. $namaFileBaru);

    return $namaFileBaru;
}

function registrasi($data){
    global $conn;
    $nip = mysqli_real_escape_string($conn, $data["nip"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    $resultnip = mysqli_query($conn, "SELECT nip FROM user WHERE nip = '$nip'");

    if(!preg_match("/^[0-9]*$/", $nip) || strlen($nip) !== 3){
        echo "<script>alert('NIP sudah ada atau salah!');</script>";
        return false;
    }
    
    if(mysqli_fetch_assoc($result) || mysqli_fetch_assoc($resultnip)){
        echo"<script>
                alert('Data sudah tersedia')
            </script>";
        return false;
    }
    
    if($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO user VALUES('', '$nip', '$username', '$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function logout(){
    $_SESSION = [];
    session_unset();
    session_destroy();
    return true;
}
?>

