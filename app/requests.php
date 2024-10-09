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
                            <h4 class='fw-semibold'>My Requests</h4>
                            <a href="<?php base_url('create-request') ?>" class='btn btn-primary px-3 text-white'>Create New Request</a>
                        </div>

                        <div class="row border-bottom border-2 mt-2">
                            <div class="col-3 px-0 text-center">
                                <a href="<?php base_url('requests') ?>" class='<?php echo $pagePath == 'requests' ? 'border-4 border-primary border-bottom' : '' ?> py-3 d-block' style='transform: translateY(3px);'>Approved</a>
                            </div>
                            <div class="col-3 px-0 text-center">
                                <a href="<?php base_url('pending-requests') ?>" class='<?php echo $pagePath == 'pending-requests' ? 'border-4 border-primary border-bottom' : '' ?> py-3 d-block' style='transform: translateY(3px);'>Pending</a>
                            </div>
                            <div class="col-3 px-0 text-center">
                                <a href="<?php base_url('rejected-requests') ?>" class='<?php echo $pagePath == 'rejected-requests' ? 'border-4 border-primary border-bottom' : '' ?> py-3 d-block' style='transform: translateY(3px);'>Rejected</a>
                            </div>
                            <div class="col-3 px-0 text-center">
                                <a href="<?php base_url('expired-requests') ?>" class='<?php echo $pagePath == 'expired-requests' ? 'border-4 border-primary border-bottom' : '' ?> py-3 d-block' style='transform: translateY(3px);'>Expired</a>
                            </div>
                        </div>
                        <?php if ($pagePath == 'pending-requests') {
                            include_once('../include/pending-requests.php');
                        } else if ($pagePath == 'rejected-requests') {
                            include_once('../include/rejected-requests.php');
                        } else if ($pagePath == 'expired-requests') { ?>
                            <div class="py-5">
                                <div class="d-flex flex-column flex-md-row justify-content-center align-items-center py-5" style="row-gap: 30px;column-gap:80px">
                                    <div class="d-flex justify-content-center">
                                        <img src="<?php base_url('assets/img/empty-box.png') ?>" alt="empty image" width="200" height="200">
                                    </div>
                                    <div class="">
                                        <div>
                                            <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Empty</h2>
                                            <h3 class="text-base fw-normal h6 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start">You don't have any requests right now.</h3>
                                            <div class="d-flex justify-content-md-start mt-3 justify-content-center">
                                                <a class="bg-primary text-white rounded px-4 py-2" href="<?php base_url('create-request') ?>">Make Request</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } else if ($pagePath == 'requests') { ?>
                            <?php $sql = "SELECT * FROM product_request WHERE user_id = $user_id AND status=2 ORDER BY id DESC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            ?>
                                <section class="mt-3">
                                    <div class="bg-light px-3 py-2 rounded-1">
                                    Approved Product
                                    </div>
                                    <div class='mt-1 d-flex flex-column '>
                                        <?php while ($data = $result->fetch_assoc()) { ?>
                                            <div class='px-2 border-bottom py-4 d-flex gap-4 '>
                                                <div class='bg-light rounded border' style='width: 96px;height:96px'>
                                                    <?php if (!empty($data['product_image'])) { ?>
                                                        <img src="<?php base_url('assets/images/request/' . $data['product_image']) ?>" alt="" class="w-100 h-100">
                                                    <?php } ?>
                                                </div>
                                                <div>
                                                    <h3 style="font-size:17px;"><?php echo $data['title'] ?></h3>
                                                    <?php $props = json_decode($data['props']);
                                                    ?>
                                                    <p class='d-block mt-2 mb-1'><?php
                                                                                    foreach ($props as $key => $value) {
                                                                                        echo $key . ':' . $value . '|';
                                                                                    }
                                                                                    ?></p>
                                                    <h3 class="h5 mt-1 text-primary fw-bold">BDT <?php echo $data['prize'] ?></h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </section>
                            <?php
                            } else { ?>
                                <div class="py-5">
                                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center py-5" style="row-gap: 30px;column-gap:80px">
                                        <div class="d-flex justify-content-center">
                                            <img src="<?php base_url('assets/img/empty-box.png') ?>" alt="empty image" width="200" height="200">
                                        </div>
                                        <div class="">
                                            <div>
                                                <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Empty</h2>
                                                <h3 class="text-base fw-normal h6 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start">You don't have any requests right now.</h3>
                                                <div class="d-flex justify-content-md-start mt-3 justify-content-center">
                                                    <a class="bg-primary text-white rounded px-4 py-2" href="<?php base_url('create-request') ?>">Make Request</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                    <?php
                        }
                    } ?>
                    </div>


                </div>
            </div>
        </section>
    <?php
}

include_once('../include/footer.php'); ?>