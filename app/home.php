<?php
define('MYSITE', true);
include_once('../include/header.php');
// $ip =$_SERVER['REMOTE_ADDR'];
// $query = "SELECT * FROM visitor WHERE ip='$ip'";
// $result=$conn->query($query);
// if($result->num_rows >0){
// $query = "INSERT INTO visitor(ip)VALUES('$ip')";
// $conn->query($query);
// }

?>

<?php include_once('../include/header_main.php') ?>

<!-- slider Section start  -->
<?php

include_once('../include/slider.php') ?>

<section class='pb-4'>
    <div class='container'>
        <h3 class='h2 fw-bold text-center mb-4'>This Website Product Is our Website avable</h3>
        <div class='overflow-x-auto p-2'>
            <div class="company-list " style="min-width:1270px">
                <div class='d-flex flex-column gap-2 align-items-center shadow-sm p-3' style='border-radius: 8px;'>
                    <img src="<?php base_url('assets/img/evay.png') ?>" alt="" style="max-width: 160px;width:100%;height:60px" class='rounded-1 shiping-img'>
                    <a href="<?php base_url('categories') ?>">
                        <h4 class='h6 text-center'>Ebay</h4>
                    </a>
                </div>
                <div class='d-flex flex-column gap-2 align-items-center shadow-sm p-3' style='border-radius: 8px;'>
                    <img src="<?php base_url('assets/img/india-mart.png') ?>" alt="" style="max-width: 160px;width:100%;height:60px" class='rounded-1 shiping-img'>
                    <a href="<?php base_url('categories') ?>">
                        <h4 class='h6 text-center'>Indiamart (Wholesale)</h4>
                    </a>
                </div>
                <div class='d-flex flex-column gap-2 align-items-center shadow-sm p-3' style='border-radius: 8px;'>
                    <img src="<?php base_url('assets/img/Amazon_logo.svg') ?>" alt="" style="max-width: 160px;width:100%;height:60px" class='rounded-1 shiping-img'>
                    <a href="<?php base_url('categories') ?>">
                        <h4 class='h6 text-center'>Amazon.in</h4>
                    </a>
                </div>

                <div class='d-flex flex-column gap-2 align-items-center shadow-sm p-3' style='border-radius: 8px;'>
                    <img src="<?php base_url('assets/img/flipkart-logo.png') ?>" alt="" style="max-width: 160px;width:100%;height:60px" class='rounded-1 shiping-img'>
                    <a href="<?php base_url('categories') ?>">
                        <h4 class='h6 text-center'>Flipkart</h4>
                    </a>
                </div>

                <div class='d-flex flex-column align-items-center gap-2 shadow-sm p-3' style='border-radius: 8px;'>
                    <img src="<?php base_url('assets/img/myntra-1.svg') ?>" alt="" style="max-width: 160px;width:100%;height:60px" class='rounded-1 shiping-img'>
                    <a href="<?php base_url('categories') ?>">
                        <h4 class='h6 text-center'>Myntra</h4>
                    </a>
                </div>
                <div class='d-flex flex-column align-items-center gap-2 shadow-sm p-3' style='border-radius: 8px;'>
                    <img src="<?php base_url('assets/img/jio-mart.png') ?>" alt="" style="max-width: 80px;width:100%;height:60px" class='rounded-1 shiping-img-jio'>
                    <a href="<?php base_url('categories') ?>">
                        <h4 class='h6 text-center'>Jiomart</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</section>
<div class="container ">
    <div class="row py-5">
        <?php

        $sql = "SELECT 
            products.product_title,
            products.product_slug,
            products.product_price,
            products.product_reviews,
            products.product_rating_star,
            products.product_ratting,
            product_image.image_url
        FROM 
            products
        JOIN 
            product_image ON products.product_slug = product_image.product_slug
            GROUP BY 
            products.product_id
        ORDER BY 
            products.product_id DESC 
        LIMIT 40";
        if ($resutl = $conn->query($sql)) {
            $sql1 = "SELECT * FROM products";
            while ($data = $resutl->fetch_assoc()) {
        ?>

                <div class="col-xl-2 col-lg-2  col-md-4 col-6 product overflow-hidden position-relative py-1 " style='padding:5px'>
                    <a href="<?php base_url('view-product/' . $data['product_slug']) ?>">
                        <div class='shadow-sm rounded-1 h-100'>
                            <div class="img overflow-hidden " style='border-radius:2px 2px 0 0;background-image: url("<?php base_url('assets/img/default-image.png') ?>");height: 240px;background-repeat: no-repeat;background-position: center;background-size: 80%;'>
                                <img src="<?php base_url('assets/upload/' . $data['image_url']) ?>" alt="" class="w-100 object-fit-cover" style='border-radius:2px 2px 0 0;height: 240px;'>
                            </div>
                            <div class="p-2 text-left">
                                <div class="d-flex align-items-end gap-2">
                                    <span class="fw-semibold text-primary " style='font-size: 14px;'>BDT <?php echo $data['product_price'] ?></span>
                                </div>
                                <h3 class="mb-1 overflow-hidden " style='font-size: 16px;line-height:24px;display: -webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;'>
                                    <?php echo $data['product_title'] ?>
                                </h3>
                                <div class='d-flex  align-items-center gap-1'>
                                    <?php for ($i = 1; $i <= $data['product_rating_star']; $i++) { ?>
                                        <img style='width:12px;' src="<?php base_url('assets/img/star.png') ?>" alt='star' />
                                    <?php  } ?>
                                    <p class='mb-0' style='margin-left: 5px;font-size:13px'><?= $data['product_ratting'] ?> Rating</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div style='top: 15px;' class="position-absolute d-flex gap-1 flex-column  product-triger-main">
                        <div class='bg-white shadow-sm product-triger d-flex align-items-center justify-content-center'>
                            <a href="<?php base_url('view-product/' . $data['product_slug']) ?>" class='text-paragraph'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0"></path>
                                        <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7"></path>
                                    </g>
                                </svg>

                            </a>
                        </div>
                        <div class='bg-white shadow-sm product-triger d-flex align-items-center justify-content-center'>
                            <a href="<?php base_url('view-product/' . $data['product_slug']) ?>" class='text-paragraph'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 12.572L12 20l-7.5-7.428A5 5 0 1 1 12 6.006a5 5 0 1 1 7.5 6.572"></path>
                                </svg>
                            </a>
                        </div>
                        <div class='bg-white shadow-sm product-triger d-flex align-items-center justify-content-center'>
                            <a href="<?php base_url('view-product/' . $data['product_slug']) ?>" class='text-paragraph'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                                    <path fill="currentColor" d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797"></path>
                                </svg>

                            </a>
                        </div>
                    </div>
                </div>

        <?php }
        }
        ?>
    </div>
</div>




<?php include_once('../include/footer.php') ?>