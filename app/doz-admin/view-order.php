<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include_once('../../connect/conn.php');
include_once('../../connect/base_url.php');
include_once('include/helper.php');
if (isset($_GET['status']) && !empty($_GET['status'])) {
  $status = mysqli_real_escape_string($conn, trim($_GET['status']));
  $sql = "UPDATE orders SET status=$status";
  if ($conn->query($sql)) {
    $id = $_GET['id'];
    $sql_not = "SELECT user_id FROM orders WHERE id=$id";
    $result_not = $conn->query($sql_not);
    $data_not = $result_not->fetch_assoc();
    $user_id = $data_not['user_id'];
    notifications($user_id,'Congratulations Your order has been '.getOrderStatus($status));
    alert('success', 'Order has been updated successfully.');
    header('location:vieworder?id=' . $_GET['id']);
    exit();
  }
}
include_once('include/header.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = trim($_GET['id']);
  $sql = "SELECT
    orders.*,
    products.product_title,
    products.product_url_link,
    product_image.image_url,
    user.name,
    address.*
FROM orders
LEFT JOIN products ON orders.product_slug = products.product_slug
LEFT JOIN address ON orders.address_id = address.id
JOIN product_image ON orders.product_slug = product_image.product_slug
JOIN user ON orders.user_id = user.id
JOIN transactions ON orders.bank_tran_id = transactions.bank_tran_id
WHERE orders.id = $id AND orders.status != 8
GROUP BY products.product_id";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
?>
    <div class="content-wrapper">


      <div class="container-xxl flex-grow-1 container-p-y">


        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">

          <div class="d-flex flex-column justify-content-center">
            <div class="mb-1">
              <span class="h5">Order #<?= $id ?> </span>
              <span class="badge bg-label-info" style="margin-left: 10px;"><?= getOrderStatus($data['status']) ?></span>
            </div>
            <p class="mb-0"><?= date('F d, Y, h:i A', strtotime($data['date'])) ?></p>
          </div>
          <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle btn-label-secondary py-2" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <span><i class="bx bx-export me-2 bx-xs"></i>Update Status</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
              <?php if ($data['status'] != 1): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=1&id=' . $id); ?>"
                    onclick="return confirm('Are you sure you want to move this order to Processing status?')"
                    title="Order is being processed for fulfillment">
                    Processing
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($data['status'] != 2): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=2&id=' . $id); ?>"
                    onclick="return confirm('Confirm marking this order as Ready to Export?')"
                    title="Order is packed and ready for export">
                    Ready to Export
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($data['status'] != 3): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=3&id=' . $id); ?>"
                    onclick="return confirm('Move this order to Custom clearance?')"
                    title="Order is at customs for inspection and clearance">
                    Custom
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($data['status'] != 4): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=4&id=' . $id); ?>"
                    onclick="return confirm('Mark this order as stored in the Warehouse?')"
                    title="Order is currently stored in the warehouse">
                    Warehouse
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($data['status'] != 5): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=5&id=' . $id); ?>"
                    onclick="return confirm('Proceed to mark this order as Delivered?')"
                    title="Order is out for delivery">
                    Deliver
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($data['status'] != 6): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=6&id=' . $id); ?>"
                    onclick="return confirm('Confirm that this order is Completed?')"
                    title="Order is fully completed and closed">
                    Complete
                  </a>
                </li>
              <?php endif; ?>

              <?php if ($data['status'] != 7): ?>
                <li>
                  <a class="dropdown-item"
                    href="<?php echo base_url('admin-doz/vieworder?status=7&id=' . $id); ?>"
                    onclick="return confirm('Are you sure you want to cancel this order?')"
                    title="Order has been canceled and is no longer active">
                    Order Cancel
                  </a>
                </li>
              <?php endif; ?>
            </ul>



          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="card mb-6">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0">Order details</h5>
              </div>
              <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                  <table class="datatables-order-details table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" style="width: 918px;">
                    <thead>
                      <tr>
                        <th class="w-50 sorting_disabled" rowspan="1" colspan="1" style="width: 359px;" aria-label="products">products</th>
                        <th class="w-25 sorting_disabled" rowspan="1" colspan="1" style="width: 156px;" aria-label="price">Live Link</th>
                        <th class="w-25 sorting_disabled" rowspan="1" colspan="1" style="width: 147px;" aria-label="qty">qty</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="sorting_1" style='width:65%'>
                          <div class="d-flex justify-content-start align-items-center text-nowrap">
                            <div class="avatar-wrapper">
                              <div class=" me-3" style='width:80px !important;height:80px'><img src="<?php base_url('assets/upload/' . $data['image_url']) ?>" alt="product-Wooden Chair" class="rounded-2 w-100"></div>
                            </div>
                            <div class="d-flex flex-column" style="width:100%;">
                              <h6 class="text-heading mb-0 text-wrap"><?= $data['product_title'] ?></h6>
                            </div>
                          </div>
                        </td>
                        <td><a href="<?php echo $data['product_url_link'] ?>" target="_blank">Link</a></td>
                        <td><span class="text-body"><?php echo $data['product_qunty'] ?></span></td>
                      </tr>

                    </tbody>
                  </table>
                  <div style="width: 1%;"></div>
                </div>
                <div class="d-flex justify-content-end align-items-center m-6 mb-2">
                  <div class="order-calculations">
                    <div class="d-flex justify-content-start mb-2">
                      <span class=" text-heading">Total:</span>
                      <h6 class="mb-0" style='margin-left: 5px;'>BDT <?php echo $data['original_amount'] ?></h6>
                    </div>
                    <div class="d-flex justify-content-start mb-2">
                      <span class="text-heading">Advance Payment: </span>
                      <h6 class="mb-0" style='margin-left: 5px;'>BDT <?php echo $data['amount'] ?></h6>
                    </div>
                    <div class="d-flex justify-content-start mb-2">
                      <span class="text-heading">Cash on Payment: </span>
                      <h6 class="mb-0" style='margin-left: 5px;'>BDT <?= $data['original_amount'] - $data['amount'] ?></h6>
                    </div>


                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-6">
              <div class="card-header">
                <h5 class="card-title m-0">Product details</h5>
              </div>
              <div class="card-body">
              <?php if($data['product_color_id'] !== null){
                    $color_id = $data['product_color_id'];
                  $sql = "SELECT color_name FROM product_color WHERE color_id=$color_id";
                  if($result = $conn->query($sql)){
                    if($result->num_rows>0){
                      $color_data = $result->fetch_assoc();
                  ?>
                     <div class="d-flex">
 <h6 class="mb-1">Color : </h6>
 <p style="margin-left: 8px;"><?php echo $color_data['color_name'] ?></p>
                     </div>
                  <?php
                
                  }
                }
                } ?>
               <?php if(!empty($data['instruction'])){ ?>
                <div class="d-flex">
                  <h6 class="mb-1">Instruction : </h6>
                  <p style="margin-left: 8px;"><?php echo $data['instruction'] ?></p>
                </div>

                <?php } ?>
               
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card mb-6">
              <div class="card-header">
                <h5 class="card-title m-0">Customer details</h5>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-start align-items-center mb-6">
                  <div class="avatar me-3 ">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMqI4dJM6gAS7v_jKJy0_bCkeqZpZ-_vPO67WSQpi-9wqkdqScFvd57VvMG3qS2NnbzXU&usqp=CAU" alt="Avatar" class="rounded-circle border">
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-0"><?php echo $data['name'] ?></h6>
                    <span>Customer ID: #<?php echo $data['id'] ?></span>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <h6 class="mb-1">Contact info</h6>
                </div>
                <p class=" mb-1">Email: <?php echo $data['email'] ?></p>
                <p class=" mb-0">Mobile: <?php echo $data['phone'] ?></p>
              </div>
            </div>

            <div class="card mb-6">
              <div class="card-header pb-2">
                <h5 class="card-title m-0">Address</h5>
              </div>
              <div class="card-body">
                <p class="mb-0 ">
                  District: <?php echo $data['district']; ?><br>
                  Thana Upazilla: <?php echo $data['thana_upazilla']; ?><br>
                  Postal Code: <?php echo $data['postal_code']; ?><br>
                  Country: <?php echo $data['country']; ?><br>
                  Address: <?php echo $data['address']; ?>
                </p>
              </div>
            </div>
            <div class="card mb-6">
              <div class="card-header pb-2">
                <h5 class="card-title m-0">Transaction Details</h5>
              </div>
              <div class="card-body">
                <p class="mb-1">Transaction ID: <?php echo $data['tran_id']; ?></p>
                <p class="mb-1">Validation ID: <?php echo $data['val_id']; ?></p>
                <p class="mb-1">Amount: <?php echo $data['amount']; ?> BDT</p>
                <p class="mb-1">Original Amount: <?php echo $data['original_amount']; ?> BDT</p>
                <p class="mb-1">Card Type: <?php echo $data['card_type']; ?></p>
                <p class="mb-1">Store Amount: <?php echo $data['store_amount']; ?> BDT</p>
                <p class="mb-1">Bank Transaction ID: <?php echo $data['bank_tran_id']; ?></p>
                <p class="mb-1">Transaction Date: <?php echo $data['tran_date']; ?></p>
                <p class="mb-1">Currency: <?php echo $data['currency']; ?></p>
                <p class="mb-1">Card Issuer: <?php echo $data['card_issuer']; ?></p>
                <p class="mb-1">Card Brand: <?php echo $data['card_brand']; ?></p>
                <p class="mb-1">Card Sub-Brand: <?php echo $data['card_sub_brand']; ?></p>
              </div>
            </div>
          </div>
        </div>






      </div>
      <!-- / Content -->




      <!-- Footer -->
      <footer class="content-footer footer bg-footer-theme">

      </footer>
      <!-- / Footer -->

    </div>
<?php
  }
}
include_once('include/footer.php');

?>