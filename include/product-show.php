<?php
$sql = "SELECT id,asin,product_photo,product_minimum_offer_price,sales_volume,product_title FROM product_main WHERE search = 'Cosmetics' LIMIT 24";
$resutl = $conn->query($sql);


?>
<section class="py-3 bg-light px-1 px-sm-2">
    <div class="container">
        <div class='bg-white rounded-2 py-4 px-3 px-sm-4'>
            <div class="d-flex justify-content-between border-bottom align-items-center border-1">
                <h2 style="font-weight: 600;font-size: 24px;color: var(--black);border-bottom:2px solid var(--primary)" class='pb-3 mb-0'>Cosmetics</h2>
                <a href="<?php base_url('categories?search=Cosmetics') ?>"><button class='btn btn-primary'>Show More</button></a>
            </div>
            <div class="row gy-2">
                <?php while ($data = $resutl->fetch_assoc()) { 
                    ?>
                    <div class="col-xl-3 col-lg-4  px-1 px-md-2 col-md-4 col-6 product overflow-hidden position-relative py-1 ">
                        <a href="<?php base_url('view-product/' . $data['asin']) ?>">
                            <div class='shadow-sm rounded-1 h-100'>
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
                        <div style='top: 15px;' class="position-absolute d-flex gap-1 flex-column  product-triger-main">
                            <div class='bg-white  shadow-sm product-triger d-flex align-items-center justify-content-center'>
                                <a href="<?php base_url('view-product/' . $data['asin']) ?>" class='text-paragraph'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                            <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
        


            </div>
        </div>
</section>