<?php
define('MYSITE', true);
include_once('../vendor/autoload.php');
include_once('../include/helper.php');
include_once('../connect/conn.php');

header('Content-Type: application/json');

$response = array(); // Initialize the response array

if (isset($_POST['productSlug']) && isset($_POST['value'])) {
    $productSlug = mysqli_real_escape_string($conn, $_POST['productSlug']);
    $quantityChange = (int)$_POST['value']; // Expecting 1 for increment or -1 for decrement

    // Initialize cartData as an empty array if no cookie exists
    $cartData = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Check if the product is already in the cookie cart
    $productFound = false;
    foreach ($cartData as &$item) {
        if ($item['product_slug'] === $productSlug) {
            $currentQuantity = (int)$item['quantity']; // Current quantity in cookie

            // Calculate new quantity based on the value
            if ($quantityChange === 1) {
                $newQuantity = $currentQuantity + 1; // Increment
            } elseif ($quantityChange === -1) {
                $newQuantity = ($currentQuantity > 1) ? $currentQuantity - 1 : 1; // Decrement, but not below 1
            }

            // Update the item in the array
            $item['quantity'] = $newQuantity;
            $productFound = true;
            break;
        }
    }

    // If the product was not found, consider it as adding a new item with quantity set to 1 or the increment value
    if (!$productFound) {
        $newQuantity = ($quantityChange === 1) ? 1 : 0; // Start with 1 if incrementing
        if ($newQuantity > 0) {
            $cartData[] = array(
                'product_slug' => $productSlug,
                'quantity' => $newQuantity,
            );
        }
    }

    // Set the cookie to expire in 7 days
    setcookie('cart', json_encode($cartData), time() + (86400 * 7), "/");

    // Set success response
    $response = array(
        'status' => 'success',
        'quantity' => $newQuantity,
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Invalid input.',
    );
}

// Return the JSON response
echo json_encode($response);
?>
