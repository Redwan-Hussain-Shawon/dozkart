<?php

session_start();
include_once('../../connect/conn.php');
include_once('../../connect/base_url.php');
include_once('include/helper.php'); 


// Sanitize input data
$product_title = mysqli_real_escape_string($conn, trim($_POST['product_title']));
$product_category = mysqli_real_escape_string($conn, trim($_POST['product_category']));
$product_price = mysqli_real_escape_string($conn, trim($_POST['product_price']));
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
$product_slug = generateSlug($product_title . ' ' . rand(100, 777));

$property_name = $_POST['property_name'];
$property_value = $_POST['property_value'];
$product_props = [];
foreach ($property_name as $key => $name) {
    if (isset($property_value[$key])) {
        $formatted_name = str_replace(' ', '_', trim($name)); 
        $product_props[$formatted_name] = trim($property_value[$key]);
    }
}
$product_props = json_encode($product_props);


$sql = "INSERT INTO products (
    product_title, 
    product_category, 
    product_price, 
    product_size, 
    product_ratting, 
    product_rating_star, 
    product_rating_count, 
    product_reviews, 
    product_brand_name, 
    website_name, 
    product_props,
    product_url_link, 
    keyword, 
    product_description,
    product_slug
) VALUES (
    '$product_title', 
    '$product_category', 
    '$product_price', 
    '$product_size', 
    '$product_ratting', 
    '$product_rating_star', 
    '$product_rating_count', 
    '$product_reviews', 
    '$product_brand_name', 
    '$website_name', 
    '$product_props', 
    '$product_url_link', 
    '$keyword', 
    '$product_description',
    '$product_slug'
)";

function uploadImages($fileArray)
{
    $targetDir = '../../assets/upload/';
    $uploadedFiles = [];
    foreach ($fileArray['name'] as $key => $fileName) {
        if (!empty($fileName)) {
            $tmpName = $fileArray['tmp_name'][$key];

            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . "_" . date('Ymd_His') . "." . $fileExtension;

            $targetFile = $targetDir . basename($newFileName);

            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedFiles[] = $newFileName;
            } else {
                echo "Error uploading file " . $fileName . ".<br>";
            }
        }
    }
    return $uploadedFiles;
}


if ($conn->query($sql)){
    if (isset($_FILES['mainImage'])){
        $uploadedFiles = uploadImages($_FILES['mainImage']);
        if (!empty($uploadedFiles)) {
            foreach ($uploadedFiles as $uploadedFile) {
                $sql = "INSERT INTO product_image(product_slug,image_url)VALUES('$product_slug','$uploadedFile')";
                $conn->query($sql);
            }
        } 
    }
        if (isset($_FILES['color_image'])) {
            $uploadedFiles = uploadImages($_FILES['color_image']);
            if (!empty($uploadedFiles)) {
                foreach ($uploadedFiles as $key => $uploadedFile) {
                    $colorName = mysqli_real_escape_string($conn, trim($_POST['color_name'][$key])) ;
                    $colorPrice = mysqli_real_escape_string($conn, trim($_POST['color_price'][$key])) ;
                    $sql = "INSERT INTO product_color(product_slug,color_name,color_price,color_image)VALUES('$product_slug','$colorName','$colorPrice','$uploadedFile')";
                    $conn->query($sql);
                }
            }
        }
    
if(isset($_POST['size_name'])){
    foreach($_POST['size_name'] as $key => $size_name){
        if(!empty($size_name)){
            $size_click_view_url = $_POST['size_click_view_url'][$key];
            $sql = "INSERT INTO product_size(product_slug,size_name,size_click_view_url)VALUES('$product_slug','$size_name','$size_click_view_url')";
            $conn->query($sql);
        }
    }
}

alert('success',' Your product has been uploaded successfully.');
header('location:show-product');
exit();
}
