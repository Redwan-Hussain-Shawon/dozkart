<?php define('MYSITE', true);
include_once('../connect/conn.php');
include_once('../connect/base_url.php');
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $query = mysqli_real_escape_string($conn, trim($_GET['search']));
    $isHttps = strpos($query, 'https://') === 0;
    if ($isHttps) {
       header('Location: ' . base_url1('create-request?q='.$query));
        exit; 
    }
}
include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php');
include_once('../include/helper.php');
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $query = mysqli_real_escape_string($conn, trim($_GET['search']));
    $query = str_replace(' ', '', $query);
    include_once('../include/search.php');
} else {
    $query = 'Belender';
}
?>
<style>
    @media (min-width:992px) {
        nav.navbar{
            border: none !important;
    }
    }
</style>
<section class="p-2 py-3 bg-light">
    <div class="container">
        <?php
        $results_per_page = 20;
        $page = isset($_GET['page']) ? mysqli_real_escape_string($conn, trim($_GET['page'])) : 1;
        $offset = ($page - 1) * $results_per_page;
        $sql = "SELECT id,asin,product_photo,product_minimum_offer_price,sales_volume,product_title FROM product_main WHERE search='$query'  ORDER BY RAND()  LIMIT $offset, $results_per_page";
        if ($result = $conn->query($sql)) {
        ?>
            <div class="row">
                <div class="col-lg-3 px-2">
                   <?php include_once('category/nav-bar.php') ?>

                </div>
                <div class="col-lg-9 px-2">
                    <div class='bg-white rounded px-3'>
                        <?php if ($result->num_rows > 0) { ?>
                            <div class="d-flex pt-2 align-items-center justify-content-between">
                            <h4 class='py-2 h5 mb-0'>All Products</h4>
                            <h5 class='text-paragraph fw-normal d-none d-lg-block py-3 mb-0' style='font-size: 14px;'>Home / <strong><?php echo $query ?></strong></h5>
                          
                            </div>
                            <div class="row gy-2">
                                <?php while ($data = $result->fetch_assoc()) { ?>
                                    <div class="col-lg-3  px-1 px-md-2 col-md-4 col-6 product overflow-hidden position-relative py-1">
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
                                    </div>

                                <?php } ?>
                                <div class="pagination mt-3">
                                    <nav aria-label="Page navigation " class="mx-auto">
                                        <ul class="pagination justify-content-center">
                                            <?php
                                            $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM product_main WHERE search='$query'"));
                                            $total_pages = ceil($total_rows / $results_per_page);
                                            for ($i = 1; $i <= $total_pages; $i++) { ?>
                                                <li class="page-item <?php if ($i == $page) echo 'active text-white' ?>">
                                                    <a class="page-link" href="<?php echo base_url('categories?search=' . $query) ?>&&page=<?php echo $i ?>"><?php echo $i ?></a>
                                                </li>
                                            <?php  } ?>
                                        </ul>
                                    </nav>
                                </div>


                            </div>
                        <?php } else { ?>
                            <h5 class='text-danger fw-bold text-center fw-normal d-none d-lg-block py-3 ' style='font-size: 22px;'>Product Not Found</h5>
                            <!-- <h5 class='text-paragraph fw-normal d-none d-lg-block py-3 ' style='font-size: 14px;'>Home / <strong>All Categories</strong></h5> -->
                        <?php } ?>
                    </div>

                </div>
            </div>
        <?php
        } ?>


    </div>
    </div>
</section>



<?php include_once('../include/footer.php') ?>