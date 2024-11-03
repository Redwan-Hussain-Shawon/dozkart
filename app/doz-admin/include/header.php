<?php  
if (session_status() === PHP_SESSION_NONE) {
  session_start(); // Start the session if it hasn't been started yet
}
include_once ('../../connect/base_url.php');
include_once ('../../connect/conn.php');
include_once ('include/helper.php');
if(!isset($_SESSION['admin_redwan']) || empty($_SESSION['admin_redwan'])){
  redirect('doz-admin');
}
?>

<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dozkart Admin Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php base_url('assets/img/dozkart.svg') ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
      
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/vendor/fonts/boxicons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/css/demo.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/vendor/libs/apex-charts/apex-charts.css') ?>" />

    <!-- Page CSS -->s

    <!-- Helpers -->
    <script src="<?php base_url('app/doz-admin/assets/vendor/js/helpers.js') ?>"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php base_url('app/doz-admin/assets/js/config.js') ?>"></script>
    <link rel="stylesheet" href="<?php base_url('app/doz-admin/assets/css/alert.min.css') ?>">
    <script src="<?php base_url('app/doz-admin/assets/js/alert.min.js') ?>"></script>
  </head>

  <body>

  <script>
    <?php if (isset($_SESSION['alert'])): ?>
        const alertType = "<?php echo $_SESSION['alert']['type']; ?>";
        const alertMessage = "<?php echo $_SESSION['alert']['message']; ?>";

        Swal.fire({
            icon: alertType,
            title: alertMessage,
            showConfirmButton: true
        });

        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>
</script>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="<?php base_url('home') ?>" style='font-size: 30px;' class='fw-bold'>Dozkart</a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
          <li class="menu-item  <?php echo strpos($_SERVER['REQUEST_URI'],'admin-doz/dashboard') !== false?'active':''?>">
      <a href="<?php base_url('admin-doz/dashboard') ?>" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-smile"></i>
        <div class="text-truncate" data-i18n="Calendar">Dashboards</div>
      </a>
    </li> 
    <?php 
    $activePaths = [
      'admin-doz/show-product',
      'admin-doz/product-add',
  ];
    $isActive = false;
    foreach ($activePaths as $path) {
        if (strpos($_SERVER['REQUEST_URI'], $path) !== false) {
            $isActive = true;
            break;
        }
    }
    ?>
    <li class="menu-item <?php echo $isActive ? 'active open' : ''; ?>">
    <a href="javascript:void(0);" class="menu-link menu-toggle d-flex gap-2">
        <i class="menu-icon tf-icons bx bx-cart-alt"></i>
        <div class="text-truncate" data-i18n="Dashboards">Products</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item <?php echo strpos($_SERVER['REQUEST_URI'], 'admin-doz/show-product') !== false ? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin-doz/show-product'); ?>" class="menu-link">
                <div class="text-truncate" data-i18n="Analytics">Product View</div>
            </a>
        </li>
        <li class="menu-item <?php echo strpos($_SERVER['REQUEST_URI'], 'admin-doz/product-add') !== false ? 'active' : ''; ?>">
            <a href="<?php echo base_url('admin-doz/product-add'); ?>" class="menu-link">
                <div class="text-truncate" data-i18n="Analytics">Product Add</div>
            </a>
        </li>
    </ul>
</li>
<li class="menu-item <?php echo strpos($_SERVER['REQUEST_URI'],'admin-doz/product-category') !== false?'active':''?>">
      <a href="<?php echo base_url('admin-doz/product-category'); ?>" class="menu-link">
      <i class='menu-icon bx bx-category'></i>
        <div class="text-truncate" data-i18n="Calendar">Product Category</div>
      </a>
    </li>
            <li class="menu-item <?php echo strpos($_SERVER['REQUEST_URI'],'admin-doz/order') !== false?'active':''?>">
      <a href="<?php base_url('admin-doz/order') ?>" class="menu-link">
      <i class='menu-icon bx bx-cart-download'></i>

        <div class="text-truncate" data-i18n="Calendar">Orders</div>
      </a>
    </li> 

    <li class="menu-item <?php echo strpos($_SERVER['REQUEST_URI'],'admin-doz/slider') !== false?'active':''?>">
      <a href="<?php base_url('admin-doz/slider') ?>" class="menu-link">
      <i class='menu-icon bx bx-slideshow'></i>

        <div class="text-truncate" data-i18n="Calendar">Slider</div>
      </a>
    </li> 
 

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="bx bx-menu bx-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            

              <ul class="navbar-nav flex-row align-items-center ms-auto">
             

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php base_url('assets/img/avatar-place.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?php base_url('assets/img/avatar-place.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1 align-items-center">
                            <h6 class="mb-0">Admin</h6>
                          </div>
                        </div>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php base_url('admin-doz/logout') ?>">
                        <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>