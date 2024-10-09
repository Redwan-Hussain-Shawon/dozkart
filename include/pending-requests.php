<?php
if(!defined('MYSITE')){
    header("location:../home");
  }
$sql = "SELECT * FROM product_request WHERE user_id = $user_id AND status=1 ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
    <section class="mt-3">
        <div class='bg-light px-3 py-2 rounded-1'>
            Product
        </div>
        <div class='mt-1 d-flex flex-column'>
            <?php while ($data = $result->fetch_assoc()){ ?>
            <div class='px-2 border-bottom py-4 d-flex gap-4 '>
                <div class='bg-light rounded border' style='width: 96px;height:96px'>
                    <?php if (!empty($data['product_image'])) { ?>
                        <img src="<?php base_url('assets/images/request/' . $data['product_image']) ?>" alt="" class="w-100 h-100">
                    <?php } ?>
                </div>
               <div>
               <h3 style="font-size:17px;"><?php echo $data['title'] ?></h3>
                <?php  $props = json_decode($data['props']);
               ?>
                <p class='d-block mt-3'><?php
                foreach($props as $key=>$value){
                    echo $key .':'. $value . '|';
                }
                ?></p>
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