<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    define('MYSITE', true);
    include_once('../include/helper.php');
    include_once('../connect/conn.php'); 

    // Get the raw POST data
    $requestBody = file_get_contents('php://input');
    $data = json_decode($requestBody, true);
    
    // Check if data is valid
    if ($data && is_array($data)) {

        $query = "SELECT DISTINCT p.*, 
        (SELECT pi.image_url FROM product_image pi WHERE pi.product_slug = p.product_slug ORDER BY pi.image_id LIMIT 1) AS image
        FROM products p 
        LEFT JOIN product_color pc ON p.product_slug = pc.product_slug 
        LEFT JOIN product_size ps ON p.product_slug = ps.product_slug 
        WHERE 1=1 AND status=1 ";

        $params = [];
        
        // Filter by categories
        if (!empty($data['categoris'])) {
            $categories = implode("','", array_map(function($category) use ($conn) {
                return mysqli_real_escape_string($conn, $category);
            }, $data['categoris']));
            $query .= " AND p.product_category IN ('$categories')";
        }

        // Filter by minimum price
        if (!empty($data['min-price']) && is_numeric($data['min-price'][0])) {
            $minPrice = intval($data['min-price'][0]);
            $query .= " AND p.product_price >= $minPrice";
        }

        // Filter by maximum price
        if (!empty($data['max-price']) && is_numeric($data['max-price'][0])) {
            $maxPrice = intval($data['max-price'][0]);
            $query .= " AND p.product_price <= $maxPrice";
        }

        if (!empty($data['size'])) {
            $sizes = implode("','", array_map(function($size) use ($conn) {
                return mysqli_real_escape_string($conn, $size);
            }, $data['size']));
            $query .= " AND ps.size_name IN ('$sizes')";
        }

        // Filter by color
        if (!empty($data['color'])) {
            $colors = implode("','", array_map(function($color) use ($conn) {
                return mysqli_real_escape_string($conn, $color);
            }, $data['color']));
            $query .= " AND pc.color_name IN ('$colors')";
        }

        // Filter by rating
        if (!empty($data['ratting'])) {
            $ratings = implode("','", array_map(function($rating) use ($conn) {
                return mysqli_real_escape_string($conn, $rating);
            }, $data['ratting']));
            $query .= " AND p.product_rating_star IN ('$ratings')";
        }
        

        // Execute the query
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
            shuffle($results);
            echo json_encode(['status' => true, 'data' => $results]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Query execution failed']);
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid input data']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request method']);
}
?>
