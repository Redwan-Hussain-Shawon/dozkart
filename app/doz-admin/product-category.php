<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
include_once ('../../connect/base_url.php');
include_once ('../../connect/conn.php');
include_once ('include/helper.php');


if(isset($_POST['category_submit'])){
    $category_name = mysqli_real_escape_string($conn,trim($_POST['category_name']));
    $payment_advance = mysqli_real_escape_string($conn,trim($_POST['payment_advance']));
    $category_slug = generateSlug($category_name);
    $sql = "SELECT * FROM product_category WHERE category_slug='$category_slug'";
    $result = $conn->query($sql);
    if($result->num_rows!==1){
    $sql = "INSERT INTO product_category(category_name,payment_advance,category_slug)VALUES('$category_name','$payment_advance','$category_slug')";
    if($conn->query($sql)){
       alert('success',"$category_name has been added successfully.");
       redirect('admin-doz/product-category');
    }else{
       alert('error',$category_name." Error adding Something rong!");
       redirect('admin-doz/product-category');
    }
   }else{
       alert('error',"Error: $category_name already exists. Please choose a different name.");
       redirect('admin-doz/product-category');
   }
}

if(isset($_GET['status']) && !empty($_GET['status'])){
   $status = mysqli_real_escape_string($conn,trim($_GET['status']));
   $id = mysqli_real_escape_string($conn,trim($_GET['id']));
   $sql = "UPDATE product_category SET status= $status WHERE category_id=$id";
   if($conn->query($sql)){
    alert('success',"category has been updated successfully.");
    redirect('admin-doz/product-category');
 }
}
include_once('include/header.php');


?>



<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Multi Column with Form Separator -->
        <div class="card mb-6">
            <h5 class="card-header">Product Category Add</h5>
            <form class="card-body" method="post" action="">
                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label" for="product_title">Category Name</label>
                        <input type="text" id="category_name" class="form-control" placeholder="add category name" name="category_name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="payment_advance">Advance Payment</label>
                        <input type="text" id="payment_advance" class="form-control" placeholder="advance payment" name="payment_advance" required>
                    </div>
                 
                </div>
                <div class="pt-6">
                    <button type="submit" name="category_submit" class="btn btn-primary me-3">Submit</button>
                </div>
            </form>
        </div>

        <div class="card">
  <h5 class="card-header">Product Category List</h5>
  <div class="table-responsive text-nowrap">

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Category Name</th>
          <th>Category Slug</th>
          <th>Advance Payment</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php 
$sql = "SELECT * FROM product_category ORDER BY status ASC";
$result = $conn->query($sql);
?>
      <tbody class="table-border-bottom-0">
        <?php while($data = $result->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $data['category_id'] ?></td>
          <td><?php echo $data['category_name'] ?></td>
          <td><?php echo $data['category_slug'] ?></td>
          <td><?php echo $data['payment_advance'] ?></td>
          <td><?php if($data['status']==1){ ?>
            <span class="badge bg-label-primary me-1">Active</span>
          <?php }else{
            ?>
          <span class="badge bg-label-danger me-1">Inactive</span>
            <?php } ?></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php base_url('admin-doz/product-category?status=1&id='.$data['category_id']) ?>">Active </a>
                <a class="dropdown-item" href="<?php base_url('admin-doz/product-category?status=2&id='.$data['category_id']) ?>"> Inactive</a>
                <a class="dropdown-item" href="<?php base_url('admin-doz/update-product-category?id='.$data['category_id']) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              </div>
            </div>
          </td>
        </tr>
        <?php  }?>
       
      </tbody>
    </table>
  </div>
</div>

    </div>

</div>



<?php
include_once('include/footer.php');

?>