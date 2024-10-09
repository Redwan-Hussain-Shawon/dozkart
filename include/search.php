<?php
    $sql = "SELECT search FROM product_main WHERE search='$query'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
    } else {

        $limit = 20;

        for ($page = 1; $page <= 6; $page++) {
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
                		"X-RapidAPI-Key: 34bcfda085mshbb2da180e67e277p12dc2fjsn4090c26ab888"
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

    }
