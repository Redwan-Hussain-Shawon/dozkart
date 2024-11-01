<?php define('MYSITE', true);
include_once('../connect/base_url.php');
include_once('../include/helper.php');
protected_area();

?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php');
$user_id = getId();
$sql = "SELECT * FROM notifications WHERE user_id=$user_id ORDER BY id DESC LIMIT 30";
if ($result = $conn->query($sql)) {
?>
    <section class='my-5 px-2'>
        <div class='container'>
            <div class='row'>
                <?php include_once('../include/account-header.php') ?>
                <div class="col-lg-9" style='margin-top: 25px;'>
                        <section class="mt-3">
                            <div class='bg-light px-3 py-2 mb-3 rounded-1'>
                                Notifications
                            </div>
                            <?php if ($result->num_rows > 0) { ?>
                            <div class='mt-1 d-flex flex-column'>
                                <?php while ($data = $result->fetch_assoc()) { ?>
                                    <div class='px-2 border-bottom py-2 d-flex gap-4 '>
                                        <div class='bg-light rounded border' style='width: 96px;height:96px'>
                                            <?php if (!empty($data['img'])) { ?>
                                                <img src=" <?php echo $data['img'] ?>" alt="" class="w-100 h-100">
                                            <?php } ?>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h3 style="font-size:17px;"><?php echo $data['description'] ?></h3>
                                            <p class='d-block mt-1 mb-0 text-primary'><?php echo (new DateTime($data['date']))->diff(new DateTime())->format('%a days ago'); ?></p>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                    } else { ?>
                        <div class='py-5'>
                            <div class='d-flex flex-column flex-md-row justify-content-center align-items-center py-5' style="row-gap: 30px;column-gap:80px">
                                <div class="d-flex justify-content-center">
                                    <img src="<?php base_url('assets/img/empty-box.png') ?>" alt="empty image" width="200" height="200">
                                </div>
                                <div class="">
                                    <div>
                                        <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Empty</h2>
                                        <h3 class="text-base fw-normal h6 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start">You don't have any notifications yet.</h3>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php     } ?>
                        </section>
                  
                </div>
            </div>

        </div>
    </section>

<?php }

include_once('../include/footer.php'); ?>