<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
include_once ('../../connect/base_url.php');
include_once ('../../connect/conn.php');
include_once ('include/helper.php');
if(isset($_GET['id']) & !empty($_GET['id'])){
    $id = mysqli_real_escape_string($conn,trim($_GET['id']));
    $sql = "SELECT * FROM product_category WHERE category_id=$id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

if(isset($_POST['category_submit'])){
    $category_name = mysqli_real_escape_string($conn,trim($_POST['category_name']));
    $payment_advance = mysqli_real_escape_string($conn,trim($_POST['payment_advance']));
    $sql = "UPDATE product_category SET category_name = '$category_name', payment_advance='$payment_advance' WHERE category_id=$id";
    if( $result = $conn->query($sql)){
        alert('success',"$category_name has been added successfully.");
        redirect('admin-doz/product-category');
    }else{
        alert('error',$category_name." Error adding Something rong!");
        redirect('admin-doz/product-category');
    }
}




include_once('include/header.php');



?>


<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <h5 class="card-header">Product Category Update</h5>
            <form class="card-body" method="post" action="">
                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label" for="product_title">Category Name</label>
                        <input type="text" id="category_name" class="form-control" placeholder="add category name" name="category_name" required value="<?php echo $data['category_name'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="payment_advance">Advance Payment</label>
                        <input type="text" id="payment_advance" class="form-control" placeholder="advance payment" name="payment_advance" required value="<?php echo $data['payment_advance'] ?>">
                    </div>
                 
                </div>
                <div class="pt-6">
                    <button type="submit" name="category_submit" class="btn btn-primary me-3">Submit</button>
                </div>
            </form>
        </div>

    </div>

</div>



<?php

include_once('include/footer.php');
}

?>