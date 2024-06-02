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
    $enc_password = md5($password);
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$enc_password'");
    $fetchdata = mysqli_fetch_array($query);
    if (!empty($fetchdata['username'])) {
        $_SESSION['id_admin'] = $fetchdata['id_admin'];
        $_SESSION['username'] = $fetchdata['username'];
        $_SESSION['nama_admin'] = $fetchdata['nama_admin'];
        $_SESSION['role'] = 'admin';
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=home';</script>";
        exit;
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=login&error=1';</script>";
        exit;
    }
}

// Fungsi Ubah Akun Admin
function ubahAkunAdmin($id_admin, $old_password, $username, $password, $nama_admin){
    include "Database.php";
    
    // Verifikasi password lama
    $query = mysqli_query($conn, "SELECT password FROM admin WHERE id_admin='$id_admin'");
    $result = mysqli_fetch_assoc($query);

    if (md5($old_password) == $result['password']) {
        // Tentukan apakah password baru diisi atau tidak
        if (!empty($password)) {
            // Enkripsi password baru menggunakan MD5
            $hashed_password = md5($password);
        } else {
            // Gunakan password lama
            $hashed_password = $result['password'];
        }
        
        // Update data di database
        $query_update = mysqli_query($conn, "UPDATE admin SET username='$username', password='$hashed_password', nama_admin='$nama_admin' WHERE id_admin='$id_admin'");
        
        if (!$query_update) {
            die("Query error: " . mysqli_error($conn));
        } else {
            // Update session data
            $_SESSION['username'] = $username;
            $_SESSION['nama_admin'] = $nama_admin;
            
            echo "<script>window.location='$_SERVER[PHP_SELF]?u=logout';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Password lama salah!');window.location='$_SERVER[PHP_SELF]?u=home';</script>";
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

// edit barang
// Fungsi Edit Barang
function editBarang($id_barang, $nama_barang, $harga_beli, $harga_jual, $stok, $merk) {
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

// Fungsi Tambah Pelanggan
function tambahPelanggan($nama_pelanggan, $no_hp, $alamat, $email){
    include "Database.php";

    // Masukkan data ke database
    $query_insert = mysqli_query($conn, "INSERT INTO pelanggan (nama_pelanggan, no_hp, alamat, email) VALUES ('$nama_pelanggan', '$no_hp', '$alamat', '$email')");
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-pelanggan';</script>";
        exit;
    }
}


// Fungsi Ambil Data Pelanggan
function getDataPelanggan(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM pelanggan");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($pelanggan = mysqli_fetch_array($result)) {
        $array[] = $pelanggan;
    }
    return $array;
}

// Fungsi Edit Pelanggan
function editPelanggan($id_pelanggan, $nama_pelanggan, $no_hp, $alamat, $email){
    include "Database.php";
    $query = mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_hp='$no_hp', alamat='$alamat', email='$email' WHERE id_pelanggan='$id_pelanggan'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-pelanggan';</script>";
        exit;
    }
}

// Fungsi Hapus Pelanggan
function hapusPelanggan($id_pelanggan){
    include "Database.php";
    $query = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-pelanggan';</script>";
        exit;
    }
}

// Fungsi Hitung Jumlah Baris Pelanggan
function countRowsPelanggan(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM pelanggan");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total_rows'];
}

// Fungsi Tambah Transaksi
function tambahTransaksi($tanggal, $id_pelanggan, $total_pembelian, $bayar, $kembalian, $keterangan) {
    include "Database.php";

    $query_insert = mysqli_query($conn, "INSERT INTO transaksi (tanggal, id_pelanggan, total_pembelian, bayar, kembalian, keterangan) VALUES ('$tanggal', '$id_pelanggan', '$total_pembelian', '$bayar', '$kembalian', '$keterangan')");
    
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    } else {
        return mysqli_insert_id($conn);
    }
}

// Fungsi Tambah Detail Transaksi
function tambahDetailTransaksi($id_transaksi, $id_barang, $qty) {
    include "Database.php";

    $query_insert = mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_barang, qty) VALUES ('$id_transaksi', '$id_barang', '$qty')");
    
    if (!$query_insert) {
        die("Query error: " . mysqli_error($conn));
    }
}


// Fungsi Ambil Data Transaksi
function getDataTransaksi(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT * FROM transaksi");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $array = [];
    while ($transaksi = mysqli_fetch_array($result)) {
        $array[] = $transaksi;
    }
    return $array;
}

// Fungsi Edit Transaksi
function editTransaksi($id_transaksi, $tanggal, $total_pembelian, $kembalian, $bayar, $keterangan){
    include "Database.php";
    $query = mysqli_query($conn, "UPDATE transaksi SET tanggal='$tanggal', total_pembelian='$total_pembelian', kembalian='$kembalian', bayar='$bayar', keterangan='$keterangan' WHERE id_transaksi='$id_transaksi'");
    if (!$query) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-transaksi';</script>";
        exit;
    }
}

// Fungsi Hapus Transaksi
function hapusTransaksi($id_transaksi){
    include "Database.php";
    // Hapus detail transaksi terlebih dahulu
    $query_detail = mysqli_query($conn, "DELETE FROM detail_transaksi WHERE id_transaksi='$id_transaksi'");
    if (!$query_detail) {
        die("Query error: " . mysqli_error($conn));
    }

    // Setelah menghapus detail transaksi, hapus transaksi itu sendiri
    $query_transaksi = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
    if (!$query_transaksi) {
        die("Query error: " . mysqli_error($conn));
    } else {
        echo "<script>window.location='$_SERVER[PHP_SELF]?u=data-transaksi';</script>";
        exit;
    }
}


// Fungsi Hitung Omset Penjualan
function hitungOmsetPenjualan(){
    include "Database.php";
    $result = mysqli_query($conn, "SELECT SUM(total_pembelian) AS omset FROM transaksi");
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['omset'];
}

// Fungsi Hitung Pendapatan Bersih
function hitungPendapatanBersih(){
    include "Database.php";
    
    // Menghitung total harga jual dari detail transaksi yang terhubung dengan tabel barang
    $resultTotalHargaJual = mysqli_query($conn, "SELECT SUM(barang.harga_jual * detail_transaksi.qty) AS total_harga_jual FROM detail_transaksi INNER JOIN barang ON detail_transaksi.id_barang = barang.id_barang");
    if (!$resultTotalHargaJual) {
        die("Query error: " . mysqli_error($conn));
    }
    $rowTotalHargaJual = mysqli_fetch_assoc($resultTotalHargaJual);
    $totalHargaJual = $rowTotalHargaJual['total_harga_jual'];

    // Menghitung total harga beli dari detail transaksi yang terhubung dengan tabel barang
    $resultTotalHargaBeli = mysqli_query($conn, "SELECT SUM(barang.harga_beli * detail_transaksi.qty) AS total_harga_beli FROM detail_transaksi INNER JOIN barang ON detail_transaksi.id_barang = barang.id_barang");
    if (!$resultTotalHargaBeli) {
        die("Query error: " . mysqli_error($conn));
    }
    $rowTotalHargaBeli = mysqli_fetch_assoc($resultTotalHargaBeli);
    $totalHargaBeli = $rowTotalHargaBeli['total_harga_beli'];

    // Menghitung pendapatan bersih
    $pendapatanBersih = $totalHargaJual - $totalHargaBeli;
    
    return $pendapatanBersih;
}

// Fungsi untuk mengambil detail transaksi berdasarkan id transaksi
function getDetailTransaksiByTransaksiId($id_transaksi){
    include "Database.php";
    $query = "SELECT detail_transaksi.id_detail_transaksi, detail_transaksi.id_barang, barang.nama_barang, detail_transaksi.qty, barang.harga_jual, (detail_transaksi.qty * barang.harga_jual) AS total FROM detail_transaksi INNER JOIN barang ON detail_transaksi.id_barang = barang.id_barang WHERE detail_transaksi.id_transaksi = $id_transaksi";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $detailTransaksi = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $detailTransaksi[] = $row;
    }
    return $detailTransaksi;
}

// fungsi cetak nota
function cetakNota($id_transaksi) {
    include "Database.php";
    // Query untuk mendapatkan data transaksi
    $query_transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $transaksi = mysqli_fetch_assoc($query_transaksi);

    // Query untuk mendapatkan detail transaksi
    $query_detail = mysqli_query($conn, "SELECT detail_transaksi.*, barang.nama_barang, barang.harga_jual FROM detail_transaksi INNER JOIN barang ON detail_transaksi.id_barang = barang.id_barang WHERE id_transaksi='$id_transaksi'");
    $detailTransaksi = [];
    while ($row = mysqli_fetch_assoc($query_detail)) {
        $detailTransaksi[] = $row;
    }

    // Include view untuk cetak nota
    include "../view/cetaknota.php";
}



