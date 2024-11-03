<?php
include_once('include/header.php');
?>

<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Multi Column with Form Separator -->
        <div class="card mb-6">
            <h5 class="card-header">Product Add</h5>
            <form class="card-body" method="post" action="<?php base_url('admin-doz/process-product-add') ?>" enctype="multipart/form-data">
                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label" for="product_title">Product Title</label>
                        <input type="text" id="product_title" class="form-control" placeholder="add product title" name="product_title" required>
                    </div>

                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="multicol-password">Product Category</label>
                            <div class="input-group input-group-merge">
                                <select name="product_category" class="form-select" id="product_category" required>
                                    <option value="">Select a Category</option>
                                    <?php
                                    $sql = "SELECT * FROM product_category WHERE status=1";
                                    $result = $conn->query($sql);
                                    while ($data = $result->fetch_assoc()) { ?>
                                        <option value="<?php echo $data['category_slug'] ?>"><?php echo $data['category_name'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_price">Product Price</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="product_price" name="product_price" class="form-control" placeholder="product price" aria-describedby="multicol-confirm-password2" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_discount">Discount</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="product_discount" name="product_discount" class="form-control" placeholder="discount like 50" pattern="[^%]*" aria-describedby="multicol-confirm-password2" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_size">Product Size</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="product_size" name="product_size" class="form-control" placeholder="product size">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_ratting">Product Ratting</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="product_ratting" name="product_ratting" required class="form-control" placeholder="3.5, 4.2, 5.3 like ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_rating_star">Product Rating Star</label>
                            <div class="input-group input-group-merge">
                                <select name="product_rating_star" id="" required class="form-control">
                                    <option value="">Select</option>
                                    <option value="5">5 Star</option>
                                    <option value="4">4 Star</option>
                                    <option value="3">3 Star</option>
                                    <option value="2">2 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_rating_count">Product Rating Count</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="product_rating_count" name="product_rating_count" class="form-control" placeholder="how many rating product" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_rating_count">Product Reviews</label>
                            <div class="input-group input-group-merge">
                                <input type="number" id="product_reviews" name="product_reviews" class="form-control" placeholder="how many rating product" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_brand_name">Product Brand Name</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="product_brand_name" name="product_brand_name" class="form-control" placeholder="product brand name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="website_name">Product Website Name</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="website_name" name="website_name" class="form-control" placeholder="product website name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_url_link">Product Live Url Link</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="product_url_link" name="product_url_link" class="form-control" placeholder="product website name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_url_link">Product Keyword</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="product keyword" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-password-toggle">
                            <label class="form-label" for="product_description">Product Description </label>
                            <div class="input-group input-group-merge">
                                <textarea name="product_description" id="product_description" rows="5"></textarea>
                            </div>
                        </div>
                    </div>


                </div>
                <div>
                    <hr class="my-6 mx-n6">
                    <div class="d-flex align-items-center gap-10">
                        <h6 class="mb-1">Product Image Add</h6>
                    </div>
                    <div class="row g-6">
                        <div class="col-12">
                            <div id="image-preview-color"></div>

                            <label for="uploadimage" style="cursor: pointer;">
                                <div id="inputContainer" class="d-flex align-items-center  my-2 flex-wrap" style="gap: 30px;"></div>
                                <button type="button" class="btn btn-success" id="trigger-upload">Add Image</button>
                            </label>

                        </div>
                    </div>
                </div>
                <div>
                    <hr class="my-6 mx-n6">
                    <h6>Product Color Add</h6>
                    <div class="row mt-2">
                        <div id="product-container">

                        </div>
                        <button class="btn btn-success btn-sm my-2 mt-2" id="product-color-trigger" style="width: fit-content;" type="button">Add More</button>
                    </div>
                </div>
                <div>
                    <hr class="my-6 mx-n6">
                    <h6>Product Size Add</h6>
                    <div class="row mt-2">
                        <div id="product-size">
                        </div>
                        <button class="btn btn-success btn-sm my-2 mt-2" id="product-size-trigger" style="width: fit-content;" type="button">Add More</button>
                    </div>
                </div>
                <div>
                    <hr class="my-6 mx-n6">
                    <h6>Product Props Add</h6>
                    <div class="row mt-2">
                        <div id="product-props">
                        </div>
                        <button class="btn btn-success btn-sm my-2 mt-2" style="width: fit-content;" id="product-props-trigger" type="button">Add More</button>
                    </div>
                </div>


                <div>
                    <hr class="my-6 mx-n6">
                    <h6>Product Review Add</h6>
                    <p class="mb-1">Review 1</p>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="form-label" for="review_title">Review Title</label>
                            <input type="text" placeholder="Review Title" name="review_title[]" class="form-control" id="review_title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="reviewer_name">Reviewer Name</label>
                            <input type="text" placeholder="Reviewer Name" name="reviewer_name[]" class="form-control" id="reviewer_name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="reviewer_description">Review Description </label>
                            <textarea type="text" placeholder="Reviewer Name" name="reviewer_description[]" class="form-control" id="reviewer_description"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="review_img_1">Review Image </label>
                            <div class="file-input-container border">
                                <input type="file" name="review_img_1[]" multiple="multiple" id="review_img_1">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="review_star">Review Star </label>
                            <select name="review_star[]" id="review_star" class="form-select">
                                <option value="">Select a Star</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">1</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <label class="form-label" for="review_location">Reviewer location</label>
                        <input type="text" placeholder="Reviewer location" name="review_location[]" class="form-control" id="review_location">
                        </div>
                        <div class="col-md-3 ">
                        <label class="form-label" for="review_data">Reviewe Data</label>
                        <input type="date" placeholder="Review Data" name="review_data[]" class="form-control" id="review_data">
                        </div>
                    </div>
                    <p class="mb-1">Review 2</p>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="form-label" for="review_title">Review Title</label>
                            <input type="text" placeholder="Review Title" name="review_title[]" class="form-control" id="review_title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="reviewer_name">Reviewer Name</label>
                            <input type="text" placeholder="Reviewer Name" name="reviewer_name[]" class="form-control" id="reviewer_name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="reviewer_description">Review Description </label>
                            <textarea type="text" placeholder="Reviewer Name" name="reviewer_description[]" class="form-control" id="reviewer_description"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="review_img_2">Review Image </label>
                            <div class="file-input-container border">
                                <input type="file" name="review_img_2[]" multiple="multiple" id="review_img_2">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="review_star">Review Star </label>
                            <select name="review_star[]" id="review_star" class="form-select">
                                <option value="">Select a Star</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">1</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <label class="form-label" for="review_location">Reviewer location</label>
                        <input type="text" placeholder="Reviewer location" name="review_location[]" class="form-control" id="review_location">
                        </div>
                        <div class="col-md-3 ">
                        <label class="form-label" for="review_data">Reviewe Data</label>
                        <input type="date" placeholder="Review Data" name="review_data[]" class="form-control" id="review_data">
                        </div>
                    </div>
                    <p class="mb-1">Review 3</p>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="form-label" for="review_title">Review Title</label>
                            <input type="text" placeholder="Review Title" name="review_title[]" class="form-control" id="review_title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="reviewer_name">Reviewer Name</label>
                            <input type="text" placeholder="Reviewer Name" name="reviewer_name[]" class="form-control" id="reviewer_name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="reviewer_description">Review Description </label>
                            <textarea type="text" placeholder="Reviewer Name" name="reviewer_description[]" class="form-control" id="reviewer_description"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="review_img_3">Review Image </label>
                            <div class="file-input-container border">
                                <input type="file" name="review_img_3[]" multiple="multiple" id="review_img_3">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="review_star">Review Star </label>
                            <select name="review_star[]" id="review_star" class="form-select">
                                <option value="">Select a Star</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">1</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <label class="form-label" for="review_location">Reviewer location</label>
                        <input type="text" placeholder="Reviewer location" name="review_location[]" class="form-control" id="review_location">
                        </div>
                        <div class="col-md-3 ">
                        <label class="form-label" for="review_data">Reviewe Data</label>
                        <input type="date" placeholder="Review Data" name="review_data[]" class="form-control" id="review_data">
                        </div>
                    </div>
              
                </div>
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

?>