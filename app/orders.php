<?php define('MYSITE', true);
include_once('../include/helper.php');
protected_area();
include_once('../connect/base_url.php');
?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php');
$user_id = getId();
$sql = "SELECT 
    o.id,
    o.product_slug,
    o.status,
    o.amount,
    o.original_amount,
    p.product_title
FROM 
    orders o
JOIN 
    products p ON o.product_slug = p.product_slug
WHERE o.user_id=$user_id AND o.status!=8 ORDER BY o.id DESC
";
$result = $conn->query($sql);

?>
<section class='my-5 px-2'>
  <div class='container'>
    <div class='row'>
      <?php include_once('../include/account-header.php') ?>
      <div class="col-lg-9" style='margin-top: 25px;'>
        <div class='border-bottom pb-1 d-flex align-items-center justify-content-between'>
          <h4 class='fw-bold'>My Orders</h4>
        </div>
        <?php if ($result->num_rows > 0) {
            while ($order_data = $result->fetch_assoc()) {
    ?>
        <div class=" rounded order-card shadow">
          <div class="p-3">
            <div>
              <h4 style="font-weight: 500;font-size:19px" class="line-clamp-3"><?= $order_data['product_title'] ?></h4>
              <table class="table table- text-light mt-2">
                <tbody>
                  <tr>
                    <td class="fw-semibold" style="font-size: 15px;">Total</td>
                    <td class="h6 fw-semibold text-primary text-end" style="font-size: 15px;text-align: left !important;">BDT <?= $order_data['original_amount'] ?></td>
                  </tr>
                  <tr>
                    <td class="fw-medium" style="font-size: 15px;">Advance Payment:</td>
                    <td class="h6 fw-semibold text-end" style="font-size: 15px;text-align: left !important;">BDT <?= $order_data['amount'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="fw-medium" style="font-size: 15px;">Cash on Payment:</td>
                    <td class="h6 fw-semibold text-end" style="font-size: 15px;text-align: left !important;">BDT <?= $order_data['original_amount']-$order_data['amount'] ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="<?php base_url('invoice/'.$order_data['id']) ?>" target="_blank"><button class="btn btn-primary">Download Invoice</button></a>

            </div>
          </div>
          <?php 
          	// 1.Order Processing 2.Ready to Export, 3.Custom, 4.Warehouse, 5.Deliver, 6.Complete 7.Order Cancel 8.order check	
          $orderStatus= $order_data['status'];
          ?>
          <div class="order-progress-container">
            <h2>Order Progress</h2>
            <?php if($orderStatus==7){ ?>
              <div class="alert alert-danger text-center px-4 px-md-5 mx-auto" style="width: fit-content; background-color: #f8d7da; color: #721c24; border: 2px solid #ffb7bf;border-radius: 4px;">
    <strong>Order Canceled!</strong><br>
    We're sorry, but your order has been canceled. Your payment will be refunded soon.
</div>

              <?php }else if($orderStatus==6){?>
                <div class="alert alert-success text-center px-4 px-md-5 mx-auto " style="width: fit-content; background-color: #d4edda; color: #155724; border: 2px solid #c3e6cb; border-radius: 4px;">
    <strong>Order Successful!</strong><br>
    Your order has been successfully completed. Thank you for your purchase! Stay with us for more great deals.
</div>

               <?php }else{ ?>
            <div class="overflow-x-auto">
              <ul class="order-progress-bar" style="min-width: 500px;">
                <li class="step steps-1 <?php echo $orderStatus == 2 || $orderStatus == 3 || $orderStatus == 4 || $orderStatus == 5 ? 'completed' : ''; ?>">
                  <span class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048">
                      <path fill="currentColor" d="M1930 630q0 46-10 86l123 51l-48 118l-124-51q-47 74-121 121l51 124l-118 49l-51-124q-40 10-86 10t-86-10l-51 124l-118-49l51-124q-74-47-121-121l-124 51l-49-118l124-51q-10-40-10-86t10-86l-124-51l49-118l124 51q47-74 121-121l-51-123l118-49l51 123q40-10 86-10t86 10l51-123l118 49l-51 123q74 47 121 121l124-51l48 118l-123 51q10 40 10 86m-384 256q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m-438 162l49 119l-137 56q14 56 14 111t-14 111l137 57l-49 118l-137-57q-30 51-68 88t-88 69l57 137l-119 48l-56-137q-56 14-111 14t-111-14l-57 137l-118-48l57-137q-51-32-88-69t-69-88l-137 57l-48-118l137-57q-14-56-14-111t14-111l-137-56l48-119l137 57q32-50 69-88t88-68l-57-137l118-49l57 137q56-14 111-14t111 14l56-137l119 49l-57 137q97 59 156 156zm-522 606q66 0 124-25t101-68t69-102t26-125t-25-124t-69-101t-102-69t-124-26t-124 25t-102 69t-69 102t-25 124t25 124t68 102t102 69t125 25m1206 394v-768h128v768zm-384 0v-768h128v768z" />
                    </svg>
                  </span>
                  <span class="step-label">Order Processing</span>
                </li>
                <li class="step <?php echo  $orderStatus == 3 || $orderStatus == 4 || $orderStatus == 5 ? 'completed' : ''; ?>">
                  <span class="step-icon">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M22 4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1zM4 15h3.416a5.001 5.001 0 0 0 9.168 0H20v4H4zM4 5h16v8h-5a3 3 0 1 1-6 0H4zm12 6h-3v3h-2v-3H8l4-4.5z" />
                    </svg>
                  </span>
                  <span class="step-label">Ready to Export</span>
                </li>

                <li class="step <?php echo  $orderStatus == 4 || $orderStatus == 5 ? 'completed' : ''; ?>" id="step-6">
                  <span class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64 64">
                      <path fill="currentColor" d="M60.21 47v-.06A7.49 7.49 0 0 0 51 41.7c-3.41 1-8.09 2.4-11.62 3.42a4.68 4.68 0 0 0-.09-3.12c-.9-2.25-3.41-3.26-5.51-3.26H24a3.94 3.94 0 0 1-2.58-1.2a5.65 5.65 0 0 0-3.84-1.5H9.67a6.34 6.34 0 0 0-6.21 6.46v12.59a6.46 6.46 0 0 0 6.32 6.58h9.51a6.13 6.13 0 0 0 3.42-1.06h.1A18.75 18.75 0 0 0 31.87 63a18.5 18.5 0 0 0 5.56-.84l17.66-5.39h.13A7.74 7.74 0 0 0 60.21 47M9.78 57.67a2.46 2.46 0 0 1-2.32-2.58V42.54a2.34 2.34 0 0 1 2.21-2.46h7.9a1.63 1.63 0 0 1 1.14.45a11 11 0 0 0 .94.75v16.35a2 2 0 0 1-.36 0ZM53.86 53l-17.62 5.34a14.3 14.3 0 0 1-4.37.66a14.8 14.8 0 0 1-7.16-1.85l-1.06-.57V42.76h10.13a2.08 2.08 0 0 1 1.8.75c.14.36-.12 1.55-2.15 3.48l-1.15 1.11l.79 1.37c.81 1.4 1.6 1.17 4.94.22c1.58-.45 3.69-1.06 5.79-1.68c4.18-1.22 8.36-2.47 8.36-2.47a3.53 3.53 0 0 1 4.21 2.53A3.76 3.76 0 0 1 53.86 53m-3.31-37.39a7.31 7.31 0 1 0-7.31-7.3a7.32 7.32 0 0 0 7.31 7.3m0-10.61a3.31 3.31 0 1 1-3.31 3.31A3.31 3.31 0 0 1 50.55 5m-2.37 32.38h3.3a7.26 7.26 0 0 0 7.25-7.25v-5.69a7.26 7.26 0 0 0-7.25-7.25h-3a7.26 7.26 0 0 0-7.25 7.25v5.66a7.22 7.22 0 0 0 6.95 7.28m-2.94-12.94a3.25 3.25 0 0 1 3.25-3.25h3a3.26 3.26 0 0 1 3.25 3.25v5.69a3.26 3.26 0 0 1-3.25 3.25h-3.3a3.2 3.2 0 0 1-2.94-3.32Z" />
                    </svg>
                  </span>
                  <span class="step-label">Custom</span>
                </li>

                <!-- Delivered step -->
                <li class="step <?php echo   $orderStatus == 5 ? 'completed' : ''; ?>" id="step-7">
                  <span class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                      <path fill="currentColor" d="M240 184h-8V57.9l9.67-2.08a8 8 0 1 0-3.35-15.64l-224 48A8 8 0 0 0 16 104a8 8 0 0 0 1.69-.18l6.31-1.35V184h-8a8 8 0 0 0 0 16h224a8 8 0 0 0 0-16M40 99l176-37.67V184h-24v-56a8 8 0 0 0-8-8H72a8 8 0 0 0-8 8v56H40Zm136 53H80v-16h96Zm-96 16h96v16H80Z" />
                    </svg>
                  </span>
                  <span class="step-label">Warehouse</span>
                </li>
                <li class="step " id="step-7">
                  <span class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                      <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                        <circle cx="17" cy="19" r="2" />
                        <circle cx="7" cy="19" r="2" />
                        <path d="M2 9v4.947c0 2.382 0 3.573.732 4.313c.487.492 1.171.657 2.268.712M12.427 5c.913.3 1.63 1.024 1.926 1.947c.147.456.147 1.02.147 2.15c0 .752 0 1.128.098 1.432a2.01 2.01 0 0 0 1.284 1.298c.301.099.673.099 1.418.099H22v2.021c0 2.382 0 3.573-.732 4.313c-.487.492-1.171.657-2.268.712M9 19h6" />
                        <path d="M14.5 7h1.821c1.456 0 2.183 0 2.775.354c.593.353.938.994 1.628 2.276L22 12M7.327 8l1.486-1.174C9.604 6.2 10 5.888 10 5.5M7.327 3l1.486 1.174C9.604 4.8 10 5.112 10 5.5m0 0H2" />
                      </g>
                    </svg>
                  </span>
                  <span class="step-label">Deliver</span>
                </li>
              </ul>
            </div>
            <?php } ?>
          </div>
          <!-- </div> -->
        </div>
        <?php 
              
      }
        }else{ ?>
<div class="alert mt-3 alert-danger text-center px-4 px-md-5 mx-auto" style="background-color: #f8d7da; color: #721c24; border: 2px solid #f5c6cb; border-radius:4px;">
    <strong>No Orders Found!</strong><br>
    You don't have any active orders at the moment. Please make a purchase to continue.
</div>

        <?php  } ?>
      </div>
    </div>
</section>


<?php

include_once('../include/footer.php'); ?>