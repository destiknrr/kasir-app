<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo d-flex align-items-center" href="index.html" style="justify-content: flex-start; text-align: left;">
          <img src="../assets/images/logo.jpeg" alt="logo" style="width: 50px; height: 50px; margin: 10px; justify-content: flex-start; text-align: left; border-radius: 50%; ">
          <div class="d-flex flex-column">
            <h5 style="margin: 0; font-size: 1.3rem;">DigitalDream</h5>
            
            <h5 style="margin: 0; font-size: 1.3rem;">Laptop </h5>
          </div>
        </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <h3>Kasir</h3>
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <!-- <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Cari di sini...">
              </div>
            </form> -->
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link " id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../assets/images/faces-clipart/pic-2.png" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?= $_SESSION['nama_admin'];?></p>
                </div>
              </a>
              <!-- <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= $_SERVER['PHP_SELF'] . '?u=logout'; ?>">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div> -->
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?u=logout'; ?>">
                <i class="mdi mdi-power"></i> Signout
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>