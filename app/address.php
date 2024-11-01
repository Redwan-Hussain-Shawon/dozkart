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
?>
        <section class='my-5 px-2'>
            <div class='container'>
                <div class='row'>
                    <?php include_once('../include/account-header.php') ?>
                    <div class="col-lg-9" style='margin-top: 25px;'>
                        <div class='border-bottom pb-3 d-flex align-items-center justify-content-between'>
                            <h4 class='fw-semibold'>Address Book</h4>
                            <a href="<?php base_url('create-address') ?>" class='btn btn-primary px-3 text-white'>Add New Address</a>
                        </div>
                        <?php
                        $sql = "SELECT * FROM address WHERE user_id = $user_id ORDER BY default_address DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {  ?>
                            <div class="row mt-4 gy-4">
                                <?php while ($data = $result->fetch_assoc()) { ?>
                                    <div class="col-md-6">
                                        <div class="p-3 rounded-1" style="background-color: #f3f4f6;">
                                            <h3 class='h5 text-primary mb-1 d-flex align-items-center justify-content-between' style='font-size: 16px;'><?php echo $data['default_address'] == 1 ? 'Default Delivery Address' : 'Address' ?>
                                            <?php $encrypted_id=  base64_encode($data['id']) ?>
                                                <a class='pointer btn hover-primary' href='<?php base_url('update-address/' . $encrypted_id) ?>'>
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" class="svg-inline--fa fa-pen-to-square w-4 inline-block text-gray-400 group-hover:text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 16px; height: 16px;">
                                                        <path fill="currentColor" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path>
                                                    </svg>
                                                </a>
                                            </h3>
                                            <h2 class='h5' style='font-size: 18px;'><?php echo $data['name'] ?></h2>
                                            <p style='font-size: 16px;' class='mb-1'><?php echo $data['phone'] ?></p>
                                            <p style='font-size: 16px;' class='mb-1'><?php echo $data['email'] ?></p>
                                            <p style='font-size: 16px;' class='mb-1'><?php echo $data['thana_upazilla'] ?></p>
                                            <p style='font-size: 16px;' class='mb-1'><?php echo $data['address'] . ' ';
                                                                                        echo $data['postal_code'] ?> </p>
                                            <p style='font-size: 16px;' class='mb-1'><?php echo $data['district'] . ' ';
                                                                                        echo 'BD' ?> </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        <?php } else { ?>
                            <div class='py-5'>
                                <div class='d-flex flex-column flex-md-row justify-content-center align-items-center py-5' style="row-gap: 30px;column-gap:80px">
                                    <div class="d-flex justify-content-center">
                                        <img src="<?php base_url('assets/img/empty-box.png') ?>" alt="empty image" width="200" height="200">
                                    </div>
                                    <div class="">
                                        <div>
                                            <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Empty</h2>
                                            <h3 class="text-base fw-normal h6 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start">You don't have any address yet.</h3>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                </div>
            </div>
        </section>


<?php
    }
}

include_once('../include/footer.php'); ?>