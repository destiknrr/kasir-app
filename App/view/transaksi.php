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
                    <h4 class = "card-title"> Transaksi</h4>
                    <div class="row">
                        <div class = "col-4 " >
                            <label for = "tanggal">Tanggal </label>
                        </div>
                            <div class="col-8">
                            <input type="date" class="form-control" value="<?= date('Y-m-d');?>" name="tanggal_transaksi" readonly>

                            </div>
                        <div class="col-4 mt-4">
                            <label for="nama_pelanggan">Pilih Pelanggan :</label>
                        </div>
                        <div class="col-8 mt-4">
                            <select class="form-select" name="id_pelanggan">
                                <?php
                                $data_pelanggan = getDataPelanggan();
                                foreach($data_pelanggan as $fetch_data){
                                ?>
                                <option value="<?= $fetch_data['id_pelanggan'];?>"><?= $fetch_data['nama_pelanggan']; ?></option>
                                <?php } ?>
                                </select>
                        </div>



                        <div class="col-12 mt-4">
                            <div class="table-responsive">
                                    <table class="table">
                                    <thead>    
                                        <tr>
                                        <th>
                                        <b>#ID Barang</b>
                                        </th>
                                        <th>Nama Barang</th>
                                        <th>Merk</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data_barang=getDataBarang();
                                        foreach($data_barang as $fetch_data_barang){
                                            
                                        ?>
                                        <tr>
                                            <td><?= $fetch_data_barang['id_barang'];?></td>
                                            <td><?= $fetch_data_barang['nama_barang'];?></td>
                                            <td><?= $fetch_data_barang['merk'];?></td>
                                            <td><?= "Rp " . number_format($fetch_data_barang['harga_beli']);?></td>
                                            <td><?= "Rp " . number_format($fetch_data_barang['harga_jual']);?></td>
                                            <td><?= $fetch_data_barang['stok'];?></td>
                                            <td>
                                            <a href="" class="btn btn-info btn-sm rounded-pill"><i class="mdi mdi-plus"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
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