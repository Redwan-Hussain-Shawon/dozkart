<?php define('MYSITE',true);
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
?>
        <section class='my-5 px-2'>
            <div class='container'>
                <div class='row'>
                    <?php include_once('../include/account-header.php') ?>
                    <div class="col-lg-9" style='margin-top: 42px;'>
                        <h4 class='border-bottom pb-3'>Edit Profile</h4>
                        <form action="<?php base_url('assets/php/core.php') ?>" method="post">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="name" class='form-label'>Name</label>
                                    <input type="text" class="form-control mb-3" value="<?php echo $data['name'] ?>" placeholder="enter full name" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class='form-label'>Date of Birth</label>
                                    <input type="date" class="form-control mb-3" value="<?php echo $data['date_of_birth'] ?>" placeholder="enter date of birth" id="date_of_birth" name="date_of_birth" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class='form-label'>Phone</label>
                                    <input type="number" class="form-control mb-3" value="<?php echo $data['phone'] ?>" placeholder="enter phone number" name="phone" id="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class='form-label d-block'>Gender</label>
                                    <input class="form-check-input" type="radio" <?php echo $data['gender']=='Male'?'checked':'' ?>  id="male" value="Male" name='gender' style='margin-right: 7px;' required>
                                    <label for="male" style='margin-right: 12px;'>Male</label>
                                    <input class="form-check-input" type="radio" value="Female" id="female" name='gender' <?php echo $data['gender']=='Female'?'checked':'' ?> style='margin-right: 7px;'>
                                    <label for="female" style='margin-right: 12px;'>Female</label>
                                    <input class="form-check-input" type="radio" value="Other" id="other" <?php echo $data['gender']=='Other'?'checked':'' ?> name='gender' style='margin-right: 7px;'>
                                    <label for="other">Other</label>
                                </div>

                                <button name='submit_details_user' type="submit" class='btn btn-primary px-4 d-inline-block mx-3 mt-2 mb-3' style='width: fit-content;'>Submit</button>
                            </div>
                        </form>
                        <?php if($data['image_url'] === null){ ?>
                        <div class='px-2'>
                            <h5 class='border-bottom pb-3 mt-4 mb-3'>Change Password</h5>
                        </div>
                        <form action="<?php base_url('assets/php/core.php') ?>" method="post">
                        <div class="row">
                        <div class="col-md-6">
                            <label for="password" class='form-label d-block'>Current Password</label>
                            <input type="password" class="form-control mb-3 <?php echo formError('password')!=false?'border-danger':'' ?>" placeholder="enter current password" value="<?php old_value('password') !== false ? old_value('password') : ''; ?>" id="password" name="password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nPassword" class='form-label d-block'>New Password</label>
                            <input type="password" class="form-control mb-3 <?php echo formError('nPassword')!=false?'border-danger':'' ?>" placeholder="enter new password" id="nPassword" name="nPassword" required >
                        </div>
                        <button name='passwor_change__user' type="submit" class='btn btn-primary px-4 d-inline-block mx-3 mt-2 mb-3' style='width: fit-content;'>Submit</button>
                        </div>
                        </form>
                        <?php }  ?>

                    </div>


                </div>
            </div>
        </section>
<?php
    }
}
include_once('../include/footer.php'); ?>