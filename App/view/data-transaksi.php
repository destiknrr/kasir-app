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
                </span> Data Transaksi
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            
    <div class="row card rounded-5">
            <div class="card-body">
                <h4 class="card-title">Data Transaksi</h4>
                <p class="card-description">
                    Berikut adalah data Transaksi. 
                    <br><br>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambah-data-transaksi" class="btn btn-sm btn-primary rounded-5">
                        <i class="mdi mdi-plus"></i> Tambah Transaksi Baru
                    </a>
                    <a href="#" onclick="location.reload();" class="btn btn-sm btn-info rounded-5">
                        <i class="mdi mdi-refresh"></i> Refresh
                    </a>
                </p>
                <div class="table-responsive">
                    <!-- data Transaksi load -->
                    <table id="demo-table">
                        <thead>
                            <tr>
                                <th><b>#ID Transaksi</b></th>
                                <th>Tanggal</th>
                                <th>Total Pembelian</th>
                                <th>Kembalian</th>
                                <th>Bayar</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dataTransaksi = getDataTransaksi(); // Fungsi untuk mengambil data transaksi dari database
                            foreach ($dataTransaksi as $transaksi) {
                            ?>
                                <tr>
                                    <td><?php echo $transaksi['id_transaksi']; ?></td>
                                    <td><?php echo $transaksi['tanggal']; ?></td>
                                    <td><?php echo $transaksi['total_pembelian']; ?></td>
                                    <td><?php echo $transaksi['kembalian']; ?></td>
                                    <td><?php echo $transaksi['bayar']; ?></td>
                                    <td><?php echo $transaksi['keterangan']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-Transaksi-<?php echo $transaksi['id_transaksi']; ?>"><i class="mdi mdi-pencil"></i></a>
                                        <a href="Controller.php?u=del-data-transaksi&id=<?php echo $transaksi['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"><i class="mdi mdi-delete"></i></a>

                                        <!-- Modal Edit Transaksi -->
                                        <div class="modal fade" id="edit-Transaksi-<?php echo $transaksi['id_transaksi']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editTransaksiLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTransaksiLabel">Edit Data Transaksi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="Controller.php" method="post">
                                                            <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi']; ?>">
                                                            <div class="mb-3">
                                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                                <input type="date" class="form-control" name="tanggal" value="<?php echo $transaksi['tanggal']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="total_pembelian" class="form-label">Total Pembelian</label>
                                                                <input type="text" class="form-control" name="total_pembelian" value="<?php echo $transaksi['total_pembelian']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kembalian" class="form-label">Kembalian</label>
                                                                <input type="text" class="form-control" name="kembalian" value="<?php echo $transaksi['kembalian']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="bayar" class="form-label">Bayar</label>
                                                                <input type="text" class="form-control" name="bayar" value="<?php echo $transaksi['bayar']; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                                <input type="text" class="form-control" name="keterangan" value="<?php echo $transaksi['keterangan']; ?>" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                                        <button type="submit" class="btn btn-primary" name="edit-transaksi">Simpan</button>
                                                    </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Edit Transaksi -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                            
                </div>

            </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php include "footer.php";?>
                    <?php include "modals.php";?>
                    <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
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
    <script type="module">
            import {DataTable} from "../assets/vendors/simple-datatables/module.js"
            window.dt = new DataTable("#demo-table", {
                perPageSelect: [5, 10, 15, ["All", -1]],
                columns: [
                    {
                        select: 2,
                        sortSequence: ["desc", "asc"]
                    },
                    {
                        select: 3,
                        sortSequence: ["desc"]
                    },
                    {
                        select: 4,
                        cellClass: "green",
                        headerClass: "red"
                    }
                ]
            })
        </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="../assets/js/dashboard.js"></script> -->
    <!-- End custom js for this page -->
  </body>
</html>