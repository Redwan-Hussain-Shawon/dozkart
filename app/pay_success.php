<?php
 include_once('../connect/base_url.php');
if (isset($_POST['tran_id']) && isset($_POST['status'])) {
    define('MYSITE', true);
    include('../connect/conn.php');
    include_once('../include/helper.php');
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
    $bank_tran_id = $_POST['bank_tran_id'];
    $status = $_POST['status'];
    $error = $_POST['error'];
    $currency = $_POST['currency'];
    $card_sub_brand = $_POST['card_sub_brand'];
    $card_issuer_country_code = $_POST['card_issuer_country_code'];
    $store_id = $_POST['store_id'];
    $currency_amount = $_POST['currency_amount'];
    $currency_rate = $_POST['currency_rate'];
    $base_fair = $_POST['base_fair'];

    $tran_id = $_POST['tran_id'];
    $val_id = $_POST['val_id'];
    $amount = $_POST['amount'];
    $store_amount = $_POST['store_amount'];
    $card_issuer_country = $_POST['card_issuer_country'];

    $verify_sign = $_POST['verify_sign'];
    $verify_sign_sha2 = $_POST['verify_sign_sha2'];
    $verify_key = $_POST['verify_key'];
    $tran_date = $_POST['tran_date'];
      $user_id = $_POST['value_a'];
	  $addressid = $_POST['value_b'];
	  $color = $_POST['value_c'];
       echo $last_id = 	$_POST['value_d'];
        $user_id = 	$_POST['value_a'];
        $asin = $_POST['value_c'];


    $sql = "UPDATE  orders SET pay_amount='$amount',status=3,tran_id='$tran_id',val_id='$val_id',store_amount='$store_amount',card_issuer_country='$card_issuer_country',verify_sign='$verify_sign',verify_sign_sha2='$verify_sign_sha2',verify_key='$verify_key',tran_date='$tran_date' WHERE id = $last_id";
    if ($conn->query($sql)) {
        $_SESSION['sh_user'] = $user_id;
        alert('success','Thank you for your purchase! Your product Submission was successful');
        header('Location:'.base_url1('orders'));
        exit();
    }else{
        echo 'not ok';
    }
} else {
    header('Location:'.base_url1('404'));
}
