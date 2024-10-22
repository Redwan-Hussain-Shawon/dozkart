<?php define('MYSITE',true);
  include_once('../vendor/autoload.php');
include_once('../include/helper.php');
include_once("../connect/conn.php");
protected_area();

include_once('../connect/base_url.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = getId();
    $id = mysqli_real_escape_string($conn,base64_decode($_GET['id']));
    $sql = "SELECT * FROM address WHERE id=$id";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
?>
            <?php include_once('../include/header.php') ?>
            <?php include_once('../include/header_main.php');

            ?>
            <section class='my-5 px-2'>
                <div class='container'>
                    <div class='row'>
                        <?php include_once('../include/account-header.php') ?>
                        <div class="col-lg-9" style='margin-top: 42px;'>
                            <div class='border-bottom pb-3 d-flex align-items-center justify-content-between'>
                                <h4 class='fw-semibold'>Update Address</h4>
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
                                        <input type="number" class="form-control" placeholder="Type postal code to fill up state/district and upazilla" id="postal_code" name="postal_code" required value="<?php echo $data['postal_code'] ?>" >
                                        <span class='text-red'>To get your district and upazila please write your correct postal code</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="coundistricttry" class='form-label'>District <span class='text-red'>*</span></label>
                                        <select name="district" id="district" class='form-select mb-4' required>
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
                                        <input type="hidden" id='district-main-value' value="<?php echo $data['district'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="thana_upazilla" class='form-label'>Thana / Upazilla <span class='text-red'>*</span></label>
                                        <input type="text" class="form-control" placeholder="" id="thana_upazilla" name="thana_upazilla" required value="<?php echo $data['thana_upazilla'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="company" class='form-label'>Company <span class='text-red'>*</span></label>
                                        <input type="text" class="form-control" placeholder="" id="company" name="company" required value="<?php echo $data['company'] ?>">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="address" class='form-label'>Address <span class='text-red'>*</span></label>
                                        <input type="text" class="form-control" placeholder="Road, Building, Floor, and Flat no." id="address" name="address" required value="<?php echo $data['address'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="type" class="form-label d-block">Type<span class='text-red'>*</span></label>
                                        <input class="form-check-input" type="radio" id="shipping_billing"  value="1" name="type" style="margin-right: 7px;" required <?php echo $data['type']==1?'checked':''  ?> >
                                        <label for="shipping_billing" style="margin-right: 12px;">Shipping & Billing</label>

                                        <input class="form-check-input" type="radio" value="2" id="shipping" name="type" style="margin-right: 7px;" <?php echo $data['type']==2?'checked':''  ?>>
                                        <label for="shipping" style="margin-right: 12px;">Shipping</label>
                                        <input class="form-check-input" type="radio" value="2" id="billing" name="type" style="margin-right: 7px;" <?php echo $data['type']==3?'checked':''  ?>>
                                        <label for="billing">Billing</label>
                                        <input type="hidden" name='address_id' value='<?php echo $_GET['id'] ?>'>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <input type="checkbox" name='default_address' id='default_address' value="1" class='form-check-input' style='margin-right: 5px;' <?php echo $data['default_address'] == 1?'checked':'' ?>>
                                        <label for="default_address">Set as my default address</label>
                                    </div>
                                    <button name="address_update" type="submit" class="btn btn-primary px-4 py-2 d-inline-block mx-3 mt-2 mb-3" style="width: fit-content;">Submit</button>
                                </div>

                            </form>

                        </div>


                    </div>
                </div>
            </section>


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
            include_once('../include/footer.php');
        } else {
            header('Location:404.php');
        }
    }else{
        header('Location: '.base_url1('404.php'));
    }
} else {
    header('Location:404.php');
}
?>