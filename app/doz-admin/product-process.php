<?php 
include_once('../../connect/conn.php');
include_once('../../connect/base_url.php');
include_once('include/helper.php'); // Assuming this contains the generateSlug function

// Sanitize input data
$product_title = mysqli_real_escape_string($conn, trim($_POST['product_title']));
$product_category = mysqli_real_escape_string($conn, trim($_POST['product_category']));
$product_price = mysqli_real_escape_string($conn, trim($_POST['product_price']));
$shipping_charge = mysqli_real_escape_string($conn, trim($_POST['shipping_charge']));
$product_size = mysqli_real_escape_string($conn, trim($_POST['product_size']));
$product_ratting = mysqli_real_escape_string($conn, trim($_POST['product_ratting']));
$product_rating_star = mysqli_real_escape_string($conn, trim($_POST['product_rating_star']));
$product_rating_count = mysqli_real_escape_string($conn, trim($_POST['product_rating_count']));
$product_reviews = mysqli_real_escape_string($conn, trim($_POST['product_reviews']));
$product_brand_name = mysqli_real_escape_string($conn, trim($_POST['product_brand_name']));
$website_name = mysqli_real_escape_string($conn, trim($_POST['website_name']));
$product_url_link = mysqli_real_escape_string($conn, trim($_POST['product_url_link']));
$keyword = mysqli_real_escape_string($conn, trim($_POST['keyword']));
$product_description = mysqli_real_escape_string($conn, trim($_POST['product_description']));
$product_slug = generateSlug($product_title . ' ' . rand());


$sql = "INSERT INTO products (
    product_title, 
    product_category, 
    product_price, 
    shipping_charge, 
    product_size, 
    product_ratting, 
    product_rating_star, 
    product_rating_count, 
    product_reviews, 
    product_brand_name, 
    website_name, 
    product_url_link, 
    keyword, 
    product_description,
    product_slug
) VALUES (
    '$product_title', 
    '$product_category', 
    '$product_price', 
    '$shipping_charge', 
    '$product_size', 
    '$product_ratting', 
    '$product_rating_star', 
    '$product_rating_count', 
    '$product_reviews', 
    '$product_brand_name', 
    '$website_name', 
    '$product_url_link', 
    '$keyword', 
    '$product_description',
    '$product_slug'
)";

if ($conn->query($sql)) {
    echo "New product added successfully.";
} else {
    echo "error" ;
}

?>
