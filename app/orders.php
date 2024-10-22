<?php define('MYSITE', true);
include_once('../include/helper.php');
protected_area();
include_once('../connect/base_url.php');
?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php');
$user_id = getId();

?>
<section class='my-5 px-2'>
    <div class='container'>
        <div class='row'>
            <?php include_once('../include/account-header.php') ?>
            <div class="col-lg-9" style='margin-top: 25px;'>
                <div class='border-bottom pb-1 d-flex align-items-center justify-content-between'>
                    <h4 class='fw-semibold'>Orders</h4>
                </div>
                <div class="order-progress-container">
                    <h2>Order Progress</h2>
        <ul class="order-progress-bar">
          <li class="step completed" >
            <span class="step-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                <path fill="currentColor" d="M10.63 14.1a7 7 0 0 1 9.27-3.47a7 7 0 0 1 3.47 9.27A6.98 6.98 0 0 1 17 24c-2.7 0-5.17-1.56-6.33-4H1v-2c.06-1.14.84-2.07 2.34-2.82S6.72 14.04 9 14c.57 0 1.11.05 1.63.1M9 4c1.12.03 2.06.42 2.81 1.17S12.93 6.86 12.93 8s-.37 2.08-1.12 2.83s-1.69 1.12-2.81 1.12s-2.06-.37-2.81-1.12S5.07 9.14 5.07 8s.37-2.08 1.12-2.83S7.88 4.03 9 4m8 18a5 5 0 0 0 5-5a5 5 0 0 0-5-5a5 5 0 0 0-5 5a5 5 0 0 0 5 5m-1-8h1.5v2.82l2.44 1.41l-.75 1.3L16 17.69z"/>
              </svg>
            </span>
            <span class="step-label">Order Monitoring</span>
          </li>
          
          <li class="step" >
          <span class="step-icon">
         
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M10 3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1.32l3.329.554a2 2 0 0 1 1.67 1.973v3.432l2.06.686a1.25 1.25 0 0 1 .753 1.679l-2.521 5.883l1.156.579a1 1 0 1 1-.894 1.788l-2.659-1.329a2 2 0 0 0-1.788 0l-1.317.659a4 4 0 0 1-3.578 0l-1.317-.659a2 2 0 0 0-1.789 0l-2.658 1.33a1 1 0 1 1-.894-1.79l1.832-.916l-3.102-5.428a1.25 1.25 0 0 1 .69-1.806L5 10.279V6.847a2 2 0 0 1 1.67-1.973L10 4.32zM7.25 17.425a4 4 0 0 1 2.538.351l1.316.659a2 2 0 0 0 1.79 0l1.316-.659a4 4 0 0 1 3.282-.133l2.16-5.038L12 10.055l-7.527 2.508zM17 9.613V6.847l-5-.833l-5 .833v2.766l4.367-1.456a2 2 0 0 1 1.265 0z"/></g></svg>
            </span>
            <span class="step-label">Shipping</span>
          </li>

          <li class="step" id="step-6">
          <span class="step-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 32 32"><path fill="currentColor" d="M0 6v2h19v15h-6.156c-.446-1.719-1.992-3-3.844-3s-3.398 1.281-3.844 3H4v-5H2v7h3.156c.446 1.719 1.992 3 3.844 3s3.398-1.281 3.844-3h8.312c.446 1.719 1.992 3 3.844 3s3.398-1.281 3.844-3H32v-8.156l-.063-.157l-2-6L29.72 10H21V6zm1 4v2h9v-2zm20 2h7.281L30 17.125V23h-1.156c-.446-1.719-1.992-3-3.844-3s-3.398 1.281-3.844 3H21zM2 14v2h6v-2zm7 8c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2m16 0c1.117 0 2 .883 2 2s-.883 2-2 2s-2-.883-2-2s.883-2 2-2"/></svg>
            </span>
            <span class="step-label">Out for Delivery</span>
          </li>
          
          <!-- Delivered step -->
          <li class="step" id="step-7">
          <span class="step-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><circle cx="17" cy="19" r="2"/><circle cx="7" cy="19" r="2"/><path d="M2 9v4.947c0 2.382 0 3.573.732 4.313c.487.492 1.171.657 2.268.712M12.427 5c.913.3 1.63 1.024 1.926 1.947c.147.456.147 1.02.147 2.15c0 .752 0 1.128.098 1.432a2.01 2.01 0 0 0 1.284 1.298c.301.099.673.099 1.418.099H22v2.021c0 2.382 0 3.573-.732 4.313c-.487.492-1.171.657-2.268.712M9 19h6"/><path d="M14.5 7h1.821c1.456 0 2.183 0 2.775.354c.593.353.938.994 1.628 2.276L22 12M7.327 8l1.486-1.174C9.604 6.2 10 5.888 10 5.5M7.327 3l1.486 1.174C9.604 4.8 10 5.112 10 5.5m0 0H2"/></g></svg>
            </span>
            <span class="step-label">Delivered</span>
          </li>
        </ul>
      </div>
            </div>


        </div>
    </div>
</section>


<?php

include_once('../include/footer.php'); ?>