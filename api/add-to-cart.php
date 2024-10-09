<?php 
define('MYSITE', true);
include_once('../vendor/autoload.php');
include_once('../include/helper.php');
include_once('../connect/conn.php'); // Database connection

header('Content-Type: application/json');

// Function to handle setting cart data in cookies
function setCartCookie($cartItem) {
    // Initialize cartData as an empty array if no cookie exists
    $cartData = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Check if the product already exists in the cart
    $productExists = false;

    foreach ($cartData as &$item) {
        if ($item['product_slug'] === $cartItem['product_slug'] 
           ) {

            $productExists = true;
            break; // Exit the loop after updating
        }
    }

    // If the product doesn't exist, add it to the cart
    if (!$productExists) {
        $cartData[] = $cartItem; // Add the new item
    }

    // Set the cookie to expire in 7 days
    setcookie('cart', json_encode($cartData), time() + (86400 * 7), "/"); 

    return true;
}

// Check if productSlug is set in POST request
if (isset($_POST['productSlug'])) {
    // Sanitize input data
    $product_slug = mysqli_real_escape_string($conn, $_POST['productSlug']);
    $productColor = mysqli_real_escape_string($conn, $_POST['productColor']);
    $productSize = mysqli_real_escape_string($conn, $_POST['productSize']);
    $quantity = isset($_POST['productQuantity']) ? (int)$_POST['productQuantity'] : 1; // Default to 1 if quantity is not set

    // Query to fetch product details
    $sql = "SELECT product_title, product_price, shipping_charge FROM products WHERE product_slug = '$product_slug'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch the product data
        $productData = $result->fetch_assoc();

        // Prepare the cart item with the fetched details
        $cartItem = array(
            'product_slug' => $product_slug,
            'product_title' => $productData['product_title'], 
            'product_price' => $productData['product_price'], 
            'productColor' => $productColor,
            'productSize' => $productSize,
            'quantity' => $quantity,
            'shipping_charge' => $productData['shipping_charge']
        );

        // Attempt to set the cart cookie
        if (setCartCookie($cartItem)) {
            $response = ['status' => 'success', 'message' => 'Product added to cart.'];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to add product to cart.'
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Product not found.'
        ];
    }

    // Send the JSON response
    echo json_encode($response);
} else {
    // Handle the case where productSlug is not set
    echo json_encode([
        'status' => 'error',
        'message' => 'Product slug is required.'
    ]);
}
?>
