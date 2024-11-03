<?php
include_once('../../connect/conn.php');



if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, trim($_GET['id']));
    $sql = "SELECT * FROM products WHERE product_id=$id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    include_once('include/header.php');

?>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Multi Column with Form Separator -->
            <div class="card mb-6">
                <h5 class="card-header">Product Update</h5>
                <form class="card-body" method="post" action="<?php base_url('admin-doz/update-product') ?>" enctype="multipart/form-data">
                    <div class="row g-6">
                        <div class="col-md-6">
                            <label class="form-label" for="product_title">Product Title</label>
                            <input type="text" id="product_title" class="form-control" placeholder="add product title" name="product_title" required value="<?= $data['product_title'] ?>">
                        </div>
                        <input type="hidden" name="product_id" value="<?= $data['product_id'] ?>">

                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="multicol-password">Product Category</label>
                                <div class="input-group input-group-merge">
                                    <select name="product_category" class="form-select" id="product_category" required>
                                        <option value="">Select a Category</option>
                                        <?php
                                        $sql = "SELECT * FROM product_category WHERE status=1";
                                        $result = $conn->query($sql);

                                        while ($category_data = $result->fetch_assoc()) {
                                            $selected = ($category_data['category_slug'] == $data['product_category']) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $category_data['category_slug'] ?>" <?php echo $selected; ?>>
                                                <?php echo $category_data['category_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_price">Product Price</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" id="product_price" name="product_price" class="form-control" placeholder="product price" aria-describedby="multicol-confirm-password2" required value="<?= $data['product_price'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_discount">Product Discount</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="product_discount" name="product_discount" class="form-control" placeholder="discount like 50" pattern="[^%]*" aria-describedby="multicol-confirm-password2" required value="<?= $data['product_discount'] ?>">
                            </div>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_size">Product Size</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="product_size" name="product_size" class="form-control" placeholder="product size" value="<?= $data['product_size'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_ratting">Product Ratting</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="product_ratting" name="product_ratting" required class="form-control" placeholder="3.5, 4.2, 5.3 like " value="<?= $data['product_ratting'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_rating_star">Product Rating Star</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="product_rating_star" name="product_rating_star" class="form-control" placeholder="5,4,3,2 like" required value="<?= $data['product_rating_star'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_rating_count">Product Rating Count</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" id="product_rating_count" name="product_rating_count" class="form-control" placeholder="how many rating product" required value="<?= $data['product_rating_count'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_rating_count">Product Reviews</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" id="product_reviews" name="product_reviews" class="form-control" placeholder="how many rating product" required value="<?= $data['product_reviews'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_brand_name">Product Brand Name</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="product_brand_name" name="product_brand_name" class="form-control" placeholder="product brand name" required value="<?= $data['product_brand_name'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="website_name">Product Website Name</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="website_name" name="website_name" class="form-control" placeholder="product website name" required value="<?= $data['website_name'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_url_link">Product Live Url Link</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="product_url_link" name="product_url_link" class="form-control" placeholder="product website name" required value="<?= $data['product_url_link'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_url_link">Product Keyword</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="keyword" name="keyword" class="form-control" placeholder="product keyword" required value="<?= $data['keyword'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-password-toggle">
                                <label class="form-label" for="product_description">Product Description </label>
                                <div class="input-group input-group-merge">
                                    <textarea name="product_description" id="product_description" rows="5"><?= $data['product_description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="product_slug" value="<?= $data['product_slug'] ?>">
                        <?php
                        $product_slug = $data['product_slug'];
                        $sql_size = "SELECT * FROM product_size WHERE product_slug='$product_slug'";
                        $result_size = $conn->query($sql_size);
                        if ($result_size->num_rows > 0) {
                        ?>
                            <div class="col-12">
                                <hr class="my-6 mx-n6">
                                <h6>Product Size Add</h6>
                                <div id="product-size">
                                    <?php while ($product_size = $result_size->fetch_assoc()) {
                                    ?>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Size Name" value="<?= $product_size['size_name'] ?>" name="size_name[]">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Size View Link" name="size_click_view_url[]" value="<?= $product_size['size_click_view_url'] ?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="size_id[]" id="size_id" value="<?= $product_size['size_id'] ?>">

                                    <?php } ?>
                                </div>
                                <button class="btn btn-success btn-sm my-2 mt-2" id="product-size-trigger" style="width: fit-content;" type="button">Add More</button>
                            </div>
                            <?php } else { ?>

                                <div class="col-12">
                                <hr class="my-6 mx-n6">
                                <h6>Product Size Add</h6>
                                <div id="product-size">
                                      <!-- <div class="row mt-2">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Size Name" value="" name="size_name[]">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Size View Link" name="size_click_view_url[]" value="">
                                            </div>
                                        </div>
                                        <input type="hidden" name="size_id[]" id="size_id" value="">
                                </div> -->
                               
                            </div>
                            <button class="btn btn-success btn-sm my-2 mt-2" id="product-size-trigger" style="width: fit-content;" type="button">Add More</button>

                            <?php } ?>
                            <div class="pt-6">
                                <button type="submit" class="btn btn-primary me-3">Submit</button>
                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                            </div>
                </form>
            </div>

        </div>

    </div>


    <script src="<?php base_url('app/doz-admin/assets/js/ivis_edtor.js') ?>"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#product_description'))
            .catch(error => {
                console.error('There was a problem initializing the editor:', error);
            });
    </script>
<?php

    include_once('include/footer.php');
} else {
    header('location:../abcd');
}

?>