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
                <?php
                $sql = "SELECT * FROM orders WHERE user_id = $user_id AND status!=10 ORDER BY id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {  ?>
                    <div class="">
                        <?php while ($data = $result->fetch_assoc()) {
                            $product_id = $data['product_id'];
                            $sql1 = "SELECT id,product_title,product_photo,product_minimum_offer_price FROM product_main WHERE asin ='$product_id'";
                            $result1 = $conn->query($sql1);
                            $main_data = $result1->fetch_assoc();
                        ?>
                            <div class="mt-1 d-flex flex-column">
                                <div class="px-2 border-bottom py-4 d-flex gap-4 ">
                                    <div class="bg-light rounded border" style="width: 100px;height:96px">
                                        <img src="<?php echo $main_data['product_photo'] ?>" alt="" class="w-100 h-100">
                                    </div>
                                    <div class="w-100">
                                        <h3 style="font-size:17px;line-height:28px"><?php echo $main_data['product_title'] ?></h3>
                                        <div class="d-flex align-items-center gap-4 mt-2">
                                            <h4 class="h fw-bold"><?php echo takaConvert($main_data['product_minimum_offer_price']) ?></h4>
                                            <p class="h6 text-paragraph">Quantity: <?php echo $data['product_qunty'] ?></p>
                                        </div>
                                        <p>Status: <span class="badge bg-secondary" style="font-size: 14px;font-weight:500;padding-bottom:7px;background-color:#8d8d8d !important"><?php echo statusCheck($data['status'])  ?></span></p>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <?php } else { ?>
                    <div class='py-5'>
                        <div class='d-flex flex-column flex-md-row justify-content-center align-items-center py-5' style="row-gap: 30px;column-gap:80px">
                            <div class="d-flex justify-content-center">
                                <img src="<?php base_url('assets/img/empty-box.png') ?>" alt="empty image" width="200" height="200">
                            </div>
                            <div class="">
                                <div>
                                    <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Empty</h2>
                                    <h3 class="text-base fw-normal h6 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start">You don't have any order yet.</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</section>


<?php

include_once('../include/footer.php'); ?>