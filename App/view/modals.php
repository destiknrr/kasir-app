<!-- Modal Tambah Data Barang -->
<div class="modal fade" id="tambah-data-barang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Controller.php" method="post">
          <div class="row mt-2">
            <div class="col-3">
              <label for="nama_barang">Nama Barang</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_barang" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="harga_beli">Harga Beli</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="harga_beli" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="harga_jual">Harga Jual</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="harga_jual" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="stok">Stok</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="stok" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="merk">Merk</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="merk" required>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="tambah-data-barang" href="#">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End modal -->

<!-- Modal Tambah Data Pelanggan -->
<div class="modal fade" id="tambah-data-pelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Controller.php" method="post">
          <div class="row mt-2">
            <div class="col-3">
              <label for="nama_pelanggan">Nama Pelanggan</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_pelanggan" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="no_hp">No HP</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="no_hp" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="alamat">Alamat</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="alamat" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="email">Email</label>
            </div>
            <div class="col-9">
              <input type="email" class="form-control rounded-pill" name="email" required>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="tambah-data-pelanggan" href="#">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End modal -->

<!-- Modal Ubah Akun Admin -->
<div class="modal fade" id="ubah-akun-admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Akun Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Controller.php" method="post">
          <div class="row mt-2">
            <div class="col-3">
              <label for="old_password">Password Lama</label>
            </div>
            <div class="col-9">
              <input type="password" class="form-control rounded-pill" name="old_password" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="username">Username</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="username" value="<?php echo $_SESSION['username']; ?>" required>
              <input type="hidden" class="form-control rounded-pill" name="id_admin" value="<?php echo $_SESSION['id_admin']; ?>" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="password">Password Baru</label>
            </div>
            <div class="col-9">
              <input type="password" class="form-control rounded-pill" name="password">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="nama_admin">Nama Admin</label>
            </div>
            <div class="col-9">
              <input type="text" class="form-control rounded-pill" name="nama_admin" value="<?php echo $_SESSION['nama_admin']; ?>" required>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit" name="ubah-akun-admin" href="#">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End modal -->
