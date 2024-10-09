<?php 
define('MYSITE', true);
include_once('../vendor/autoload.php');
include_once('../include/helper.php');
include_once('../connect/conn.php'); // Database connection

header('Content-Type: application/json');

// Function to delete an item from the cart cookie
function deleteCartItem($productSlug) {
    if (isset($_COOKIE['cart'])) {
        $cartData = json_decode($_COOKIE['cart'], true);
        $updatedCart = [];

        foreach ($cartData as $item) {
            if ($item['product_slug'] !== $productSlug ) {
                $updatedCart[] = $item; // Keep the item
            }
        }

        // If the updated cart is different, update the cookie
        if (count($cartData) !== count($updatedCart)) {
            setcookie('cart', json_encode($updatedCart), time() + (86400 * 7), "/"); // 7 days
            return true;
        }
    }

    return false; // Item not found in the cart
}

if (isset($_POST['productSlug'])) {
    $productSlug = mysqli_real_escape_string($conn, $_POST['productSlug']);

    // Delete the product from the cart
    if (deleteCartItem($productSlug)) {
        $response = ['status' => 'success', 'message' => 'Product removed from cart successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Product not found in cart.'];
    }

    echo json_encode($response);
}
?>
