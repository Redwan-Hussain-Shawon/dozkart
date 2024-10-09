<?php define('MYSITE', true);
include_once('../include/helper.php');
protected_area();
include_once('../connect/base_url.php');

?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php');
$user_id = getId();
$sql = "SELECT * FROM user WHERE id=$user_id";
if ($result = $conn->query($sql)) {
    if ($result->num_rows == 1) {

        $data = $result->fetch_assoc();

        if(isset($_GET['id']) && $_GET['id'] == 'cart'){
            $_SESSION['redirect_url'] = 'cart';
        }
?>
        <section class='my-5 px-2'>
            <div class='container'>
                <div class='row'>
                    <?php include_once('../include/account-header.php') ?>
                    <div class="col-lg-9" style='margin-top: 25px;'>
                        <div class='border-bottom pb-3 d-flex align-items-center justify-content-between'>
                            <h4 class='fw-semibold'>Address</h4>
                            <a href="<?php base_url('address') ?>" class='btn btn-primary px-3 text-white'>View Address</a>
                        </div>
                        <form action="<?php base_url('assets/php/core.php') ?>" method="post">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="name" class='form-label'>Name<span class='text-red'>*</span></label>
                                    <input type="text" class="form-control mb-4" value="<?php echo $data['name'] ?>" placeholder="enter full name" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class='form-label'>Phone<span class='text-red'>*</span></label>
                                    <input type="text" class="form-control mb-4" value="<?php echo $data['phone'] ?>" placeholder="017XXXXXXXX" id="phone" name="phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class='form-label'>Email<span class='text-red'>*</span></label>
                                    <input type="email" class="form-control mb-4" value="<?php echo $data['email'] ?>" placeholder="enter your email" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class='form-label'>Country <span class='text-red'>*</span></label>
                                    <select name="country" id="country" class='form-select mb-4'>
                                        <option value="Bangladesh" class=''>Bangladesh</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="postal_code" class='form-label'>Postal Code <span class='text-red'>*</span></label>
                                    <input type="number" class="form-control" placeholder="Type postal code to fill up state/district and upazilla" id="postal_code" name="postal_code" required>
                                    <span class='text-red'>To get your district and upazila please write your correct postal code</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="coundistricttry" class='form-label'>District <span class='text-red'>*</span></label>
                                    <select name="district" id="district" class='form-select mb-4' required>
                                        <option value="" class=''>Select</option>
                                        <option value="">Select District</option>
                                        <option value="Bagerhat">Bagerhat</option>
                                        <option value="Bandarban">Bandarban</option>
                                        <option value="Barguna">Barguna</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Bogura">Bogura</option>
                                        <option value="Brahmanbaria">Brahmanbaria</option>
                                        <option value="Chandpur">Chandpur</option>
                                        <option value="Chapai Nawabganj">Chapai Nawabganj</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Chuadanga">Chuadanga</option>
                                        <option value="Comilla">Comilla</option>
                                        <option value="Cox's Bazar">Cox's Bazar</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Faridpur">Faridpur</option>
                                        <option value="Feni">Feni</option>
                                        <option value="Gaibandha">Gaibandha</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Gopalganj">Gopalganj</option>
                                        <option value="Habiganj">Habiganj</option>
                                        <option value="Jamalpur">Jamalpur</option>
                                        <option value="Jashore">Jashore</option>
                                        <option value="Jhalokati">Jhalokati</option>
                                        <option value="Jhenaidah">Jhenaidah</option>
                                        <option value="Joypurhat">Joypurhat</option>
                                        <option value="Khagrachhari">Khagrachhari</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Kishoreganj">Kishoreganj</option>
                                        <option value="Kurigram">Kurigram</option>
                                        <option value="Kushtia">Kushtia</option>
                                        <option value="Lakshmipur">Lakshmipur</option>
                                        <option value="Lalmonirhat">Lalmonirhat</option>
                                        <option value="Madaripur">Madaripur</option>
                                        <option value="Magura">Magura</option>
                                        <option value="Manikganj">Manikganj</option>
                                        <option value="Meherpur">Meherpur</option>
                                        <option value="Munshiganj">Munshiganj</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Naogaon">Naogaon</option>
                                        <option value="Narail">Narail</option>
                                        <option value="Narayanganj">Narayanganj</option>
                                        <option value="Narsingdi">Narsingdi</option>
                                        <option value="Natore">Natore</option>
                                        <option value="Netrokona">Netrokona</option>
                                        <option value="Nilphamari">Nilphamari</option>
                                        <option value="Noakhali">Noakhali</option>
                                        <option value="Pabna">Pabna</option>
                                        <option value="Panchagarh">Panchagarh</option>
                                        <option value="Patuakhali">Patuakhali</option>
                                        <option value="Pirojpur">Pirojpur</option>
                                        <option value="Rajbari">Rajbari</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Rangamati">Rangamati</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Satkhira">Satkhira</option>
                                        <option value="Shariatpur">Shariatpur</option>
                                        <option value="Sherpur">Sherpur</option>
                                        <option value="Sirajganj">Sirajganj</option>
                                        <option value="Sunamganj">Sunamganj</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Tangail">Tangail</option>
                                        <option value="Thakurgaon">Thakurgaon</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="thana_upazilla" class='form-label'>Thana / Upazilla <span class='text-red'>*</span></label>
                                    <input type="text" class="form-control" placeholder="" id="thana_upazilla" name="thana_upazilla" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="company" class='form-label'>Company <span class='text-red'>*</span></label>
                                    <input type="text" class="form-control" placeholder="" id="company" name="company" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="address" class='form-label'>Address <span class='text-red'>*</span></label>
                                    <input type="text" class="form-control" placeholder="Road, Building, Floor, and Flat no." id="thana_upazilla" name="address" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="type" class="form-label d-block">Type<span class='text-red'>*</span></label>
                                    <input class="form-check-input" type="radio" id="shipping_billing" value="1" name="type" style="margin-right: 7px;" required="">
                                    <label for="shipping_billing" style="margin-right: 12px;">Shipping & Billing</label>

                                    <input class="form-check-input" type="radio" value="2" id="shipping" name="type" style="margin-right: 7px;">
                                    <label for="shipping" style="margin-right: 12px;">Shipping</label>
                                    <input class="form-check-input" type="radio" value="2" id="billing" name="type" style="margin-right: 7px;">
                                    <label for="billing">Billing</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" name='default_address' id='default_address' value="1" class='form-check-input' style='margin-right: 5px;'>
                                    <label for="default_address">Set as my default address</label>
                                </div>
                                <button name="address_add" type="submit" class="btn btn-primary px-4 py-2 d-inline-block mx-3 mt-2 mb-3" style="width: fit-content;">Submit</button>


                            </div>

                        </form>

                    </div>


                </div>
            </div>
        </section>
<?php
    }
}

include_once('../include/footer.php'); ?>