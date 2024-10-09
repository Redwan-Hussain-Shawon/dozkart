<?php define('MYSITE', true);
include_once('../include/helper.php');
include('../connect/conn.php');
header('Content-Type: application/json');

if (isset($_POST['searchValue'])) {

    if (is_logged_in()) {
        $query = $_POST['searchValue'];
        $sql = "SELECT search FROM product_main WHERE search='$query'";
        $result = $conn->query($sql);
       
        if ($result->num_rows > 0) {
            echo '<pre>';
            print_r($result);
            echo '</pre>';
        } else {

            $limit = 20;

            for ($page = 1; $page <= 2; $page++) {
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://real-time-amazon-data.p.rapidapi.com/search?query=$query&page=$page&country=IN&category_id=aps",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: real-time-amazon-data.p.rapidapi.com",
                        "X-RapidAPI-Key: f5441a050emshb90b949a9f9fb29p1a5cbejsna50cffc97adc"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                    echo "cURL Error: $err";
                } else {
                    $responseData = json_decode($response);

                    if ($responseData && isset($responseData->data->products)) {
                        $products = $responseData->data->products;
                        foreach ($products as $product) {
                            $asin = mysqli_real_escape_string($conn, $product->asin);
                            $search = mysqli_real_escape_string($conn, $query);
                            $product_title = mysqli_real_escape_string($conn, $product->product_title);
                            $product_price = mysqli_real_escape_string($conn, $product->product_price);
                            $product_original_price = mysqli_real_escape_string($conn, $product->product_original_price);
                            $currency = mysqli_real_escape_string($conn, $product->currency);
                            $product_star_rating = mysqli_real_escape_string($conn, $product->product_star_rating);
                            $product_url = mysqli_real_escape_string($conn, $product->product_url);
                            $product_photo = mysqli_real_escape_string($conn, $product->product_photo);
                            $product_minimum_offer_price = mysqli_real_escape_string($conn, $product->product_minimum_offer_price);
                            $sales_volume = mysqli_real_escape_string($conn, $product->sales_volume);
                            $delivery = mysqli_real_escape_string($conn, $product->delivery);

                            $sql = "INSERT INTO product_main(asin, search, product_title, product_price, product_original_price, currency, product_star_rating, product_url, product_photo, product_minimum_offer_price, sales_volume, delivery) 
                                    VALUES ('$asin', '$search', '$product_title', '$product_price', '$product_original_price', '$currency', '$product_star_rating', '$product_url', '$product_photo', '$product_minimum_offer_price', '$sales_volume', '$delivery')";
                            $conn->query($sql);
                        }
                    }
                }
            }

            $productHtml = '';
            if(!isset($products) ){
                $response = array(
                    'status' => 'error',
                    'message' => 'Product Not Available'
                );
                echo json_encode($response);
                exit();
            }
            for ($i = 0; $i < min(count($products), $limit); $i++) { 
                $product = $products[$i];
                $productHtml .= "<div class='col-xl-2 col-lg-3  px-1 px-md-2 col-md-4 col-6 product overflow-hidden position-relative py-1'>
                <a href='#'>
                    <div class='shadow-sm rounded-1'>
                        <div class='img overflow-hidden ' style='border-radius:2px 2px 0 0'>
                            <img src='" . $product->product_photo . "' alt='' class='w-100' style='height: 230px;border-radius:2px 2px 0 0' id='" . $product->asin . "product-img'>
                        </div>
                        <div class='p-2 text-left'>
                            <div class='d-flex align-items-end mb-1 gap-2'>
                                <del class='fw-semibold text-paragraph ' style='font-size: 14px;'>" . $product->product_original_price . "</del>
                                <span class='fw-semibold text-primary ' style='font-size: 14px;' id='" . $product->asin . "product-taka'>" . $product->product_price . "</span>
                            </div>
                            <h3 class='mb-1 overflow-hidden ' style='font-size: 16px;line-height:24px;display: -webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;' id='" . $product->asin . "product-title'>" . $product->product_title . "</h3>
                            <p class='text-paragraph mb-0 ' style='font-size: 13px;'>" . $product->product_star_rating . " rating</p>
                        </div>
                    </div>
                </a>
                <div style='top: 15px;' class='position-absolute d-flex gap-1 flex-column  product-triger-main'>
                    <div class='bg-white shadow-sm product-triger d-flex align-items-center justify-content-center' onclick='addToCart(\"" . $product->asin . "\")'>
                        <a href='javascript:void(0)'  class='text-paragraph' >
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 512 512'>
                                <circle cx='176' cy='416' r='16' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32' />
                                <circle cx='400' cy='416' r='16' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32' />
                                <path fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32' d='M48 80h64l48 272h256' />
                                <path fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32' d='M160 288h249.44a8 8 0 0 0 7.85-6.43l28.8-144a8 8 0 0 0-7.85-9.57H128' />
                            </svg>
                        </a>
                    </div>
                    <div class='bg-white  shadow-sm product-triger d-flex align-items-center justify-content-center'>
                        <a href='#' class='text-paragraph'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'>
                                <path fill='currentColor' d='M12.001 4.529a5.998 5.998 0 0 1 8.242.228a6 6 0 0 1 .236 8.236l-8.48 8.492l-8.478-8.492a6 6 0 0 1 8.48-8.464m6.826 1.641a3.998 3.998 0 0 0-5.49-.153l-1.335 1.198l-1.336-1.197a4 4 0 0 0-5.686 5.605L12 18.654l7.02-7.03a4 4 0 0 0-.193-5.454' />
                            </svg></a>
                    </div>
                    <div class='bg-white  shadow-sm product-triger d-flex align-items-center justify-content-center'>
                        <a href='#' class='text-paragraph'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'>
                                <g fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
                                    <path d='M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0' />
                                    <path d='M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7' />
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>";
            }

            // Prepare the final response
            $response = array(
                'status' => 'success',
                'data' => "<section class='py-5 bg-light px-1 px-sm-2'>
                            <div class='container'>
                                <div class='bg-white rounded-2 py-4 px-3 px-sm-4'>
                                    <div class='d-flex justify-content-between border-bottom align-items-center border-1'>
                                        <h2 style='font-weight: 600;font-size: 24px;color: var(--black);border-bottom:2px solid var(--primary)' class='pb-3 mb-0'>$query</h2>
                                        <a href='#'><button class='btn btn-primary'>Show More</button></a>
                                    </div>
                                    <div class='row gy-2 py-md-4'>
                                        $productHtml
                                    </div>
                                </div>
                            </div>
                        </section>"
            );

            // Output the response as JSON
            echo json_encode($response);
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'redirect'
        );
        alert('danger', 'Please login to access the search');
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'No searchValue parameter provided'
    );
    echo json_encode($response);
}


