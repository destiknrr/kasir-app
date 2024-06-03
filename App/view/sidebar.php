<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../assets/images/faces-clipart/pic-2.png" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $_SESSION['nama_admin'];?></span>
                  <span class="text-secondary text-small"><?= $_SESSION['username'];?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=home'; ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=data-barang'; ?>">Data Barang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=data-pelanggan'; ?>">Data Pelanggan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-barcode-scan menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=transaksi'; ?>">Transaksi Baru</a>
                    <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=data-transaksi'; ?>">Data Transaksi</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#akun" aria-expanded="false" aria-controls="akun">
                <span class="menu-title">Akun</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
              <div class="collapse" id="akun">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <!-- <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#ubah-akun-admin">Edit Profil</a> -->
                    <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=logout'; ?>">Logout</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>