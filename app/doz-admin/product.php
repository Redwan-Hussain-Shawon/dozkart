<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start(); 
}
include_once ('../../connect/base_url.php');
include_once ('../../connect/conn.php');
include_once ('include/helper.php');


if(isset($_GET['status']) && !empty($_GET['status'])){
  $status = mysqli_real_escape_string($conn,trim($_GET['status']));
  $id = mysqli_real_escape_string($conn,trim($_GET['id']));
  $sql = "UPDATE products SET status=$status WHERE product_id=$id";
  if($conn->query($sql)){
   alert('success',"products has been updated successfully.");
   redirect('admin-doz/show-product');
}
}

if(isset($_GET['delete']) && !empty($_GET['delete'])){
  $id = mysqli_real_escape_string($conn,trim($_GET['id']));
  $sql = "DELETE FROM products  WHERE product_id=$id";
  if($conn->query($sql)){
   alert('success',"products has been deleted successfully.");
   redirect('admin-doz/show-product');
}
}


include_once('include/header.php');

$sql = "SELECT products.product_id, products.product_title, products.product_price,products.status, product_category.category_name, product_image.image_url
        FROM products
        JOIN product_category ON products.product_category = product_category.category_slug
        JOIN product_image ON products.product_slug = product_image.product_slug
        GROUP BY products.product_slug
        ORDER BY products.product_id DESC
        ";



$result = $conn->query($sql);
?>

<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
  <h5 class="card-header">Product List</h5>
  <div class="table-responsive text-nowrap">

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Product Title</th>
          <th>Product Category</th>
          <th>Product Price </th>
          <th>Product Image </th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
            <tbody class="table-border-bottom-0">
           <?php
           $i = 1;
           while($data = $result->fetch_assoc()){
            ?>
          <tr>
          <td><?= $i ?></td>
          <td><?= shortenText($data['product_title'],60) ?></td>
          <td><?= $data['category_name']?></td>
          <td><?= $data['product_price']?></td>
          <td><img src="<?= base_url('assets/upload/'.$data['image_url'])?>" class="rounded-1"  style='width:60px;height:60px;'/></td>
          <td>
  <?php if($data['status'] == 1) { ?>
    <span class="badge bg-label-primary me-1">Active</span>
  <?php } else { ?>
    <span class="badge bg-label-danger me-1">Inactive</span>
  <?php } ?>
</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" onclick="return confirm('Are you sure you want to active this product category?')"  href="<?php base_url('admin-doz/show-product?status=1&id='.$data['product_id']) ?>">Active </a>
                <a onclick="return confirm('Are you sure you want to deactivate this product category?')" class="dropdown-item" href="<?php base_url('admin-doz/show-product?status=2&id='.$data['product_id']) ?>"> Inactive</a> 
                  <a onclick="return confirm('Are you sure you want to Delete this product category?')" class="dropdown-item" href="<?php base_url('admin-doz/show-product?delete=2&id='.$data['product_id']) ?>"> Delete</a>
                <a  class="dropdown-item" href="<?php base_url('admin-doz/view-product?id='.$data['product_id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
        <?php 
      $i++;
      } ?>
               
      </tbody>
    </table>
  </div>
</div>

    </div>

</div>


<script src="<?php base_url('app/doz-admin/assets/js/ivis_edtor.js') ?>"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#product_description'))
        .catch(error => {
            console.error('There was a problem initializing the editor:', error);
        });
</script>
<?php
include_once('include/footer.php');

?>