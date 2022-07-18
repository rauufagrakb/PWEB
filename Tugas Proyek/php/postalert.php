<?php
$pemberitahuan = ambil("SELECT * FROM pemberitahuan ORDER BY id DESC");
$berita = ambil("SELECT * FROM berita ORDER BY id DESC");
//Cek tambah pemberitahuan
if(isset($_POST["edit"])){
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert ('Pemberitahuan Berhasil Diedit');
            </script>
        ";
        header("Refresh:0");
    }else{
        echo "
            <script>
                alert ('Pemberitahuan Gagal Diedit');
            </script>
        ";
        header("Refresh:0");
    }
}

//cek edit berita
if(isset($_POST["editBerita"])){
    if(ubahBerita($_POST) > 0){
        echo "
            <script>
                alert ('Pemberitahuan Berhasil Diedit');
            </script>
        ";
        header("Refresh:0");
    }else{
        echo "
            <script>
                alert ('Pemberitahuan Gagal Diedit');
            </script>
        ";
        header("Refresh:0");
    }
}

//Cek delete pemberitahuan
if(isset($_POST["delete"])){
    if(hapus($_POST) > 0){
        echo "<script>
                alert ('Pemberitahuan Berhasil Dihapus');
            </script>";
        header("Refresh:0");
    }else{
        echo "<script>
                alert ('Pemberitahuan Gagal Dihapus');
            </script>";
        header("Refresh:0");
    }
}

//cek hapus berita
if(isset($_POST["deleteBerita"])){
    if(hapusBerita($_POST) > 0){
        echo "<script>
                alert ('Berita Berhasil Dihapus');
            </script>";
        header("Refresh:0");
    }else{
        echo "<script>
                alert ('Berita Gagal Dihapus');
            </script>";
        header("Refresh:0");
    }
}

//Cek tambah pemberitahuan
if(isset($_POST["add"])){
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert ('Pemberitahuan Berhasil Ditambah');
            </script>
        ";
        header("Refresh:0");
    }else{
        echo "
            <script>
                alert ('Pemberitahuan Gagal Ditambah');
            </script>
        ";
        header("Refresh:0");
    }
}

//Cek tambah pemberitahuan
if(isset($_POST["addBerita"])){
    if(tambahBerita($_POST) > 0){
        echo "
            <script>
                alert ('Berita Berhasil Ditambah');
            </script>
        ";
        header("Refresh:0");
    }else{
        echo "
            <script>
                alert ('Berita Gagal Ditambah');
            </script>
        ";
        header("Refresh:0");
    }
}

//tambah akun
if(isset($_POST["registrasi"])){
    if(registrasi($_POST) > 0){
        echo "
            <script>
                alert ('User baru ditambah');
                window.location.replace('../');
            </script>
        ";
        exit;
    }else{
        echo mysqli_error($conn);
    }
}

//cek login index
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        //cek user
    if(mysqli_num_rows($data) === 1){
            //cek pass
        
        $row = mysqli_fetch_assoc($data);

        if($row["id"]==='1'){
            $_SESSION["id"] = true;
        }

        if(password_verify($password, $row["password"])){
            $_SESSION["login"] = true;
            //$error = false;
            $_SESSION["username"] = $row["username"];
            header("Refresh:0");
            exit();
        }
    }
    echo"
        <script>
            alert('Username atau password salah');
        </script>
    ";
}

//logout
if(isset($_POST["logout"])){
    if(logout()){
        echo"<script>
            alert('Logout Berhasil');
            window.location.replace('index.php');
        </script>";
    }
}
//logout2
if(isset($_POST["logout2"])){
    if(logout()){
        header("Location:../index.php");
        exit();
    }
}

?>