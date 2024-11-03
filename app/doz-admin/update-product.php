<?php
session_start();
include_once('../../connect/conn.php');
include_once('../../connect/base_url.php');
include_once('include/helper.php');

// Retrieve and sanitize input from the form
$product_id = mysqli_real_escape_string($conn, trim($_POST['product_id'])); 
$product_title = mysqli_real_escape_string($conn, trim($_POST['product_title']));
$product_category = mysqli_real_escape_string($conn, trim($_POST['product_category']));
$product_price = mysqli_real_escape_string($conn, trim($_POST['product_price']));
$product_discount = mysqli_real_escape_string($conn, trim($_POST['product_discount']));
$product_size = isset($_POST['product_size']) ? mysqli_real_escape_string($conn, trim($_POST['product_size'])) : NULL;
$product_ratting = mysqli_real_escape_string($conn, trim($_POST['product_ratting']));
$product_rating_star = mysqli_real_escape_string($conn, trim($_POST['product_rating_star']));
$product_rating_count = mysqli_real_escape_string($conn, trim($_POST['product_rating_count']));
$product_reviews = mysqli_real_escape_string($conn, trim($_POST['product_reviews']));
$product_brand_name = mysqli_real_escape_string($conn, trim($_POST['product_brand_name']));
$website_name = mysqli_real_escape_string($conn, trim($_POST['website_name']));
$product_url_link = mysqli_real_escape_string($conn, trim($_POST['product_url_link']));
$keyword = mysqli_real_escape_string($conn, trim($_POST['keyword']));
$product_description = isset($_POST['product_description']) ? mysqli_real_escape_string($conn, trim($_POST['product_description'])) : NULL;



// Prepare the SQL UPDATE query
$sql = "UPDATE products SET 
    product_title = '$product_title',
    product_category = '$product_category',
    product_price = '$product_price',
    product_size = '$product_size',
    product_discount = '$product_discount',
    product_ratting = '$product_ratting',
    product_rating_star = '$product_rating_star',
    product_rating_count = '$product_rating_count',
    product_reviews = '$product_reviews',
    product_brand_name = '$product_brand_name',
    website_name = '$website_name',
    product_url_link = '$product_url_link',
    keyword = '$keyword',
    product_description = '$product_description'
WHERE product_id = $product_id";

if ($conn->query($sql)) {
 
    // 900000000
    $size_name = $_POST['size_name'];
    $size_id = $_POST['size_id'];
    $size_click_view_url = $_POST['size_click_view_url'];
    $product_slug = $_POST['product_slug'];
    foreach($size_name as $key => $size){
        $size_url = $size_click_view_url[$key];
        $id_size = $size_id[$key];
        if(!empty($size)){
        if($id_size=='size_insert'){
            $insert_sql = "INSERT INTO product_size(product_slug,size_name,size_click_view_url)VALUES('$product_slug','$size','$size_url')";
            $conn->query($insert_sql);
        }else{
            $update_sql = "UPDATE product_size SET size_name='$size',size_click_view_url='$size_url' WHERE size_id=$id_size";
            $conn->query($update_sql);
        }
    }
    }
    alert('success',' Your product has been updated successfully.');
    header('location:show-product');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


?>
