<?php
 include_once('../connect/base_url.php');
if (isset($_POST['tran_id']) && isset($_POST['status'])) {
    define('MYSITE', true);
    include('../connect/conn.php');
    include_once('../include/helper.php');

    $bank_tran_id = $_POST['bank_tran_id'] ?? null;  // Using null coalescing to avoid undefined index notices
    $status = $_POST['status'] ?? null;
    $error = $_POST['error'] ?? null;
    $currency = $_POST['currency'] ?? null;
    $card_sub_brand = $_POST['card_sub_brand'] ?? null;
    $card_issuer = $_POST['card_issuer'] ?? null;
    $card_issuer_country_code = $_POST['card_issuer_country_code'] ?? null;
    $store_id = $_POST['store_id'] ?? null;
    $currency_amount = $_POST['currency_amount'] ?? null;
    $currency_rate = $_POST['currency_rate'] ?? null;
    $base_fair = $_POST['base_fair'] ?? null;
    $card_type = $_POST['card_type'] ?? null;
    $card_brand  = $_POST['card_brand'] ?? null;

    $tran_id = $_POST['tran_id'];
    $val_id = $_POST['val_id'];
    $amount = $_POST['amount'];
    $store_amount = $_POST['store_amount'];
    $card_issuer_country = $_POST['card_issuer_country'];

    $verify_sign = $_POST['verify_sign'];
    $verify_sign_sha2 = $_POST['verify_sign_sha2'];
    $verify_key = $_POST['verify_key'];
    $tran_date = $_POST['tran_date'];
    
    // User information
    $user_id = $_POST['value_a'] ?? null;
    $jwt_token = $_POST['value_b'] ?? null;

    if (!isset($_SESSION['sh_user'])) {
        $_SESSION['sh_user'] = $jwt_token;
    }

  $order_insert_id = $_POST['value_c'] ?? null;

    $sql = "UPDATE orders SET
    tran_id = '$tran_id',
    val_id = '$val_id',
    amount = $amount,
    card_type = '$card_type',
    store_amount = $store_amount,
    bank_tran_id = '$bank_tran_id',
    status = 1,
    tran_date = '$tran_date',
    currency = '$currency',
    card_issuer = '$card_issuer',
    card_brand = '$card_brand',
    card_sub_brand = '$card_sub_brand'
WHERE id = $order_insert_id;";


$result = $conn->query($sql);
$sql = "INSERT INTO transactions (
    tran_id,user_id, val_id, amount, card_type, store_amount, bank_tran_id,
    status, tran_date, currency, card_issuer, card_brand, card_sub_brand,
    card_issuer_country, card_issuer_country_code, store_id,
    verify_sign, verify_sign_sha2
) VALUES (
    '$tran_id',$user_id, '$val_id', $amount, '$card_type', $store_amount, 
    '$bank_tran_id', '$status', '$tran_date', '$currency', 
    '$card_issuer', '$card_brand', '$card_sub_brand', 
    '$card_issuer_country', '$card_issuer_country_code', '$store_id', 
    '$verify_sign', '$verify_sign_sha2'
)";

if ($conn->query($sql)) {
    alert('success','Thank you for your purchase! Your product Submission was successful');
    header('Location:'.base_url1('orders'));
    exit();
} else {
    echo 'Insert failed: ' . $conn->error; 
}
} else {
header('Location:'.base_url1('404'));
}


    
    // if ($conn->query($sql)) {
    //     $_SESSION['sh_user'] = $user_id;
    //     alert('success','Thank you for your purchase! Your product Submission was successful');
    //     header('Location:'.base_url1('orders'));
    //     exit();
    // }else{
    //     echo 'not ok';
    // }

