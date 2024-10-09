<?php 
 if(!defined('MYSITE')){
    header("location:../home");
  }

?>
</head>
<body>
    <div class='loader-main  align-items-center justify-content-center position-fixed w-100 ' style='z-index: 10001;background:#e3e3e3f2;height:100vh;display:flex'>
        <span class="loader"></span>

    </div>

    <div class="toast js align-items-center hide fixed-top justify-content-between bg-white border-0 " style="right: 50% !important;left:50%;top:10px;z-index:1000000;transform:translateX(-50%)" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body text-center mx-auto">
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    <?php if (isset($_SESSION['alert']) && !empty($_SESSION['alert'])) { ?>
        <div class="toast ses <?php echo $_SESSION['alert']['type'] ?> align-items-center show fixed-top justify-content-between bg-white border-0 "  style="right: 50% !important;left:50%;top:10px;z-index:1000000;transform:translateX(-50%)" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex ">
                <div class="toast-body text-center w-100">
                    <?php echo $_SESSION['alert']['message'] ?>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php
    unset($_SESSION['alert']);
} ?>
    <div class="top-bar bg-primary p-2 border-bottom ">
        <div class="container">
            <div class='d-flex align-items-center justify-content-center justify-content-sm-between'>
                <div class='d-none d-sm-block'>
                    <p class='mb-0 text-white'>First Order 50% Discount on Shaping Changes</p>
                </div>
                <div class='d-flex align-items-center gap-4'>
                    <a href="#" style='font-size: 14px;color:var(--white)' class="d-flex align-items-center gap-1 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 12.572L12 20l-7.5-7.428A5 5 0 1 1 12 6.006a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        Wish List
                    </a>
                    <div>
                        <div class='d-flex gap-2 align-items-center pointer' data-bs-toggle="dropdown">
                            <img src="<?php base_url('assets/img/bd.png') ?>" alt="" style="width: 24px;">
                            <h5 style='font-size: 14px;margin-bottom: 0px;' class='d-flex align-items-center;font-size:14px text-white'>BDT <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                                    <path fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M36 18L24 30L12 18" />
                                </svg></h5>
                        </div>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><img src="assets/img/bd.png" style="width: 26px;" alt="">Bangladesh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php include_once('../include/nav-top.php') ?>

    <div class="bottom bg-white position-fixed bottom-0 left w-100 shadow-sm d-block d-lg-none z-3" style='height: 60px;'>
        <div class='px-2 row align-items-center gutters-5' style='height: 100%;'>
            <div class="col">
                <a href="<?php base_url('home') ?>" class='text-primary d-flex flex-column align-items-center <?php echo $pagePath=='Home'?'border-bottom border-primary border-3':''  ?>'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M469.666 216.45L271.078 33.749a34 34 0 0 0-47.062.98L41.373 217.373L32 226.745V496h176V328h96v168h176V225.958ZM248.038 56.771c.282 0 .108.061-.013.18c-.125-.119-.269-.18.013-.18M448 464H336V328a32 32 0 0 0-32-32h-96a32 32 0 0 0-32 32v136H64V240L248.038 57.356c.013-.012.014-.023.024-.035L448 240Z" />
                    </svg>
                    <span style='font-size: 11px;line-height: 20px;' class='text-paragraph'>Home</span>
                </a>
            </div>
            <div class="col">
                <a href="<?php base_url('categories') ?>" class='text-primary d-flex flex-column align-items-center <?php echo $pagePath=='Categories'?'border-bottom border-primary border-3':''  ?>'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="17" cy="7" r="3" />
                            <circle cx="7" cy="17" r="3" />
                            <path d="M14 14h6v5a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zM4 4h6v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z" />
                        </g>
                    </svg>
                    <span style='font-size: 11px;line-height: 20px;' class='text-paragraph'>Category</span>
                </a>
            </div>
            <div class="col-auto position-relative">
                <a href="<?php base_url('cart') ?>" class='text-primary  d-flex flex-column align-items-center <?php echo $pagePath=='Cart'?'border-bottom border-primary border-3':''  ?>' style='padding-bottom: 10px;' data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                    <div class='rounded-circle bg-primary text-white position-absolute d-flex align-items-center justify-content-center ' style='top: -36px;width:40px;height:40px;border:2px solid #fff;box-shadow:0px -5px 10px rgb(0 0 0 / 15%)'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 0 0-8 0v4M5 9h14l1 12H4z" />
                        </svg>
                    </div>
                    <span style='font-size: 11px;line-height: 20px; transform: translateY(10px);' class='text-paragraph'>Cart </span>
                </a>
            </div>
            <div class="col">
                <a href="<?php base_url('notifications') ?>" class='text-primary d-flex flex-column align-items-center <?php echo $pagePath=='Notifications' ? 'border-bottom border-primary border-3': '' ?>'>
                    <div class='position-relative'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 36 36">
                            <path fill="currentColor" d="M32.51 27.83A14.4 14.4 0 0 1 30 24.9a12.63 12.63 0 0 1-1.35-4.81v-4.94A10.81 10.81 0 0 0 19.21 4.4V3.11a1.33 1.33 0 1 0-2.67 0v1.31a10.81 10.81 0 0 0-9.33 10.73v4.94a12.63 12.63 0 0 1-1.35 4.81a14.4 14.4 0 0 1-2.47 2.93a1 1 0 0 0-.34.75v1.36a1 1 0 0 0 1 1h27.8a1 1 0 0 0 1-1v-1.36a1 1 0 0 0-.34-.75M5.13 28.94a16.17 16.17 0 0 0 2.44-3a14.24 14.24 0 0 0 1.65-5.85v-4.94a8.74 8.74 0 1 1 17.47 0v4.94a14.24 14.24 0 0 0 1.65 5.85a16.17 16.17 0 0 0 2.44 3Z" class="clr-i-outline clr-i-outline-path-1"></path>
                            <path fill="currentColor" d="M18 34.28A2.67 2.67 0 0 0 20.58 32h-5.26A2.67 2.67 0 0 0 18 34.28" class="clr-i-outline clr-i-outline-path-2"></path>
                            <path fill="none" d="M0 0h36v36H0z"></path>
                        </svg>
                        <div class='position-absolute start-100 d-flex align-items-center justify-content-center translate-middle p-2 bg-danger border border-light rounded-circle text-white' style='top:5px;font-size:8px;width:12px;height:12px' >
                        <?php 
                               if(is_logged_in()){
                                echo $num_rows_notifications;
                               }else{
                                echo 0;
                               }
                            ?>
                    </div>
                    </div>

                    <span style='font-size: 11px;line-height: 20px;' class='text-paragraph'>Notification</span>
                </a>
            </div>
            <div class="col">
                <a href="<?php echo is_logged_in() == true ? 'dashboard': 'login' ?>" class='text-primary d-flex flex-column align-items-center <?php echo $pagePath=='Dashboard' || $pagePath=='Login'?'border-bottom border-primary border-3':''  ?>'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                            <path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2M8.5 9.5a3.5 3.5 0 1 1 7 0a3.5 3.5 0 0 1-7 0m9.758 7.484A7.985 7.985 0 0 1 12 20a7.985 7.985 0 0 1-6.258-3.016C7.363 15.821 9.575 15 12 15s4.637.821 6.258 1.984" />
                        </g>
                    </svg>
                    <span style='font-size: 11px;line-height: 20px;' class='text-paragraph'>User</span>
                </a>
            </div>
        </div>
    </div>

    <main>
<?php 

?>