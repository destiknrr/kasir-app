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

<!-- Modal Bayar -->
<div class="modal fade" id="pembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Controller.php" method="post">
          <div class="row">
            <div class="col-12 text-center">
              <h2>Total Pembayaran</h2><br>
              <hr>
              <h3><div id="total">Rp. 0</div></h3>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-3">
              <label for="merk">Bayar</label>
            </div>
            <div class="col-9">
              <input type="number" class="form-control rounded-pill" name="bayar" id="bayar" required>
            </div>
            <div class="col-12 text-center mt-2">
              <!-- Hints -->
              <div id="hints" class="d-flex justify-content-center flex-wrap">
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="50000">Rp. 50.000</button>
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="100000">Rp. 100.000</button>
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="200000">Rp. 200.000</button>
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="500000">Rp. 500.000</button>
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="1000000">Rp. 1.000.000</button>
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="2000000">Rp. 2.000.000</button>
                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="5000000">Rp. 5.000.000</button>
              </div>
              <!-- End hints -->
            </div>
            <div class="col-12 text-center mt-2">
              <hr>
              <h3>Kembalian</h3><br>
              <h3 id="kembalian">Rp. 0</h3>
            </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
        <button class="btn btn-primary rounded-pill" type="submit">Bayar Sekarang</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End modal -->
