<?php 
define('MYSITE',true);
include_once('../include/helper.php');
protected_area();
include_once('../connect/base_url.php');

?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php'); ?>
<section class='my-5 px-2'>
    <div class='container'>
        <div class='row'>
            <?php include_once('../include/account-header.php') ?>
            <div class="col-lg-9" style='margin-top: 25px;'>
                <div class='pb-3 d-flex align-items-center justify-content-between'>
                    <h4 class='fw-semibold w-100 py-3 mb-0 bg-light rounded px-3'>Create New Request</h4>
                </div>
                <form action="<?php base_url('assets/php/core.php') ?>" method="post" enctype="multipart/form-data">
                    <div class="row mt-3 px-2">
                        <div class="col-12">
                            <label for="product_link" class='form-label'>Paste Product Link</label>
                            <input type="text" class="form-control mb-4" placeholder="https://www.amazon.com/items/product...5S.html" id="product_link" name="product_link" required value="<?php echo isset($_GET['q']) ? $_GET['q']:'' ?>">
                        </div>
                        <div class="col-7">
                            <div>
                                <label for="link" class='form-label'>Link<span class='text-red'>*</span></label>
                                <input type="text" class="form-control mb-4" placeholder="https://www.amazon.com/items/product...5S.html" id="link" name="link" >
                            </div>
                            <div>
                                <label for="title" class='form-label'>Title<span class='text-red'>*</span></label>
                                <input type="text" class="form-control mb-4" placeholder="Nike shoes for men" id="title" name="title" required>
                            </div>
                            <h4 class='h6 text-black mb-3'>Product Image</h4>

                            <div>
                                <label for="product_link" class='form-label'>Image URL</label>
                                <input type="text" class="form-control mb-3" placeholder="Image URL" id="link" name="image_url">
                            </div>
                            <div class='mb-3 text-center'>OR</div>
                            <div>
                                <label for="product_image" class='w-100 primary-50 rounded text-center text-primary pointer mb-3' style='height: 45px;line-height:45px;border:1px dashed var(--primary)'>Upload an Image </label>
                                <input type="file" name="product_image" class="d-none" onchange="imageUpload(this)" id="product_image" accept="image/png, image/jpeg,image/jpg,image/avif">
                            </div>
                            <div class="border border-primary p-2 text-primary rounded-1 mb-4" style='font-size: 14px;'>
                                If you attach an image of the product you want from the product link, it will be easier for us to execute your request.
                            </div>
                            <div class='d-flex flex-column flex-sm-row gap-2 align-items-center'>
                                <div class='w-100'>
                                    <label for="quantity" class='form-label'>Quantity</label>
                                    <input type="number" class="form-control mb-3" placeholder="Image URL" id="quantity" name="quantity" value="1" required>
                                </div>
                                <div class='w-100'>
                                    <label for="coundistricttry" class='form-label'>Shop <span class='text-red'>*</span></label>
                                    <select name="district" id="district" class='form-select mb-4' required>
                                        <option value="" class=''>Select</option>
                                        <option value="AliExpress">AliExpress</option>
                                        <option value="Gearbest">Gearbest</option>
                                        <option value="Taobao">Taobao</option>
                                        <option value="Flipkart">Flipkart</option>
                                        <option value="Amazon (India)">Amazon (India)</option>
                                        <option value="Amazon (USA)">Amazon (USA)</option>
                                        <option value="Ali2BD">Ali2BD</option>
                                        <option value="9">Best Buy</option>
                                        <option value="Best Buy">Ali2BD Wholesale</option>
                                        <option value="Alibaba">Alibaba</option>
                                        <option value="Pingduoduo">Pingduoduo</option>
                                        <option value="Taobao (Direct)">Taobao (Direct)</option>
                                        <option value="11:11 (21) Campaign">11:11 (21) Campaign</option>
                                        <option value="Walmart">Walmart</option>
                                        <option value="eBay">eBay</option>
                                        <option value="JLCPCB">JLCPCB</option>
                                        <option value="Noon">Noon</option>
                                        <option value="Amazon UAE">Amazon UAE</option>
                                        <option value="Myntra">Myntra</option>
                                        <option value="Daraz">Daraz</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="" class='form-label'>Props:</label>
                                <table class="min-w-full" id="myTable">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-2 text-left bg-light fw-normal px-2">Key</th>
                                            <th scope="col" class="px-4 py-2 text-left bg-light fw-normal px-1">Value</th>
                                            <th scope="col" class="py-2 text-center bg-light fw-normal px-2">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <tr>
                                            <td class="py-2 whitespace-nowrap">
                                                <input type="text" name="propskey[]" class="form-control" placeholder="Color" value="">
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap">
                                                <input type="text" name="propsvalue[]" class="form-control" placeholder="Blue" value="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class='text-center'>
                                    <button id="add-prop-btn" class='mx-auto btn btn-light px-5 py-2 mt-3' type='button'>+ Add Prop</button>
                                </div>

                            </div>
                            <div class=''>
                            <label for="instructions" class='form-label'>Instructions</label>
                            <textarea type="text" class="form-control mb-3" rows="6" placeholder="Image URL" id="instructions" name="instructions" ></textarea>
                                </div>

                        </div>
                        <div class="col-5">
                            <label for="company" class='form-label'>Product Image</label>
                            <div style='max-width: 390px;height:390px;' class='bg-light img-request rounded' id='upload-img-add'></div>
                        </div>

                        <button name="create_request" type="submit" class="btn btn-primary px-4 py-2 d-inline-block mx-3 mt-2 mb-3" style="width: fit-content;">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>


<?php


include_once('../include/footer.php'); ?>