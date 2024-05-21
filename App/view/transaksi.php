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

      <!-- partial header -->
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
                  <div class="row mt-3">
                    <div class="col-4">
                      <label for="tanggal">Tanggal </label>
                    </div>
                    <div class="col-8">
                      <input type="date" class="form-control rounded-5" value="<?= date('Y-m-d');?>" name="tanggal_transaksi" readonly>
                    </div>
                    <div class="col-4 mt-4">
                      <label for="nama_pelanggan">Pilih Pelanggan :</label>
                    </div>
                    <div class="col-8 mt-4">
                      <select class="form-select rounded-5" name="id_pelanggan">
                        <?php
                        $data_pelanggan = getDataPelanggan();
                        foreach($data_pelanggan as $fetch_data){
                        ?>
                        <option value="<?= $fetch_data['id_pelanggan'];?>"><?= $fetch_data['nama_pelanggan']; ?></option>
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
                                $barang=getDataBarang();
                                foreach ($barang as $key) {
                                ?>
                                <option value="<?= $key['id_barang'];?>" data-harga="<?= $key['harga_jual'];?>"><?= "#" . $key['id_barang'] . " - " . $key['nama_barang'] . " - Rp " . $key['harga_jual'];?></option>
                                <?php } ?>
                              </select>
                              <input type="number" id="qty-barang" placeholder="Jumlah Barang" class="form-control mt-3 rounded-5" required>
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
                                <?php include "modals.php"; ?>
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
                              <th id="total-harga">Rp. 0</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
          
                    <div class="col-12 text-center mt-4">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#pembayaran" class="btn btn-outline-success rounded-5"><i class="mdi mdi-cash"></i> Bayar Pembelian</a>
                    </div>
          
                  </div>
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
            InputBayar=document.getElementById('bayar');
            kembaliView=document.getElementById('kembalian');
            
            InputBayar.addEventListener('change', () => {
                let kembalian = parseFloat(InputBayar.value); // Pastikan input adalah angka, jika bukan, gunakan 0
                let kembali = kembalian - totalHarga; // Hitung kembalian dengan benar
                kembaliView.innerText = "Rp. " + kembali.toLocaleString('id-ID'); // Format angka dengan format lokal
            });

            // Reset input pada modal
            selectBarang.selectedIndex = 0;
            document.getElementById('qty-barang').value = '';
        
            // Tutup modal
            let modal = bootstrap.Modal.getInstance(document.getElementById('tambahkan-barang'));
            // modal.hide();
          });
        });


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