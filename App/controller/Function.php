<?php
// File ini berisi fungsi-fungsi dasar
// Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ==============================================
//              Kontrol Database
// ============================================== 
// Fungsi Login
// ==============================================
// Fungsi Login Admin
function LoginAdmin($username, $password) {
    include "Database.php";
    session_start();
    $key = rand();
    $enc_password = md5($password);
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$enc_password'");
    $fetchdata = mysqli_fetch_array($query);
    if (!empty($fetchdata['username'])) {
        $_SESSION['id_admin'] = $fetchdata['id_admin'];
        $_SESSION['username'] = $fetchdata['username'];
        $_SESSION['nama_admin'] = $fetchdata['nama_admin'];
        $_SESSION['key'] = $key;
        $_SESSION['role'] = 'admin';
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=login-admin&s=failed';</script>";
        exit;
    }
}

// Fungsi Periksa Session Login 
function LoginSessionCheck(){
    session_start();
    if(!empty($_SESSION['username']) AND !empty($_SESSION['nama_admin']) AND !empty($_SESSION['key'])){
        echo "<script>alert('Anda sudah login');window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    }
}

// Fungsi Periksa Session
function SessionCheck(){
    session_start();
    if(empty($_SESSION['username']) AND empty($_SESSION['nama_admin']) AND empty($_SESSION['key'])){
        echo "<script>alert('Session telah habis. silahkan login kembali.');
        window.location='$_SERVER[PHP_SELF]?u=login'</script>";
        exit;
    }
}

// Logout
function Logout(){
    session_start();
    session_destroy();
    echo "<script>alert('Logout berhasil');window.location='$_SERVER[PHP_SELF]?u=login';</script>";
    exit;
}


// =========================
// Barang Function
// =========================

// Fungsi Tambah Barang
function tambahBarang($nama_barang, $merk, $harga_beli, $harga_jual, $stok){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO barang (nama_barang, merk, harga_beli, harga_jual, stok) VALUES ('$nama_barang', '$merk', '$harga_beli', '$harga_jual', '$stok')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-barang';</script>";
        exit;
    }
}

// Fungsi Ambil Data Barang
function getDataBarang(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM barang");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($barang = mysqli_fetch_array($result)) {
        $array[] = $barang;
    }
    return $array;
}

// Fungsi Edit Barang
function editBarang($id_barang, $nama_barang, $harga_beli, $harga_jual, $stok, $merk){
    include "Database.php";
    $query = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama_barang', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok', merk='$merk' WHERE id_barang='$id_barang'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-barang';</script>";
        exit;
    }
}

// Fungsi Hapus Barang
function hapusBarang($id_barang){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id_barang'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-barang';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Barang
function countRowsBarang(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM barang");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}
