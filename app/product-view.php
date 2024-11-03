<?php
include_once('../connect/base_url.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include_once('../connect/conn.php');
    include_once('../include/product-view/function.php');
    $slug = mysqli_real_escape_string($conn, trim($_GET['id']));
    $sql = "SELECT 
    p.*, 
    pc.category_name,
    pc.payment_advance 
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
            <meta name="description" content="<?php echo htmlspecialchars($mianValueProduct['product_brand_name']); ?> <?php echo htmlspecialchars($mianValueProduct['product_title']); ?> featuring a powerful <?php echo htmlspecialchars($mianValueProduct['product_price']); ?>W motor with Vent-X technology, <?php echo htmlspecialchars($mianValueProduct['product_size']); ?> stainless steel jars, rated <?php echo htmlspecialchars($mianValueProduct['product_ratting']); ?>/5 stars by <?php echo htmlspecialchars($mianValueProduct['product_rating_count']); ?> users. Available on <?php echo htmlspecialchars($mianValueProduct['website_name']); ?>.">

            <meta property="og:title" content="<?= $mianValueProduct['product_title']; ?>">
            <meta property="og:description" content="<?php echo htmlspecialchars($mianValueProduct['product_brand_name']); ?> <?php echo htmlspecialchars($mianValueProduct['product_title']); ?> featuring a powerful <?php echo htmlspecialchars($mianValueProduct['product_price']); ?>W motor with Vent-X technology, <?php echo htmlspecialchars($mianValueProduct['product_size']); ?> stainless steel jars, rated <?php echo htmlspecialchars($mianValueProduct['product_ratting']); ?>/5 stars by <?php echo htmlspecialchars($mianValueProduct['product_rating_count']); ?> users. Available on <?php echo htmlspecialchars($mianValueProduct['website_name']); ?>.">
            <?php if ($img = productImage($slug, $conn)) { ?>
                <meta property="og:image" content="<?php base_url('assets/upload/' . $img[0]['image_url'])  ?>">
            <?php } ?>
            <meta property="og:url" content="<?php base_url('view-product/' . $mianValueProduct['product_slug']) ?>">
            <meta property="og:type" content="product">




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
                                        <div class="product-gallery-preview-item img-container" id="first">
                                            <img src="<?php base_url('assets/upload/' . $img[0]['image_url'])  ?>" alt="Product image" id='zoom_01' class='w-100 object-fit-contain view-zoom-img rounded-1 border zoomable-image' style="height: 430px;">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-2 mt-2 flex-wrap">
                                            <?php foreach ($img as $mainImg) { ?>
                                                <img src="<?php base_url('assets/upload/' . $mainImg['image_url'])  ?> " style='width:60px;height:60px;' alt="Product image" class=' object-fit-contain border p-1 thumbnail pointer' />
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-7 px-2 mt-0 mt-lg-3">
                                <div class="h-100 rounded-3 ">
                                    <h1 class=" mt-4 mt-sm-2 px-0" style="line-height: 30px;font-size:19px;color:#212121"><?php echo $mianValueProduct['product_title'] ?></h1>
                                    <div class='text-paragraph d-flex align-items-center' style='font-size: 14px;gap:1px;' >
                                        <div style="background-color: #388e3c; padding: 3px 8px; border-radius: 3px; font-size: 12px;color:white"><?php echo $mianValueProduct['product_ratting'] ?>
                                        <img style='width: 10px' src="<?= base_url('assets/img/star-white.svg'); ?>" alt='star' />
                                        </div>
                                        <h4 class='text-paragraph d-inline-block mb-0' style="font-size: 14px;margin-left:8px"><?php echo $mianValueProduct['product_rating_count'] ?> Ratings & <?php echo $mianValueProduct['product_reviews'] ?> Reviews</h4>
                                    </div>
                                    <div class="d-flex align-items-center">
                                    <div class="h4 fw-semibold text-accent py-2 mb-0" id='priceShow'>BDT <?php echo $mianValueProduct['product_price'] ?></div>
                                    <div style="font-size: 16px; margin-left: 12px; vertical-align: middle; color: #878787; font-weight:500">
    <del>BDT <?php echo $mianValueProduct['product_price'] * (1 + $mianValueProduct['product_discount'] / 100); ?></del>
</div>

                                    <div >
    <span style="margin-left: 12px; font-size: 17px; font-weight: 600; color: #388e3c; vertical-align: middle;"><?php echo $mianValueProduct['product_discount'] ?>% off</span>
</div>

                                    </div>

                                    <div class='d-flex align-items-center gap-2 mb-1'>
                                        <h3 class='fw-semibold mb-0 text-paragraph' style='font-size: 15px;'>Shipping Charge: </h3>
                                        <p class='mb-0 f-15 fw-semibold'>BDT <?php echo $mianValueProduct['shipping_charge'] ?> (All Bangladesh ) </p>
                                    </div>
                                    <div class='d-flex align-items-center gap-2 mb-3'>
                                        <h3 class='fw-semibold mb-0 ' style='font-size: 16px;'>Total Amount: </h3>
                                        <p class='mb-0 f-15 fw-semibold text-primary' id="totalPriceShow" style='font-size: 16px !important;'>BDT <?php echo $mianValueProduct['product_price'] + $mianValueProduct['shipping_charge'] ?> </p>
                                    </div>


                                    <?php if ($productColor = productColor($slug, $conn)): ?>
                                        <div class='d-flex mb-3'>
                                            <h4 class='text-paragraph' style='font-size:14px;margin-right:20px'>Color</h4>

                                            <div class='d-flex gap-2 '>
                                                <?php foreach ($productColor as $productColorData):
                                                ?>
                                                    <label>
                                                        <input type="radio" name="selectedImage" value="<?php echo $productColorData['color_name']; ?>" style="display: none;" />
                                                        <img src=" <?php base_url('assets/upload/' . $productColorData['color_image']); ?>" style="width:50px;height:50px" alt="Product image" class="object-fit-contain border p-1 thumbnail pointer selectable-image " data-toggle="tooltip" title="<?php echo $productColorData['color_name']; ?>" data-p-price=<?php echo $productColorData['color_price'] == null ? $mianValueProduct['product_price'] : $productColorData['color_price'] ?>
                                                            data-p-totalprice=<?php echo $productColorData['color_price'] == null ? $mianValueProduct['product_price'] + $mianValueProduct['shipping_charge'] : $productColorData['color_price'] + $mianValueProduct['shipping_charge']  ?>
                                                            data-colorid=<?= $productColorData['color_id'] ?> />
                                                    </label>
                                                <?php endforeach;
                                                ?>

                                            </div>

                                        </div>
                                    <?php endif; ?>
                                    <input type="hidden" id="product_color_id" value="null">
                                    <p class='text-danger d-none mb-3 fw-medium' id='color-error' style='margin-top: -8px;font-size:23px;'></p>
                                    <?php if ($mianValueProduct['product_size'] !== '') { ?>
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
                                    <?php } ?>



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
                                            $product_props = json_decode($mianValueProduct['product_props'], true);
                                            foreach ($product_props as $product_props_key => $product_props_data) {
                                            ?>
                                                <tr>
                                                    <th style='width:35%'><?php echo str_replace('_', ' ', $product_props_key); ?></th>
                                                    <td style='width:65%'><?php echo $product_props_data ?></td>
                                                </tr>
                                            <?php } ?>

                                        </table>
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
                        <div class="tab-content product-view-details mt-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-details">
                                <?php echo $mianValueProduct['product_description'] ?>
                            </div>

                            <div class="tab-pane fade" id="pills-reviews">
                                <?php 
                                  $sql_review = "SELECT * FROM product_reviews WHERE product_slug='$slug'";
                                  $result_review = $conn->query($sql_review);
                                  if($result_review->num_rows>0){
                                ?>
        <h3 class="text-center fw-bold" style="font-size: 22px;">Some Reviews</h3>
        <div class="d-flex flex-column gap-4">
            <?php 
          
            while ($review = $result_review->fetch_assoc()){
                 ?>
                <div>
    <div class="d-flex gap-2 align-items-center">
        <button class="text-white" style="background-color: #388e3c; padding: 2px 4px; border-radius: 3px; font-size: 12px;">
            <?= $review['review_rating']; ?> 
            <img style='width: 10px' src="<?= base_url('assets/img/star-white.svg'); ?>" alt='star' />
        </button>
        <h5 class="mt-1" style="font-size: 14px; color: #212121; font-weight: 500;">
            <?= htmlspecialchars($review['review_title']); ?>
        </h5>
    </div>
    
    <p class="mb-2 align-items-start">
        <?= htmlspecialchars($review['review_text']) ?: 'No review text provided.'; ?>
    </p>
    
    <div class="mb-2 d-flex align-items-center gap-1">
    <?php 
    // Decode the image JSON correctly
    $images_json = $review['image'];

    $images = json_decode($images_json, true); 
    foreach ($images[0] as $image){ ?>
        <img src="<?php base_url('assets/upload/review/' . htmlspecialchars($image)); ?>" 
             style="width: 62px; height: 62px; border-radius: 3px; cursor: pointer;" 
             alt="Review Image" 
             onclick="openModal('<?= base_url('assets/upload/review/' . htmlspecialchars($image)); ?>')" />
    <?php } ?>
</div>



    
    <div class="d-flex align-items-center">
        <div class="text-muted fw-bold" style="font-size: 12px; margin-right: 6px;"><?= htmlspecialchars($review['reviewer_name']) ?: 'Anonymous'; ?></div>
        <div class="text-muted" style="font-size: 12px; margin-right: 6px;"><?= htmlspecialchars($review['location']) ?: 'Location not provided'; ?></div>
        <div class="text-muted" style="font-size: 12px; margin-right: 6px;"><?= $review['review_date'] !== '0000-00-00' ? htmlspecialchars($review['review_date']) : 'Date not available'; ?></div>
    </div>
</div>

            <?php }; ?>
        </div>
        <?php } ?>
    </div>
                        </div>
                    </div>
                </div>


            </section>

<div id="imageModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class="modal-title">Image Preview</h5>
                <button onclick="closeModal()" type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 30px;height: 30px;font-weight: 600;background:#ffcbcb;
">
                    <span aria-hidden="true">✕</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img id="modalImage" src="" alt="Review Image" style="width: 100%; height: 300px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>







            <script>
                $(document).ready(function() {
                    $('.thumbnail').click(function() {
                        var newSrc = $(this).attr('src');

                        $('#zoom_01').removeData('elevateZoom');
                        $('.zoomContainer').remove();
                        $('#zoom_01').attr('src', newSrc);
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
<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        $('#imageModal').modal('show');
    }
    function closeModal() {
        $('#imageModal').modal('hide'); 
    }
</script>