<?php 
include "Function.php";
date_default_timezone_set('Asia/Jakarta');

// POST Method
if(isset($_POST['login-admin'])){
    include "Database.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    LoginAdmin($username, $password);
}
if(isset($_POST['ubah-akun-admin'])){
    include "Database.php";
    $id_admin = mysqli_real_escape_string($conn, $_POST['id_admin']); 
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nama_admin = mysqli_real_escape_string($conn, $_POST['nama_admin']);
    ubahAkunAdmin($id_admin, $old_password, $username, $password, $nama_admin);
} else if(isset($_POST['tambah-data-pelanggan'])){
    include "Database.php";
    $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    tambahPelanggan($nama_pelanggan, $no_hp, $alamat, $email);
} else if (isset($_POST['edit-pelanggan'])) {
    include "Database.php";
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['nama_pelanggan']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    editPelanggan($conn, $id_pelanggan, $nama_pelanggan, $no_hp, $alamat, $email);
} else if(isset($_POST['tambah-data-barang'])){
    include "Database.php";
    $harga_beli = mysqli_real_escape_string($conn, $_POST['harga_beli']);
    $harga_jual = mysqli_real_escape_string($conn, $_POST['harga_jual']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $merk = mysqli_real_escape_string($conn, $_POST['merk']);
    tambahBarang($nama_barang, $merk, $harga_beli, $harga_jual, $stok);
} else if (isset($_POST['edit-barang'])){
    include "Database.php";
    $id_barang = mysqli_real_escape_string($conn, $_POST['id_barang']);
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $merk = mysqli_real_escape_string($conn, $_POST['merk']);
    $harga_beli = mysqli_real_escape_string($conn, $_POST['harga_beli']);
    $harga_jual = mysqli_real_escape_string($conn, $_POST['harga_jual']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    editBarang($conn, $id_barang, $nama_barang, $harga_beli, $harga_jual, $stok, $merk);
} else if (isset($_POST['tambah-transaksi'])) {
    include "Database.php";
    
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal_transaksi']);
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    $total_pembelian = floatval(mysqli_real_escape_string($conn, $_POST['total_pembelian']));
    $bayar = floatval(mysqli_real_escape_string($conn, $_POST['bayar']));
    $kembalian = $bayar - $total_pembelian;
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

    $id_transaksi = tambahTransaksi($tanggal, $id_pelanggan, $total_pembelian, $bayar, $kembalian, $keterangan);
    
    if (isset($_POST['detail_transaksi']) && is_array($_POST['detail_transaksi'])) {
        $detail_transaksi = $_POST['detail_transaksi'];
        
    $detail_transaksi_decoded = json_decode($detail_transaksi[0], true);

    foreach ($detail_transaksi_decoded as $detail) {
        $id_barang = $detail['id_barang'];
        $qty = $detail['qty'];
        tambahDetailTransaksi($id_transaksi, $id_barang, $qty);
    }
       echo "<script>window.location='Controller.php?u=print-nota&id=$id_transaksi';</script>";
    echo $total_pembelian;
    } else {
        echo "Detail transaksi tidak valid.";
    }
} else if(isset($_POST['hapus-pelanggan'])){
    include "Database.php";
    $id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
    hapusPelanggan($id_pelanggan);
} else if(isset($_POST['hapus-barang'])){
    include "Database.php";
    $id_barang = mysqli_real_escape_string($conn, $_POST['id_barang']);
    hapusBarang($id_barang);
} else if(isset($_POST['hapus-transaksi'])){
    include "Database.php";
    $id_transaksi = mysqli_real_escape_string($conn, $_POST['id_transaksi']);
    hapusTransaksi($id_transaksi);
} else if(isset($_POST['hapus-detail-transaksi'])){
    include "Database.php";
    $id_detail_transaksi = mysqli_real_escape_string($conn, $_POST['id_detail_transaksi']);
    hapusDetailTransaksi($id_detail_transaksi);
} else if (isset($_POST['ubah-nama-admin'])) {
    include "Database.php";
    $id_admin = mysqli_real_escape_string($conn, $_POST['id_admin']); 
    $nama_admin = mysqli_real_escape_string($conn, $_POST['nama_admin']);

    ubahNamaAdmin($id_admin, $nama_admin);
}

// GET Method
if(isset($_GET['u'])){
$url = $_GET["u"];
if($url == "login"){
    LoginSessionCheck();
    include "../view/login.php";
} else if($url == "logout"){
    Logout();
} else if($url == "home"){
    SessionCheck();
    include "../view/dashboard.php";
} else if($url == "data-pelanggan"){
    SessionCheck();
    include "../view/data-pelanggan.php";
} else if($url == "data-barang"){
    SessionCheck();
    include "../view/data-barang.php";
} else if($url == "data-transaksi"){
    SessionCheck();
    include "../view/data-transaksi.php";
} else if($url == "del-data-pelanggan"){
    SessionCheck();
    $id = $_GET['id'];    
    hapusPelanggan($id);
} else if($url == "del-data-barang"){
    SessionCheck();
    $id = $_GET['id'];    
    hapusBarang($id);
} else if($url == "del-data-transaksi"){
    SessionCheck();
    $id = $_GET['id'];    
    hapusTransaksi($id);
} else if($url == "edit-pelanggan"){
    SessionCheck();
    include "../view/edit-pelanggan.php";
} else if($url == "edit-barang"){
    SessionCheck();
    include "../view/edit-barang.php";
} else if($url == "edit-transaksi"){
    SessionCheck();
    include "../view/edit-transaksi.php";
} else if($url == "print-nota"){
    SessionCheck();
    $id_transaksi = $_GET['id'];
    cetakNota($id_transaksi);
}
else if($url == "transaksi"){
    SessionCheck();
    include "../view/transaksi.php";
}
}
?>

