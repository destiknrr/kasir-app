<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kasir App</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/demo.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial   header -->
      <?php include "header.php";?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial sidebar -->
        <?php include "sidebar.php";?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title">
                  <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-multiple"></i>
                  </span> Transaksi Baru
                </h3>
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="card rounded-5">
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="card-title"> Transaksi</h4>
                    <hr class="text-dark">
                  </div>
                  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="form-transaksi"> 
                  <input type="hidden" name="detail_transaksi" id="detail_transaksi">
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="tanggal">Tanggal </label>
                        </div>
                        <div class="col-8">
                            <input type="date" class="form-control rounded-5" value="<?= date('Y-m-d'); ?>" name="tanggal_transaksi" readonly>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="nama_pelanggan">Pilih Pelanggan :</label>
                        </div>
                        <div class="col-8 mt-4">
                            <select class="form-select rounded-5" name="id_pelanggan">
                                <?php
                                $data_pelanggan = getDataPelanggan();
                                foreach ($data_pelanggan as $fetch_data) {
                                ?>
                                <option value="<?= htmlspecialchars($fetch_data['id_pelanggan']); ?>"><?= htmlspecialchars($fetch_data['nama_pelanggan']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-12 text-center mt-4">
                            <a href="#" class="btn btn-outline-info rounded-5" data-bs-toggle="modal" data-bs-target="#tambahkan-barang"><i class="mdi mdi-qrcode-scan"></i> Tambah barang</a>
                            
                            <!-- Modal Tambah Data Barang -->
                            <div class="modal fade" id="tambahkan-barang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <select class="form-select rounded-5" id="select-barang" data-placeholder="Choose one thing">
                                                <?php 
                                                $barang = getDataBarang();
                                                foreach ($barang as $key) {
                                                ?>
                                                <option value="<?= htmlspecialchars($key['id_barang']); ?>" data-harga="<?= htmlspecialchars($key['harga_jual']); ?>"><?= "#" . htmlspecialchars($key['id_barang']) . " - " . htmlspecialchars($key['nama_barang']) . " - Rp " . htmlspecialchars($key['harga_jual']); ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="number" id="qty-barang" placeholder="Jumlah Barang" class="form-control mt-3 rounded-5">
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Selesai</button>
                                            <button class="btn btn-primary rounded-pill" id="btn-tambahkan-barang" type="button"><i class="mdi mdi-plus"></i> Tambahkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End modal -->
                        </div>
                        
                        <div class="col-12 mt-4">
                            <div class="table-responsive">
                                <table class="table" id="table-barang">
                                    <thead>    
                                        <tr>
                                            <th>#ID</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>QTY</th>
                                            <th>Sub total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Barang akan ditambahkan di sini -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">Total</th>
                                            <th id="total-harga">Rp 0</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <label for="keterangan">Keterangan :</label>
                            <textarea class="form-control rounded-5" name="keterangan" rows="3"></textarea>
                        </div>

                        <input type="hidden" name="total_pembelian" id="total_pembelian">
                        <input type="hidden" name="detail_transaksi" id="detail_transaksi">

                        <div class="col-12 text-center mt-4">
                            <!-- Modal Bayar -->
                    <div class="modal fade" id="pembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2>Total Pembayaran</h2><br>
                                            <hr>
                                            <h3><div id="total">Rp 0</div></h3>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <label for="merk">Bayar</label>
                                        </div>
                                        <div class="col-9">
                                            <!-- Hapus required di sini -->
                                            <input type="number" class="form-control rounded-pill" name="bayar" id="bayar">
                                        </div>
                                        <div class="col-12 text-center mt-2">
                                            <!-- Hints -->
                                            <div id="hints" class="d-flex justify-content-center flex-wrap">
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="50000">Rp 50.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="100000">Rp 100.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="200000">Rp 200.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="500000">Rp 500.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="1000000">Rp 1.000.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="2000000">Rp 2.000.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="5000000">Rp 5.000.000</button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm m-1 hint-btn" data-value="10000000">Rp 10.000.000</button>
                                            </div>
                                            <!-- End hints -->
                                        </div>
                                        <div class="col-12 text-center mt-2">
                                            <hr>
                                            <h3>Kembalian</h3><br>
                                            <h3 id="kembalian">Rp 0</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batalkan</button>
                                    <button type="submit" name="tambah-transaksi" class="btn btn-primary rounded-pill" id="btn-bayar-sekarang" type="button">Bayar Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End modal -->
                                <a data-bs-toggle="modal" data-bs-target="#pembayaran" class="btn btn-outline-success rounded-5"><i class="mdi mdi-cash"></i> Bayar Pembelian</a>
                            </div>
                        </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let totalHarga = 0;

        document.getElementById('btn-tambahkan-barang').addEventListener('click', function() {
            let selectBarang = document.getElementById('select-barang');
            let selectedOption = selectBarang.options[selectBarang.selectedIndex];
            let idBarang = selectedOption.value;
            let namaBarang = selectedOption.text.split(' - ')[1];
            let hargaBarang = parseInt(selectedOption.getAttribute('data-harga'));
            let qtyBarang = parseInt(document.getElementById('qty-barang').value);
            let subTotal = hargaBarang * qtyBarang;
            let totalView = document.getElementById('total');

            // Tambahkan barang ke tabel
            let tableBody = document.getElementById('table-barang').getElementsByTagName('tbody')[0];
            let newRow = tableBody.insertRow();
            newRow.innerHTML = `<tr>
                                  <td>${idBarang}</td>
                                  <td>${namaBarang}</td>
                                  <td>Rp ${hargaBarang}</td>
                                  <td>${qtyBarang}</td>
                                  <td>Rp ${subTotal}</td>
                                </tr>`;

            // Update total harga
            totalHarga += subTotal;
            document.getElementById('total-harga').textContent = 'Rp ' + totalHarga;
            totalView.innerText = "Rp. " + totalHarga;

            // Reset input pada modal
            selectBarang.selectedIndex = 0;
            document.getElementById('qty-barang').value = '';

            // Perbarui input tersembunyi detail_transaksi
            updateDetailTransaksi();

            // Tutup modal
            let modal = bootstrap.Modal.getInstance(document.getElementById('tambahkan-barang'));
        });
    });

    // Fungsi untuk memperbarui input tersembunyi detail_transaksi
    function updateDetailTransaksi() {
        var tableRows = document.querySelectorAll('#table-barang tbody tr');
        var detailTransaksi = [];

        tableRows.forEach(function(row) {
            var idBarang = row.cells[0].innerText;
            var qty = row.cells[3].innerText;

            detailTransaksi.push({
                id_barang: idBarang,
                qty: qty
            });
        });

        var detailTransaksiJSON = JSON.stringify(detailTransaksi);

        let dtl_transaksi = document.getElementById('detail_transaksi');
        dtl_transaksi.value = detailTransaksiJSON;
        console.log(detailTransaksiJSON);
        console.log(dtl_transaksi);
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const totalView = document.getElementById('total');
        const bayarInput = document.getElementById('bayar');
        const kembalianView = document.getElementById('kembalian');
        const hintButtons = document.querySelectorAll('.hint-btn');

        // Function to format numbers as currency
        function formatRupiah(angka) {
            return angka.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });
        }

        // Event listener for hint buttons
        hintButtons.forEach(button => {
            button.addEventListener('click', () => {
                bayarInput.value = button.getAttribute('data-value');
                calculateKembalian();
            });
        });

        // Function to calculate change
        function calculateKembalian() {
            let bayar = parseInt(bayarInput.value) || 0;
            let total = parseInt(totalView.innerText.split('Rp. ')[1].replace(/,/g, '')) || 0;
            let kembalian = bayar - total;
            kembalianView.innerText = formatRupiah(kembalian);
        }

        // Event listener for keyup on bayar input
        bayarInput.addEventListener('keyup', calculateKembalian);
    });

    // Event listener untuk submit form
    document.getElementById('form-transaksi').addEventListener('submit', function() {
        // Memperbarui input tersembunyi detail_transaksi sebelum mengirimkan form
        updateDetailTransaksi();
    });
</script>


    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <!-- <script src="../assets/js/misc.js"></script> -->
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <script src="../assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="../assets/js/dashboard.js"></script> -->
    <!-- End custom js for this page -->
  </body>
</html>