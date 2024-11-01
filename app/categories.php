<?php
define('MYSITE', true);
include_once('../connect/conn.php');
include_once('../connect/base_url.php');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $query = mysqli_real_escape_string($conn, trim($_GET['search']));
    $isHttps = strpos($query, 'https://') === 0;
    if ($isHttps) {
        header('Location: ' . base_url1('create-request?q=' . $query));
        exit;
    }
}

include_once('../include/header.php');
include_once('../include/header_main.php');
include_once('../include/helper.php');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, trim($_GET['search']));
    $search_condition = "WHERE 
        (products.product_title LIKE '%$search%' 
        OR products.product_category LIKE '%$search%' 
        OR products.product_description LIKE '%$search%' 
        OR product_color.color_name LIKE '%$search%' 
        OR products.product_price LIKE '%$search%' 
        OR products.product_brand_name LIKE '%$search%' 
        OR product_size.size_name LIKE '%$search%')";
} else {
    $search_condition = '';
}
?>
<style>
    @media (min-width:992px) {
        nav.navbar {
            border: none !important;
        }
    }
</style>

<section class="p-2 py-3 bg-light">
    <div class="container">
        <?php
        $results_per_page = 2;
        $page = isset($_GET['page']) ? mysqli_real_escape_string($conn, trim($_GET['page'])) : 1;
        $offset = ($page - 1) * $results_per_page;
        $sql = "SELECT 
        products.product_id,
        products.product_title,
        products.product_slug,
        products.product_price,
        products.product_brand_name,
        products.product_description,
        products.product_reviews,
        products.product_rating_star,
        products.product_ratting,
        product_image.image_url,
        product_color.color_name,
        product_size.size_name
    FROM 
        products
    LEFT JOIN 
        product_color ON products.product_slug = product_color.product_slug
    LEFT JOIN 
        product_size ON products.product_slug = product_size.product_slug
    LEFT JOIN 
        product_image ON products.product_slug = product_image.product_slug
    $search_condition
    GROUP BY 
        products.product_id
    ORDER BY RAND()
    LIMIT $offset, $results_per_page";


        if ($result = $conn->query($sql)) {
        ?>
            <div class="row">
                <div class="col-lg-3 px-2">
                    <?php include_once('category/nav-bar.php'); ?>
                </div>
                <div class="col-lg-9 px-2">
                    <div class='bg-white rounded px-3 pb-3'>
                        <?php if ($result->num_rows > 0) { ?>
                            <div class="d-flex pt-2 align-items-center justify-content-between">
                                <h4 class='py-2 h5 mb-0'>All Products</h4>
                                <!-- <h5 class='text-paragraph fw-normal d-none d-lg-block py-3 mb-0' style='font-size: 14px;'>Home / <strong><?php echo $query; ?></strong></h5> -->
                            </div>
                            <div class="row gy-2" id='productsContainer'>
                                <?php while ($data = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-lg-3 px-1 px-md-2 col-md-4 col-6 product overflow-hidden position-relative py-1 " style='padding:5px'>
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
                                <?php } ?>
                                <?php
                                // Ensure $search is defined, even if empty
                                $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, trim($_GET['search'])) : '';
                                ?>
                                <!-- Pagination code with the fixed $search handling -->
                                <div class="pagination mt-3">
                                    <nav aria-label="Page navigation" class="mx-auto">
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            $total_rows_query = "SELECT COUNT(DISTINCT products.product_id) AS total
                FROM products
                LEFT JOIN product_color ON products.product_slug = product_color.product_slug
                LEFT JOIN product_size ON products.product_slug = product_size.product_slug
                LEFT JOIN product_image ON products.product_slug = product_image.product_slug
                $search_condition";

                                            $total_rows_result = mysqli_query($conn, $total_rows_query);
                                            $total_rows_data = mysqli_fetch_assoc($total_rows_result);
                                            $total_rows = $total_rows_data['total'];
                                            $total_pages = ceil($total_rows / $results_per_page);

                                            $window_size = 4;
                                            $start_page = max(1, $page - floor($window_size / 2));
                                            $end_page = min($total_pages, $start_page + $window_size - 1);

                                            if ($end_page - $start_page < $window_size - 1) {
                                                $start_page = max(1, $end_page - $window_size + 1);
                                            }

                                            if ($page > 1) { ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo base_url('categories?search=' . urlencode($search) . '&page=' . ($page - 1)); ?>">Prev</a>
                                                </li>
                                            <?php }

                                            for ($i = $start_page; $i <= $end_page; $i++) { ?>
                                                <li class="page-item <?php if ($i == $page) echo 'active text-white'; ?>">
                                                    <a class="page-link" href="<?php echo base_url('categories?search=' . urlencode($search) . '&page=' . $i); ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php }

                                            if ($page < $total_pages) { ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo base_url('categories?search=' . urlencode($search) . '&page=' . ($page + 1)); ?>">Next</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>


                            </div>
                        <?php } else { ?>
                            <h5 class='text-danger fw-bold text-center fw-normal d-none d-lg-block py-3' style='font-size: 22px;'>Product Not Found</h5>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php include_once('../include/footer.php'); ?>