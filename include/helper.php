<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$currancy = 1.65;

if (!defined('MYSITE')) {
    header("location:../home");
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getId(){
    $jwt = $_SESSION['sh_user'];
    try{
        $decoded = JWT::decode($jwt,new Key(JWT_SECRET_KEY,'HS256'));
        return $decoded->id;
    }catch(Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
        exit();
}
}
function allowDomin(){
    if (isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], ALLOWED_DOMIN)===false) {
        header('location:home');
        exit();
    } 
    
   
}
  


function is_logged_in()
{
    if (isset($_SESSION['sh_user']) && !empty($_SESSION['sh_user'])) {
        return true;
    } else {
        return false;
    }
}
function old_value($field)
{
    if (isset($_SESSION['form'][$field]) && !empty($_SESSION['form'][$field])) {
        $value = $_SESSION['form'][$field];
        echo $value;
        unset($_SESSION['form'][$field]);
    } else {
        return '';
    }
}
function formError($field)
{
    if (isset($_SESSION['form']['error'][$field]) && !empty($_SESSION['form']['error'][$field])) {
        unset($_SESSION['form']['error'][$field]);
        return true;
    } else {
        return false;
    }
}




function logout()
{
    if (isset($_SESSION['sh_user']) && !empty($_SESSION['sh_user'])) {
        unset($_SESSION['sh_user']);
    }
    alert('success', 'Logged out successfully.');
    header('Location:login');
    die();
}

function protected_area()
{
    
    if (!isset($_SESSION['sh_user']) && empty($_SESSION['sh_user'])) {
        alert('danger', 'Unauthorized access, Login before you proceed');
        header('Location:login');
        die();
    }
}

function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}

function takaConvert($rupee){
    global $currancy;
    
    $taka = str_replace(["₹", ","], "", $rupee);
    
    $taka = (int) $taka * $currancy;
    $taka = $taka +70;
    $taka = ceil($taka);

    $taka = 'BDT ' . $taka;
    
    return $taka;
}

function takaConvertInto($rupee,$into){
    global $currancy;
    
    // Remove the currency symbol and commas
    $taka = str_replace(["₹", ","], "", $rupee);
    
    $taka = (int) $taka * $currancy;
    $taka = $taka +70;
    $taka = ceil($taka);
    $taka = $taka *$into;
    $taka = 'BDT ' . $taka;
    
    return $taka;
}

function takaConvertF($rupee,$into){
    global $currancy;
    
    // Remove the currency symbol and commas
    $taka = str_replace(["₹", ","], "", $rupee);
    
    $taka = (int) $taka * $currancy;
    $taka = $taka +70;
    $taka = $taka *$into;
    $taka = ceil($taka);
    return $taka;
}
?>
<?php 
  function statusCheck($status){
    if($status == 1){
        echo "Pending";
    }else if($status == 2){
        echo "Not Payment";
    }else if($status == 3){
        echo "Success";
    }else if($status == 4){
        echo "Processing";
    }else if($status == 5){
        echo "Call";
    }else if($status == 6){
        echo "On the Way";
    }else if($status == 7){
        echo "Return";
    }else if($status == 8){
        echo "Delivery Success";
    }else if($status == 9){
        echo "Product Not available";
    }
}
?>
<?php 
function notifications($user_id,$description,$img=null){
    global $conn;
    $sql = "INSERT INTO notifications(user_id,description,img)VALUES($user_id,'$description','$img')";
    if($conn->query($sql)){
        return true;
    }else{
        return false;
    }
}
?>
<?php function productScroll($row, $heading)
{



?>

    <style>
        .product-scroll.swiper {
            width: 100%;
            height: 100%;
        }

        .product-scroll .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class='py-3 py-md-5  px-1 px-md-1'>
        <div class="container">
           <div class="d-flex justify-content-between align-items-center"> 
           <h2 class='h3 mb-3 fw-semibold'><?php echo $heading ?></h2>
            <a href="<?php base_url('categories?search='.$heading) ?>"><button class='btn btn-primary'>Show More</button></a>
           </div>
            <div class="swiper product-scroll mySwiper ">
                <div class="swiper-wrapper">
                    <?php foreach ($row as $data) { ?>
                        <div class="swiper-slide product border overflow-hidden position-relative py-1 px-0 ">
                            <a href="<?php base_url('view-product/' . $data['asin']) ?>">
                                <div class=' rounded-1'>
                                    <div class="img overflow-hidden " style='border-radius:2px 2px 0 0'>
                                        <img src="<?php echo $data['product_photo'] ?>" alt="" class="w-100 object-fit-contain" style='height: 250px;border-radius:2px 2px 0 0' id='<?php echo $data['asin'] ?>product-img'>
                                    </div>
                                    <div class="p-2 text-left">
                                        <div class="d-flex align-items-end mb-1 gap-2">
                                            <!-- <del class="fw-semibold text-paragraph " style='font-size: 14px;'>৳699.00</del> -->
                                            <span class="fw-semibold text-primary " style='font-size: 14px;' id='<?php echo $data['asin'] ?>product-taka'><?php echo takaConvert($data['product_minimum_offer_price']) ?></span>
                                        </div>
                                        <h3 class="mb-1 overflow-hidden " style='font-size: 16px;line-height:24px;display: -webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;' id='<?php echo $data['asin'] ?>product-title'>
                                            <?php echo $data['product_title'] ?>
                                        </h3>
                                        <p class='text-paragraph mb-0 ' style='font-size: 13px;'><?php echo $data['sales_volume'] ?></p>
                                    </div>
                                </div>
                            </a>
                          
                        </div>
                    <?php } ?>
                </div>



            </div>
        </div>
    </div>
    </div>

<?php

} ?>