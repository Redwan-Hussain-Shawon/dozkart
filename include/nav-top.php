<header class='sticky-top bg-white border-bottom'>
    <div class='py-1'>
        <div class="container">
            <div class='d-flex align-items-center gap-sm-4 gap-2 flex-nowrap  px-2 justify-content-between justify-content-md-start search-bar-main'>
                <a href="<?php base_url('home') ?>"><img src="<?php base_url('assets/img/dozkart.svg') ?>" alt="" style='width:65px;height:60px' class='logo'></a>
                <div  class='d-sm-flex d-none align-items-center w-100 rounded-1' style='border: 2px solid var(--primary);'>
                    <form method="get" action="<?php base_url('categories') ?>" class='d-flex align-items-center w-100'>
                        <h5 class='mb-0' style='font-size:17px;padding:5px 12px 5px 12px'>Indian</h5>
                        <div style='width: 1px ;height:20px;background:var(--border)'></div>
                        <input type="text" style="font-size: 14px;" placeholder="Search by link, keyword, or category" class="w-100 border-0 outline-none px-3 search-bar" name="search" required>
                        <div class='d-flex align-items-center '>
                            <button class='btn btn-primary rounded-0' type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center w-sm-full gap-sm-0 gap-3  justify-content-end">
               
                <div class="d-sm-none d-flex text-black text-hover-primary" onclick="searchShow()">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.1" d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0-14 0m18 11l-6-6"/></svg>
                </div>
            
                </div>
                <div id='responsive-search' class=' d-sm-none d-flex position-absolute align-items-center  w-100 bg-white  ' style='border: 2px solid var(--primary);top:-200px;padding:4px 4px 4px 6px;left:0;;z-index:-1'>
                    <form method="get" action="<?php base_url('categories') ?>" class='d-flex align-items-center w-100'>
                        <h5 class='mb-0' style='font-size:17px;padding:5px 10px 5px 10px'>Indian</h5>
                        <div style='width: 1px ;height:20px;background:var(--border)'></div>
                        <input type="text" style="font-size: 14px;" placeholder="Search by link, keyword, or category" class="w-100 border-0 outline-none px-3 search-bar" name="search" required>
                        <div class='d-flex align-items-center '>
                            <button class='btn btn-primary rounded-1' type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class='d-flex align-items-center gap-1 gap-sm-3 order-2 order-md-3'>

                <a href="javascript:void(0)" class='position-relative d-none d-lg-block' data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas" aria-controls="cartOffcanvas">
      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 56 56">
        <path fill="var(--paragraph)" d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797" />
    </svg>
   
    <div class='bg-primary position-absolute text-white d-flex align-items-center justify-content-center' style='width: 20px;height:20px;border-radius:50%;top:-8px;right:-10px;font-size:10px;' id='addtoCartCount'>
    <?php if (isset($_COOKIE['cart'])) {
                            $cartData = json_decode($_COOKIE['cart'], true);
                            $cartLength = count($cartData);
                            echo $cartLength;
                        }else{
                            echo 0;
                        }
                        ?>
    </div>
</a>
<?php include_once('../include/cart.php') ?>

                    <?php
                    if (is_logged_in()) {
                        $user_id = getId();
                        $sql = "SELECT * FROM notifications WHERE user_id='$user_id' ";
                        $result = $conn->query($sql);
                        $num_rows_notifications = $result->num_rows;
                    }
                    ?>
                    <a href="<?php base_url('notifications') ?>" class='position-relative  d-none d-lg-block'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
    <path fill="var(--paragraph)" d="M32.51 27.83A14.4 14.4 0 0 1 30 24.9a12.63 12.63 0 0 1-1.35-4.81v-4.94A10.81 10.81 0 0 0 19.21 4.4V3.11a1.33 1.33 0 1 0-2.67 0v1.31a10.81 10.81 0 0 0-9.33 10.73v4.94a12.63 12.63 0 0 1-1.35 4.81a14.4 14.4 0 0 1-2.47 2.93a1 1 0 0 0-.34.75v1.36a1 1 0 0 0 1 1h27.8a1 1 0 0 0 1-1v-1.36a1 1 0 0 0-.34-.75M5.13 28.94a16.17 16.17 0 0 0 2.44-3a14.24 14.24 0 0 0 1.65-5.85v-4.94a8.74 8.74 0 1 1 17.47 0v4.94a14.24 14.24 0 0 0 1.65 5.85a16.17 16.17 0 0 0 2.44 3Z" class="clr-i-outline clr-i-outline-path-1"></path>
    <path fill="var(--paragraph)" d="M18 34.28A2.67 2.67 0 0 0 20.58 32h-5.26A2.67 2.67 0 0 0 18 34.28" class="clr-i-outline clr-i-outline-path-2"></path>
    <path fill="none" d="M0 0h36v36H0z"></path>
</svg>

                        <div class='bg-primary position-absolute text-white d-flex align-items-center justify-content-center' style='width: 20px;height:20px;border-radius:50%;top:-6px;right:-7px;font-size:10px;'>
                            <?php echo isset($num_rows_notifications) ? $num_rows_notifications : '0'; ?>
                        </div>
                    </a>
                    <?php if (!is_logged_in()) { ?>
                        <a href="<?php base_url('login') ?>" class='d-lg-flex d-none align-items-center gap-1 pointer'>
                        <svg fill="var(--paragraph)" xmlns="http://www.w3.org/2000/svg" 
	 width="25px" height="25px" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve">
  <path d="M50,43v2.2c0,2.6-2.2,4.8-4.8,4.8H6.8C4.2,50,2,47.8,2,45.2V43c0-5.8,6.8-9.4,13.2-12.2
	c0.2-0.1,0.4-0.2,0.6-0.3c0.5-0.2,1-0.2,1.5,0.1c2.6,1.7,5.5,2.6,8.6,2.6s6.1-1,8.6-2.6c0.5-0.3,1-0.3,1.5-0.1
	c0.2,0.1,0.4,0.2,0.6,0.3C43.2,33.6,50,37.1,50,43z M26,2c6.6,0,11.9,5.9,11.9,13.2S32.6,28.4,26,28.4s-11.9-5.9-11.9-13.2
	S19.4,2,26,2z"/>
</svg>

                        </a>
                    <?php } else { ?>
                        <div class="dropdown d-none d-lg-block">
                            <a class="btn btn-secondary d-flex align-items-center gap-1 justify-content-between" style="min-width: 173px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php base_url('assets/img/avatar-place.png') ?>" alt="" style='width: 24px;border-radius:50%'>
                                My Account
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                                    <path fill="none" stroke="var(--primary)" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M36 18L24 30L12 18" />
                                </svg></h5>
                            </a>

                            <ul class="dropdown-menu" style='min-width: 220px;'>
                                <li><a class="dropdown-item d-flex gap-3 align-items-center" href="<?php base_url('dashboard') ?>">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user w-4 inline-block group-hover:text-primary text-gray-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16">
                                            <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                                        </svg>
                                        Profile</a></li>
                                <li><a class="dropdown-item d-flex gap-3 align-items-center" href="<?php base_url('orders') ?>"><svg aria-hidden=" true" focusable="false" data-prefix="fas" data-icon="cart-shopping" class="svg-inline--fa fa-cart-shopping w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16">
                                        <path fill="currentColor" d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H76.1l60.3 316.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H179.9l-9.1-48h317c14.3 0 26.9-9.5 30.8-23.3l54-192C578.3 52.3 563 32 541.8 32H122l-2.4-12.5C117.4 8.2 107.5 0 96 0H24zM176 512c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm336-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48z"></path>
                                        </svg>
                                        My Orders
                                    </a></li>
                                <li><a href="<?php base_url('logout') ?>" class="dropdown-item text-center" style='font-size:14px;border-bottom:0px'>Logout</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>