<?php  
session_start();
include_once ('../../connect/base_url.php');
include_once ('../../connect/conn.php');

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
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

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

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?php base_url('app/doz-admin/assets/vendor/js/helpers.js') ?>"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php base_url('app/doz-admin/assets/js/config.js') ?>"></script>
  </head>

  <body>

<div class="container-xxl d-flex align-items-center justify-content-center" style="height: 100vh;">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card px-sm-6 px-0 mx-auto" style="width: 500px;">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
           
          </div>
          <!-- /Logo -->
          <h4 class="mb-1">Welcome to Dozkart! 👋</h4>
          <p class="mb-6">Please sign-in to your Dashboard</p>
          <?php if(isset($_SESSION['alert'])){ ?>
          <div class="alert alert-danger">
            <?php echo $_SESSION['alert']['message'];
                  unset($_SESSION['alert']);
            ?>
          </div>
          <?php } ?>
          <form id="formAuthentication" class="mb-6 fv-plugins-bootstrap5 fv-plugins-framework" action="<?php base_url('admin-doz/login-process') ?>" method="Post" novalidate="novalidate">
            <div class="mb-6 fv-plugins-icon-container">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>
            <div class="mb-6 form-password-toggle fv-plugins-icon-container">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge has-validation">
                <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" aria-describedby="password" required>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <div class="mb-6">
              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
         </form>

        

        

          
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?php base_url('app/doz-admin/assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?php base_url('app/doz-admin/assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?php base_url('app/doz-admin/assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?php base_url('app/doz-admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?php base_url('app/doz-admin/assets/vendor/js/menu.js') ?>"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php base_url('app/doz-admin/assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?php base_url('app/doz-admin/assets/js/main.js') ?>"></script>

    <!-- Page JS -->
    <script src="<?php base_url('app/doz-admin/assets/js/dashboards-analytics.js') ?>"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>



