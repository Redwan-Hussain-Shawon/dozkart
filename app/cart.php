<?php define('MYSITE', true);
include_once('../include/helper.php');
protected_area();

include_once('../include/header.php');
include_once('../include/header_main.php');
?>

<section class='mt-3'>
    <div class="container row gy-5">
        <div class="col-12">
            <div class='shadow rounded-1 p-3 d-flex flex-column gap-4'>
                <?php
                $user_id = getId();
                $sql = "SELECT * FROM cart WHERE user_id = $user_id ORDER BY id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($data = $result->fetch_assoc()) {
                        $product_slug = $data['product_slug'];
                        $sql1 = "SELECT 
                        p.*,
                        pi.image_url
                        FROM
                        products p
                        JOIN
                         product_image pi ON p.product_slug = pi.product_slug
                         WHERE p.product_slug='$product_slug'";
                        $result1 = $conn->query($sql1);
                        $data_main = $result1->fetch_assoc();

                ?>
                        <form action="<?php base_url('checkout') ?>" method="post">
                            <div class='d-flex flex-column flex-sm-row justify-content-between p-2 border-bottom gap-2' id='main-<?php echo $data['product_slug'] ?>'>
                                <input type="hidden" name="asin" value="<?php echo $data['product_slug'] ?>">
                                <div class='d-flex gap-3'>
                                    <img src="<?php echo $data_main['image_url'] ?>" width="80" height="80" alt="">
                                    <div class='d-flex flex-column'>
                                        <h3 style="font-size: 17px;line-height:30px" class='mb-3'><?php echo $data_main['product_title'] ?></h3>
                                        <div class="d-flex align-items-center gap-4">
                                            <p class='text-primary h5 mb-0 fw-bold' id="product-prize-show">BDT <?php  echo ($data_main['product_price']+$data_main['shipping_charge'])*$data['qnty'] ?></p>
                                            <input type="hidden" id="product-prize" value="<?php echo $data_main['product_price'],$data['qnty'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class='d-flex flex-column gap-2 justify-content-end mt-3 mt-sm-0 mx-auto mx-md-0' style="max-width:170px">
                                    <div class='border rounded-1 d-flex align-items-center' style="width: 100%;">
                                        <button type="button" class='btn  py-1' onclick="addToCarUpDown('<?php echo $data['product_slug'] ?>',-1)">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus" class="svg-inline--fa fa-minus w-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10">
                                                <path fill="currentColor" d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"></path>
                                            </svg>
                                        </button>
                                        <input id="addtoCartQty<?php echo $data['product_slug'] ?>" value="<?php echo $data['qnty'] ?>" class="border-0 outline-none text-center w-100" name="qunty" readonly>
                                        <button type="button" class='btn py-1' onclick="addToCarUpDown('<?php echo $data['product_slug'] ?>',1)">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus w-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10">
                                                <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class='btn-outline-primary btn py-1 rounded-1 d-flex align-items-center justify-content-center gap-1 pointer' style='' onclick="addToCartRemove('<?php echo $data['product_slug'] ?>')">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" class="svg-inline--fa fa-trash-can w-2.5 text-gray-300 group-hover:text-white" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10">
                                            <path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>
                                        </svg>
                                        <span class='w-100'>Remove</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary px-md-4 px-2" name="buy_now" style="min-width: 120px;">Buy Now</button>
                                </div>
                            </div>
                        </form>


                    <?php }
                } else { ?>
                    <div class='py-5'>
                        <div class='d-flex flex-column flex-md-row justify-content-center align-items-center py-5' style="row-gap: 30px;column-gap:80px">
                            <div class="d-flex justify-content-center">
                                <img src="<?php base_url('assets/img/empty-box.png') ?>" alt="empty image" width="200" height="200">
                            </div>
                            <div class="">
                                <div>
                                    <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Empty</h2>
                                    <h3 class="text-base fw-normal h6 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start">You don't have any cart item yet.</h3>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once('../include/footer.php') ?>