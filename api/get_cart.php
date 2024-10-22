<?php
// get_cart.php
define('MYSITE', true);
include_once('../connect/conn.php'); // Database connection
include_once('../include/helper.php'); 
header('Content-Type: application/json');

// Check if the cart cookie exists
if (isset($_COOKIE['cart'])) {
    // Decode the cart data from the cookie
    $cartData = json_decode($_COOKIE['cart'], true);

    if (!empty($cartData)) {
        $cart_items = [];

        foreach ($cartData as $item) {
            $product_slug = mysqli_real_escape_string($conn, $item['product_slug']);

            // Query to fetch product details and image URL
            $sql = "SELECT p.*, pi.image_url 
                    FROM products p 
                    JOIN product_image pi ON p.product_slug = pi.product_slug 
                    WHERE p.product_slug='$product_slug'";

            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $data_main = $result->fetch_assoc();
                $cart_items[] = [
                    'product_slug' => $data_main['product_slug'],
                    'product_title' => $data_main['product_title'],
                    'product_price' =>$item['product_price'],
                    'shipping_charge' => $data_main['shipping_charge'],
                    'quantity' => $item['quantity'], 
                    'image_url' => $data_main['image_url'],
                ];
            } else {
                $cart_items[] = [
                    'product_slug' => $product_slug,
                    'error' => 'Product not found.'
                ];
            }
        }

        echo json_encode($cart_items);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
