<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ilost";

// Koneksi dan memilih database di server
	
$conn = mysqli_connect($server,$username,$password,$database);

date_default_timezone_set('Asia/Jakarta');
$datetime = date('Y-m-d H:i:s');

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc(($result))) {
        $rows[] = $row;
    }
    return $rows;
}

// daftar
function registrasi($data) {
    global $conn;

    $email = strtolower(stripslashes ($data["email"]));
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelamin = $_POST['kelamin'];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('akun sudah terdaftar')
                </script>";
        return false;
    }

    // cek konfirmasi nama dan email
    if( empty($nama) || empty($email)){
        echo "<script>
                alert('Nama atau Email tidak boleh kosong');
                </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
                alert('Kata sandi tidak sesuai');
                </script>";
        return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('$email', NULL,'$nama','$kelamin','$password','default-avatar.png',NULL)");

    return mysqli_affected_rows($conn);
}

// ubah profil akun
function ubahprofil($data, $imageName){
    global $conn;
    
    $id = $data["id"];
    $username = $data["username"];
    $nama = htmlspecialchars($data["nama"]);
    $email = $data["email"];
    $kontak = $data["kontak"];

    // query insert data
    $query = "UPDATE user SET email = '$email', username = '$username', nama = '$nama', kontak = '$kontak', gambar = '$imageName' WHERE email = '$id'";
    mysqli_query($conn, $query);
    return $_SESSION["user"] = "$email";
}

// tambah laporan oleh user
function tambahLaporan($data, $imageName) {
    global $conn;
    global $datetime;
    // ambil data dari tiap elemen dalam form
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama_barang"]);
    $kategori = $data["kategori_barang"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tanggal_ditemukan = $data["tanggal_ditemukan"];
    $lokasi = htmlspecialchars($data["lokasi_ditemukan"]);
    $kategori_laporan = $data["kategori_laporan"];
    // query insert data
    $query = "INSERT INTO laporan VALUES (null,'$id', '$kategori_laporan', '$nama', '$deskripsi', '$kategori', '$tanggal_ditemukan', '$lokasi', '$imageName', '$datetime')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
} 

// hapus laporan user
function hapusLaporan($data) {
    global $conn;
    $query = "DELETE FROM laporan WHERE id = '$data'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// ubah laporan user
function ubahLaporan($data, $imageName) {
    global $conn;
    global $datetime;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama_barang"]);
    $kategori = $data["kategori_barang"];
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $tanggal_ditemukan = $data["tanggal_ditemukan"];
    $lokasi = htmlspecialchars($data["lokasi_ditemukan"]);
    $kategori_laporan = $data["kategori_laporan"];
    // query insert data
    $query = "UPDATE laporan SET kategori_laporan = '$kategori_laporan', nama_barang = '$nama', kategori_barang = '$kategori', deskripsi = '$deskripsi',  tanggal_ditemukan = '$tanggal_ditemukan', lokasi = '$lokasi', gambar_barang = '$imageName', waktu_dibuat = '$datetime' WHERE id = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
} 


?>