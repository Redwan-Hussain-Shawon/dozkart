<?php
include_once('../connect/base_url.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include_once('../connect/conn.php');
    include_once('../include/product-view/function.php');
    $slug = mysqli_real_escape_string($conn, trim($_GET['id']));
    $sql = "SELECT 
    p.*, 
    pc.category_name 
FROM 
    products p
JOIN 
    product_category pc ON p.product_category = pc.category_slug
WHERE 
    p.product_slug = '$slug';
";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $mianValueProduct = $result->fetch_assoc();

            define('MYSITE', true);
            include_once('../include/header.php') ?>

            <?php include_once('../include/header_main.php') ?>
            <style>
                .product-gallery-thumblist img {
                    width: 80px;
                    height: 90px;
                    border-radius: 4px;
                    cursor: pointer;
                }
            </style>
            <section class='bg-light py-2 py-lg-4'>
                <div class="container ">
                    <div class='bg-white  rounded-1 py-4'>
                        <div class="row g-0 mx-n2 pb-5 mb-xl-3 gy-4">
                            <div class="col-lg-5 px-2 px-md-3 ">
                                <div class='position-sticky' style='top: 90px;'>
                                    <?php if ($img = productImage($slug, $conn)) {

                                    ?>
                                        <div class="product-gallery-preview-item" id="first">
                                            <img src="<?php echo $img[0]['image_url'] ?>" alt="Product image" id='zoom_01' class='w-100 object-fit-contain view-zoom-img rounded-1 border zoomable-image' style="height: 430px;">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-2 mt-2 flex-wrap">
                                            <?php foreach ($img as $mainImg) { ?>
                                                <img src="<?php echo $mainImg['image_url'] ?>" style='width:60px;height:60px;' alt="Product image" class=' object-fit-contain border p-1 thumbnail pointer' />
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-7 px-2 mt-0 mt-lg-3">
                                <div class="h-100 rounded-3 ">
                                    <h1 class=" mt-4 mt-sm-2 px-0" style="line-height: 30px;font-size:19px;color:#212121"><?php echo $mianValueProduct['product_title'] ?></h1>
                                    <div class='text-paragraph d-flex align-items-center' style='font-size: 14px;gap:1px'>
                                        <span style="margin-right: 3px;"><?php echo $mianValueProduct['product_ratting'] ?></span>
                                        <?php for ($i = 1; $i <= $mianValueProduct['product_rating_star']; $i++) { ?>
                                            <img style='width:12px' src="<?php echo base_url('assets/img/star.png') ?>" alt='start' />
                                        <?php } ?>

                                        <h4 class='text-paragraph d-inline-block mb-0' style="font-size: 14px;margin-left:8px"><?php echo $mianValueProduct['product_rating_count'] ?> Ratings & <?php echo $mianValueProduct['product_reviews'] ?> Reviews</h4>
                                    </div>
                                    <div class="h4 fw-semibold text-accent py-2 mb-0" id='priceShow'>BDT <?php echo $mianValueProduct['product_price'] ?></div>
                                    <div class='d-flex align-items-center gap-2 mb-1'>
                                    <h3 class='fw-semibold mb-0 text-paragraph' style='font-size: 15px;'>Shipping Charge: </h3>
                                    <p class='mb-0 f-15 fw-semibold'>BDT <?php echo $mianValueProduct['shipping_charge'] ?> </p>
                                </div>
                                <div class='d-flex align-items-center gap-2 mb-3'>
                                    <h3 class='fw-semibold mb-0 ' style='font-size: 16px;'>Total Amount: </h3>
                                    <p class='mb-0 f-15 fw-semibold text-primary' style='font-size: 16px !important;'>BDT <?php echo $mianValueProduct['product_price']+$mianValueProduct['shipping_charge'] ?> </p>
                                </div>

                                    <a href='<?php echo $mianValueProduct['product_url_link'] ?>' target="_blank" class='d-inline-block mb-3 border py-1 hover-bg-gray' style='background-color:#f8f8f8 ;padding:4px 8px 4px 8px;border-radius:4px;font-size:14px'><?php echo $mianValueProduct['website_name'] ?> View
                                        <svg fill="currentColor" height="16px" width="16px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
                                            <path d="M15.3,20.1c0,3.1,2.6,5.7,5.7,5.7s5.7-2.6,5.7-5.7s-2.6-5.7-5.7-5.7S15.3,17,15.3,20.1z M23.4,32.4
	C30.1,30.9,40.5,22,40.5,22s-7.7-12-18-13.3c-0.6-0.1-2.6-0.1-3-0.1c-10,1-18,13.7-18,13.7s8.7,8.6,17,9.9
	C19.4,32.6,22.4,32.6,23.4,32.4z M11.1,20.7c0-5.2,4.4-9.4,9.9-9.4s9.9,4.2,9.9,9.4S26.5,30,21,30S11.1,25.8,11.1,20.7z" />
                                        </svg>
                                    </a>
                                    <?php if ($productColor = productColor($slug, $conn)): ?>
                                        <div class='d-flex mb-3'>
                                            <h4 class='text-paragraph' style='font-size:14px;margin-right:20px'>Color</h4>

                                            <div class='d-flex gap-2 '>
                                                <?php foreach ($productColor as $productColorData): ?>
                                                    <label>
                                                        <input type="radio" name="selectedImage" value="<?php echo $productColorData['color_name']; ?>" style="display: none;" />
                                                        <img src="<?php echo $productColorData['color_image']; ?>" style="width:50px;height:50px" alt="Product image" class="object-fit-contain border p-1 thumbnail pointer selectable-image " data-toggle="tooltip" title="<?php echo $productColorData['color_name']; ?>" data-p-price=<?php echo $productColorData['color_price'] == null ? $mianValueProduct['product_price'] : $productColorData['color_price'] ?> />
                                                    </label>
                                                <?php endforeach;

                                                ?>

                                            </div>

                                        </div>
                                    <?php endif; ?>
                                    <p class='text-danger d-none mb-3 fw-medium' id='color-error' style='margin-top: -8px;font-size:23px;'></p>
                                   
                                        <div class='d-flex mb-3'>
                                            <h4 class='text-paragraph' style='font-size:14px;margin-right:33px'>Size</h4>
                                            <div class='d-flex gap-2 '>
                                            <a href="javascript:void(0)">
                                                    <div class=' p-1 px-2 border-primary  pointer hover-size-product' style='border:1px dashed #dde2e6 ;font-size:13px'><?php echo $mianValueProduct['product_size'] ?></div>
                                                </a>
                                            <?php if ($productSize = productSize($slug, $conn)): ?>
                                                <?php foreach ($productSize as $productSizeData): ?>
                                                    <a href="<?php echo $productSizeData['size_click_view_url'] ?>" target="_blank">
                                                        <div class=' p-1 px-2  pointer hover-size-product' style='border:1px dashed #dde2e6 ;font-size:13px'><?php echo $productSizeData['size_name'] ?></div>
                                                    </a>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                               
                                            </div>
                                        </div>
                               


                                    <form action="<?php base_url('checkout') ?>" method="post">
                                        <div class="d-flex gap-2 align-items-center mb-2">
                                            <h4 class="h5 text-paragraph" style="font-size: 14px;">Quantity: </h4>
                                            <div class="border rounded-1 d-flex align-items-center" style="width: 88px;">
                                                <button class="btn " type="button" onclick="quantityChange(-1)" style='padding:5px 10px'>
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus" class="svg-inline--fa fa-minus w-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10">
                                                        <path fill="currentColor" d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"></path>
                                                    </svg>
                                                </button>
                                                <input readonly type="text" name="qunty" id="quantity" value="1" style="width: 20px;font-size:14px" class="border-0 text-center">
                                                <button class="btn py-1" type="button" onclick="quantityChange(1)" style='padding:8px 10px'>
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus w-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10">
                                                        <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class='d-flex gap-2 mb-4 mt-3'>
                                            <button type="button" class="btn btn-primary  d-block w-100" name="buy_now" style='padding:8px' onclick="addToCart('buynow')">Buy Now</button>
                                            <button type="button" i class="btn btn-outline-primary d-block w-100" onclick="addToCart()">Add to Cart</button>
                                        </div>

                                        <table style='font-size:13px' class='black table'>
                                            <tr>
                                                <th>Product</th>
                                                <td class="d-flex gap-1 align-items-center"><img src="<?php base_url('assets/img/india.jpeg') ?>" style="width: 18px;height:14px" />Indian</td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td class="d-flex gap-1 align-items-center"> <?php echo $mianValueProduct['category_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th>Brand</th>
                                                <td><?php echo $mianValueProduct['product_brand_name'] ?></td>
                                            </tr>
                                            <?php
                                            $product_props = json_decode($mianValueProduct['product_props']);
                                            foreach ($product_props as $product_props_key => $product_props_data) {
                                            ?>
                                                <tr>
                                                    <th style='width:35%'><?php echo $product_props_key ?></th>
                                                    <td style='width:65%'><?php echo $product_props_data ?></td>
                                                </tr>
                                            <?php } ?>

                                        </table>
                                        <?php if (!empty($mianValueProduct['product_description'])) { ?>
                                            <div class='d-flex align-items-start gap-2 my-3'>
                                                <h3 class='h6 fw-semibold mb-0 mt-1 text-paragraph' style="font-size: 15px;">Description:</h3>
                                                <p class='mb-0 f-14'><?php echo $mianValueProduct['product_description'] ?></p>
                                            </div>
                                        <?php } ?>
                                        <input type="hidden" name="asin" value="<?php echo $mianValueProduct['product_slug'] ?>" id="productSlug">
                                        <div class='d-flex align-items-center gap-2 mb-3'>
                                            <h3 class='h6 fw-semibold mb-0'>Shipping</h3>
                                            <p class='mb-0 f-15'>(7 to 10 working days) All Bangladesh </p>
                                        </div>

                                        <div class='p-3 rounded-1 mb-4 primary-50'>
                                            <p class='mb-0 text-dark'>যেহেতু শিপিং চার্জ পণ্যের ওজনের উপর নির্ভরশীল তাই, Dozkart শিপমেন্ট সিলেক্টের সময় টোটাল প্রাইসে শিপিং চার্জ যুক্ত থাকেনা, প্রোডাক্ট দেশে আসার পর ওজন করে (প্যাকেট সহ) ওজন অনুসারে প্রতি কেজিতে গুন করে শিপিং চার্জ যুক্ত হবে। এছাড়া টোটাল প্রাইসে দেশের ভিতরে ডেলিভারি চার্জও যুক্ত থাকেনা, এটি ডেলিভারি সময় পেমেন্ট করতে হবে।</p>
                                        </div>
                                        <div class='d-flex align-items-center gap-2 mb-4'>
                                            <h3 class='h6 fw-medium mb-0 ' style='line-height: 25px;'>শিপিং চার্জ- ৯০০৳/কেজি <strong>(ব্যবসায়িক/কমার্শিয়াল কোয়ান্টিটিতে আরো কম রাখা সম্ভব।)</strong></h3>
                                        </div>

                                    </form>
                                    <div class=''>
                                        <div class=''>
                                            <a href="#" class="rounded-2 bg-white" style="height:2.5rem;border:var(--border-1)">
                                                <img src="<?php base_url('assets/img/payment-icons.jpeg') ?>" alt="" style="width:70%;" class="rounded-1">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class='py-5'>
                <div class="container ">
                    <div class='bg-white shadow-sm p-3 rounded'>
                        <ul class="nav nav-pills mb-3 gap-3 justify-content-center border-bottom border-primary pb-3 border-2" id="pills-tab" role="tablist ">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pills-details">Product Details</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content product-view-details mt-5" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-details">

                            </div>

                            <div class="tab-pane fade" id="pills-reviews"></div>
                        </div>
                    </div>
                </div>


            </section>


            <?php
            $sql = "SELECT id,asin,product_photo,product_minimum_offer_price,sales_volume,product_title FROM product_main WHERE search='Home Decor' LIMIT 15";
            if ($resutl = $conn->query($sql)) {
                if ($resutl->num_rows > 0) {
                    $mainData = [];
                    while ($mianValueProduct = $resutl->fetch_assoc()) {
                        $mainData[] = $mianValueProduct;
                    }
                    productScroll($mainData, 'Home Decor Product');
                }
            }
            ?>
            <script src="<?php base_url('assets/js/zoom.js') ?>"></script>


            <script>
                $(document).ready(function() {

                    $('#zoom_01').elevateZoom({
                        zoomType: "lens", // or "inner" or "window"
                        lensShape: "round",
                        lensSize: 200,
                        responsive: true,
                        zoomWindowWidth: 400, // Width of the zoom window
                        zoomWindowHeight: 400, // Height of the zoom window
                    });

                    $('.thumbnail').click(function() {
                        var newSrc = $(this).attr('src');

                        $('#zoom_01').removeData('elevateZoom');
                        $('.zoomContainer').remove();

                        $('#zoom_01').attr('src', newSrc);

                        $('#zoom_01').elevateZoom({
                            zoomType: "lens",
                            lensShape: "round",
                            lensSize: 200,
                            responsive: true,
                        });
                    });
                });
            </script>

<?php include_once('../include/footer.php');
        } else {
            header('location:' . base_url1('404.php'));
        }
    } else {
        header('location:' . base_url1('404.php'));
    }
} else {
    header('location:' . base_url1('404.php'));
} ?>