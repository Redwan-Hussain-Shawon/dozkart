<?php include_once('../connect/base_url.php');

if(isset($_GET['id'])){
    define('MYSITE', true);
    include_once('../include/helper.php');
    // protected_area();
    if(!is_logged_in()){
        header('location:'.base_url1('login'));
        $_SESSION['redrict_url']='checkout/prestige-500-watts-orion-mixer-grinder-with-3-stainless-steel-jars-2-years-warranty-red-white-694';
    }
    include_once('../connect/conn.php');

    $carts = json_decode($_COOKIE['cart']);
    $slug_id = mysqli_real_escape_string($conn,trim($_GET['id']));
  
    $productColor;
    $productSize;
    $product_price;
    $quantity;
    $productColorId;
    $shipping_charge;
    foreach($carts as $cart){
        if($slug_id  == $cart->product_slug){
            $productColor = $cart->productColor;
            $productSize = $cart->productSize;
            $product_price = $cart->product_price;
            $quantity = $cart->quantity;
            $productColorId = $cart->productColorId;
            $shipping_charge = $cart->shipping_charge;
    
            $sql = "SELECT p.*, pi.image_url,pc.payment_advance
            FROM products p 
            JOIN product_image pi ON p.product_slug = pi.product_slug 
            JOIN product_category pc ON p.product_category=pc.category_slug
            WHERE p.product_slug='$slug_id'";
            $mainData = $conn->query($sql)->fetch_assoc();
   

?>
 <?php include_once('../include/header.php') ?>
 <?php include_once('../include/header_main.php');?>

        <section class='my-5 px-2'>
            <div class="container">
            <form action="<?php base_url('payment') ?>" method="post" id="checkoutForm" class="row gy-5">
                <div class="col-lg-8">
                    <div class='shadow rounded-1 p-3 d-flex flex-column gap-4'>
                        <div>
                            <h4 class='h6 fw-bold mb-3'>Delivery Options</h4>
                            <div class='border' style='border-radius: 2px;'>
                                <div class='bg-light py-2 px-3 d-flex justify-content-between'>
                                    <h5 class='h6 fw-medium mb-0'>Delivery Address</h5>
                                    <button class='btn p-0 d-flex gap-1 align-items-center text-primary' data-bs-toggle="modal" data-bs-target="#addressModal">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" class="svg-inline--fa fa-pen-to-square w-4 inline-block text-gray-400 group-hover:text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 16px; height: 16px;">
                                            <path fill="currentColor" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                </div>
                                <div class="mx-3 py-2" id='address-select-show'>
                                    <button class='f-14 bg-primary px-2 text-white  py-1 rounded-1' data-bs-toggle="modal" data-bs-target="#addressModal">Select Delivery Address</button>
                                </div>
                            </div>
                            <div class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addressModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" style='max-width:700px;'>
                                    <div class="modal-content" style='height:fit-content'>
                                        <div class="modal-header d-flex align-items-center gap-3 border-0">
                                            <h2 class="modal-title fs-5">Delivery address</h2>
                                            <a href="<?php base_url('create-address?id=checkout/'.$slug_id) ?>" class='text-primary fw-medium h5 mb-0'>+ Create Address</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    
                                        <div class="modal-body px-md-4 px-1">
                                            <?php
                                            $user_id = getId();
                                            $sql = "SELECT * FROM address WHERE user_id=$user_id";
                                            if ($result = $conn->query($sql)) {
                                                if ($result->num_rows > 0) {
                                            ?>
                                                    <div class=''>
                                                        <input type="hidden" name="productColorId" value="<?= $productColorId ?>">
                                                        <div class="d-flex align-items-center px-2 border-bottom">
                                                            <p style='width: 50%;'>Name/Phone/Email</p>
                                                            <p style='width: 50%;' class='text-center text-md-start'>Address</p>
                                                        </div>
                                                        <div class='d-flex flex-column px-2 mt-2 gap-3'>
                                                            <?php
                                                            while ($data = $result->fetch_assoc()) {
                                                            ?>
                                                                <label class='d-flex align-items-center pointer' id="address-label<?php echo $data['id'] ?>" for='address-check<?php echo $data['id'] ?>'>
                                                                    <input class="form-check-input" type="radio" value="<?php echo $data['id'] ?>" name="address-check" style="margin-right: 10px;" id='address-check<?php echo $data['id'] ?>''>
                                                        <div style=' width: 50%;'><span class='d-block'><?php echo $data['name'] ?></span>
                                                                    <span class='d-block'><?php echo $data['phone'] ?></span>
                                                                    <span class='d-block'><?php echo $data['email'] ?></span>
                                                        </div>
                                                        <p style='width: 50%;'><span class='d-block text-end text-md-start'><?php echo $data['thana_upazilla'] ?></span>
                                                            <span class='d-block text-end text-sm-start'><?php echo $data['address'] ?></span>
                                                            <span class='d-block'></span>
                                                        </p>
                                                        </label>
                                                    <?php
                                                            } ?>
                                                    </div>
                                        </div>
                                    <?php } else { ?>
                                        <h3 class='text-center text-danger p-3 h5'>No address available, please create an address</h3>
                                <?php
                                                }
                                            } ?>
                                    </div>
                                    <div class="modal-footer justify-content-center py-2 border-0">
                                        <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal" onclick="applyAddress()">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class='border mt-3 mt-md-5' style='border-radius: 2px;'>
                            <input type="hidden" name="product_slug" value="<?= $slug_id ?>">
                            <div class='bg-light py-2 px-3'>
                                <h5 class='h6 fw-medium mb-0'>Product </h5>
                            </div>
                            <div class='d-flex gap-3 p-3'>
                               <div>
                               <img src="<?php base_url('assets/upload/'.$mainData['image_url']) ?>" width="80" height="80" alt="">
                               </div>
                                <div class='d-flex flex-column'>
                                    <h3 style="font-size: 19px;" class='mb-1'><?= $mainData['product_title'] ?></h3>
                                    <p class='d-flex align-items-center gap-1 mb-0'><span class='text-black fw-medium'>Properties: </span><?= $productColor !== ''? $productColor:'' ?> | <?= $productSize !== ''? $productSize:'' ?></p>
                                    <p class='d-flex align-items-center gap-1 mb-0'><span class='text-black fw-medium'>Quantity :</span><?= $quantity ?></p>
                    
                                
                                    <h4 class="fw-bold text-primary mt-1" style='font-size: 18px;'>BDT <?= $product_price ?></h4>
                                    <input type="hidden" name="quantity" value="<?= $quantity ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='d-flex justify-content-between p-2 border-bottom gap-2 ' id='main-<?php echo $data['product_id'] ?>'>
                    </div>
                </div>
                <div class="mt-2 mt-md-4">
                    <label for="color" class="form-label text-black fw-semibold">Additional Instructions:</label>
                    <textarea name="instructions" id="" class="form-control border-primary" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                </div>

            </div>
            <div class="col-lg-4">
                    <div class='shadow rounded-1 p-3' style='max-width: 400px;'>
                        <h4 class='h5 fw-semibold mb-3'>Order Summary</h4>
                        <div class='d-flex justify-content-between my-2'>
                            <p style='font-size: 16px;' class='text-paragraph mb-0'>Subtotal (<?= $quantity ?> Items)</p>
                            <span class='h6 fw-semibold'>BDT <?= $product_price * $quantity  ?></span>
                        </div>
                        <div class='d-flex justify-content-between my-2'>
                            <p style='font-size: 16px;' class='text-paragraph mb-0'>Shipping Charge </p>
                            <span class='h6 fw-semibold'>BDT <?= $mainData['shipping_charge'] * $quantity  ?></span>
                        </div>
                        <div class='d-flex justify-content-between my-2'>
                            <p style='font-size: 16px;' class='text-light fw-semibold mb-0'>Total</p>
                            <span class='h6 fw-semibold text-primary'>BDT <?= $product_price * $quantity + $mainData['shipping_charge'] ?></span>
                        </div>
                        <div class='d-flex justify-content-between my-2'>
                        <p style='font-size: 16px;' class='text-light fw-semibold mb-0'>Advance Payment (<?= $mainData['payment_advance'] ?>%)</p>
                        <span class='h6 fw-semibold text-primary'>
        BDT <?= calculateAdvancePayment(($product_price  + $mainData['shipping_charge'])* $quantity,$mainData['payment_advance']) ?>
    </span>
</div>
                        <div class='mb-3'>
                            <label for="" class="mb-2 form-label">Select payment method:</label>
                            <select name="" id="" class='form-select'>
                                <option value="Online Full">Online <?= $mainData['payment_advance'] ?>%</option>
                            </select>
                        </div>
                        <input type="hidden" name="addressid">
                        
                       
                        <div class="d-flex gap-2" required>
                            <input type="checkbox" name="accept_agreement" id="accept_agreement" class="form-check-input text-primary" required>
                            <label for="accept_agreement">I agree to the <a target="_blank" class="text-primary hover:text-title-dark font-medium" href="<?php base_url('terms-conditions') ?>">Terms and Conditions</a>, <a target="_blank" class="text-primary hover:text-title-dark font-medium" href="<?php base_url('privacy-policy') ?>">Privacy Policy</a> &amp; <a target="_blank" class="text-primary hover:text-title-dark font-medium" href="<?php base_url('return-refund-policy') ?>">Refund Policy</a>.</label>
                        </div>
                        <button class='btn btn-primary text-white w-100 py-2 fw-semibold mt-3' type="submit" name="checkout_submit">Checkout</button>
                    </div>
                <!-- </form> -->
            </div>
            </form> 
            </div>
        </section>

<?php
  }
}

}else{
    header('Location:404.php');
}
        include_once('../include/footer.php');
 ?>