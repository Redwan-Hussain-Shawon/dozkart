<?php 
if(!defined('MYSITE')){
    header("location:../home");
  }

  $user_id = getId();
$sql_header = "SELECT image,image_url FROM user WHERE id=$user_id";
if ($result_header = $conn->query($sql_header)) {
    $data_header = $result_header->fetch_assoc();
?>
<style>
    @media (min-width:992px) {
        nav.navbar{
            border: 0 !important;
        }
    }
</style>
<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg border-1 border-primary border px-2 rounded-1   d-flex flex-lg-column align-items-start">
        <button class="navbar-toggler px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ol class="d-flex align-items-center gap-1 mb-0 list-unstyled" style='height:30px'>
            <li class="">
                <a href="<?php base_url('home') ?>">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="#d1d5db" aria-hidden="true" class="">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </li>
            <li class=""><a href="<?php base_url('dashboard') ?>">Account</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="16" height="16" fill="#d1d5db" aria-hidden="true" class="">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </li>
            <li class=""><?php echo $pagePath ?></li>
        </ol>
        <?php 
     $pagePath =str_replace(' ','-',strtolower($pagePath));
    
?>
        <div class="offcanvas offcanvas-start py-2 mt-md-2  rounded-1" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style='width: 100% !important;background-color:#f8f9fa !important '>
            <div class="offcanvas-header pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-column">
                <div class='d-flex flex-column gap-2 align-items-center mt-3'>
                    <img src="<?php  base_url('assets/img/avatar-place.png') ?>" alt="" width='64px' height='64px' class='rounded-circle'>
                    <div class="d-flex align-items-center mt-2 gap-1">
                        <span class="fw-semibold h6 mb-0 text-black">Balance: </span>
                        <a href="#"><span class="text-primary fw-semibold">0.00</span></a>
                    </div>
                </div>
                <div class='my-4 mx-auto' style='width: 80%;height:1px;background:#dfe5ef'></div>
                <ul class='list-unstyled'>
                    <li><a href="<?php base_url('action-needed') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg <?php echo $pagePath == 'action-needed'?'active-primary-bg':'' ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bullhorn" class="" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                                <path fill="currentColor" d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"></path>
                            </svg>
                            Action Needed
                        </a></li>
                    <li><a href="<?php echo base_url('orders') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg <?php echo $pagePath == 'orders'?'active-primary-bg':'' ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-shopping" class="" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16">
                                <path fill="currentColor" d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H76.1l60.3 316.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H179.9l-9.1-48h317c14.3 0 26.9-9.5 30.8-23.3l54-192C578.3 52.3 563 32 541.8 32H122l-2.4-12.5C117.4 8.2 107.5 0 96 0H24zM176 512c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48zm336-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48z"></path>
                            </svg>

                            </svg>
                            My Orders
                        </a></li>
                    <li><a href="<?php base_url('requests') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg <?php echo $pagePath == 'requests' || $pagePath == 'pending-requests' || $pagePath == 'rejected-requests' || $pagePath == 'expired-requests' || $pagePath == 'create-request' ?'active-primary-bg':'' ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="retweet" class="svg-inline--fa fa-retweet w-4 inline-block group-hover:text-primary text-gray-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16">
                                <path fill="currentColor" d="M272 416c17.7 0 32-14.3 32-32s-14.3-32-32-32H160c-17.7 0-32-14.3-32-32V192h32c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-64-64c-12.5-12.5-32.8-12.5-45.3 0l-64 64c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8l32 0 0 128c0 53 43 96 96 96H272zM304 96c-17.7 0-32 14.3-32 32s14.3 32 32 32l112 0c17.7 0 32 14.3 32 32l0 128H416c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l64 64c12.5 12.5 32.8 12.5 45.3 0l64-64c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8l-32 0V192c0-53-43-96-96-96L304 96z"></path>
                            </svg>
                            My Request
                        </a></li>
                    <li><a href="<?php base_url('notifications') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg <?php echo $pagePath == 'notifications'?'active-primary-bg':'' ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell" class="svg-inline--fa fa-bell w-4 inline-block group-hover:text-primary text-gray-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16">
                                <path fill="currentColor" d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"></path>
                            </svg>
                            Notifications
                        </a></li>
                        <li><a href="<?php base_url('dashboard') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg <?php echo $pagePath == 'dashboard'?'active-primary-bg':'' ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user w-4 inline-block group-hover:text-primary text-gray-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16">
                                <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                            </svg>

                            My Profile
                        </a></li>
                    <li><a href="<?php base_url('address') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg <?php echo $pagePath == 'address' || $pagePath == 'create-address' ?'active-primary-bg':'' ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="16" height="16">
                                <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path>
                            </svg>
                            Address Book
                        </a></li>
                
                    <div class='my-3 mx-auto' style='width: 80%;height:1px;background:#dfe5ef'></div>
                    <li><a href="<?php base_url('logout') ?>" class="text-paragraph px-4 py-2 d-flex align-items-center gap-2 hover-primary-bg hover-primary-bg">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="right-from-bracket" class="svg-inline--fa fa-right-from-bracket w-4 inline-block" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                                <path fill="currentColor" d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"></path>
                            </svg>

                            Log Out
                        </a></li>

                </ul>

            </div>
        </div>

    </nav>
</div>
<?php } ?>