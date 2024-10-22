<?php
include_once("../connect/base_url.php");
include_once("../vendor/autoload.php");
define('MYSITE', true);
include_once('../include/helper.php');
if (isset($_POST['checkout_submit'])) {  
	if ($_SESSION['sh_user']) {
		include_once("../connect/conn.php");
		$user_id = getId();
		$addressId = mysqli_real_escape_string($conn,$_POST['addressid']);
		$productColorId = mysqli_real_escape_string($conn,$_POST['productColorId']);
		$product_slug = mysqli_real_escape_string($conn,$_POST['product_slug']);
		$instructions = mysqli_real_escape_string($conn,$_POST['instructions']);
		$qunty = mysqli_real_escape_string($conn,$_POST['quantity']);

		$sql ="SELECT p.*,pc.payment_advance
		FROM products p
		JOIN product_category pc ON p.product_category=pc.category_slug
		WHERE product_slug='$product_slug'";
		$result = $conn->query($sql);
		if($result->num_rows>0){
		$data = $result->fetch_assoc();
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		$amaunt = calculateAdvancePayment(($data['product_price']+$data['shipping_charge'])*$qunty,$data['payment_advance']);
		if($productColorId != 'null'){
			$sql1 = "SELECT color_price FROM product_color WHERE color_id =$productColorId";
			$result1 = $conn->query($sql1);
			$amaunt = calculateAdvancePayment(($result1->fetch_assoc()['color_price']+$data['shipping_charge'])*$qunty,$data['payment_advance']) ;
		}
		echo $amaunt;
		exit;
		
		$data_jsone = ['asin'=>$asin,'value_e'=>$qunty,'value_f'=>$size,'value_g'=>$instructions];
		$product = $_POST['asin'];
	
		$check_sql = "INSERT INTO orders(user_id,product_id,address_id,product_qunty,product_size,product_color,instruction)VALUES($user_id,'$product',$addressId,'$qunty','$size','$color','$instructions')";
		$check_result = $conn->query($check_sql);
		if ($check_result) {
			  $row_id = mysqli_insert_id($conn);
		}

		

		/* PHP */
		$post_data = array();
		$post_data['store_id'] = "dozkart0live";
		$post_data['store_passwd'] = "6637A1AB0B4E645651";
		$post_data['total_amount'] = $amaunt;
		$post_data['currency'] = "BDT";
		$post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
		$post_data['success_url'] = "https://www.dozkart.com/success_pay";
		$post_data['fail_url'] = "https://www.dozkart.com/fail_pay";
		$post_data['cancel_url'] = "https://www.dozkart.com/cancel_pay";
		# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

		# EMI INFO
		$post_data['emi_option'] = "1";
		$post_data['emi_max_inst_option'] = "9";
		$post_data['emi_selected_inst'] = "9";

		# CUSTOMER INFORMATION
		$post_data['cus_name'] = "Test Customer";
		$post_data['cus_email'] = "test@test.com";
		$post_data['cus_add1'] = "Dhaka";
		$post_data['cus_add2'] = "Dhaka";
		$post_data['cus_city'] = "Dhaka";
		$post_data['cus_state'] = "Dhaka";
		$post_data['cus_postcode'] = "1000";
		$post_data['cus_country'] = "Bangladesh";
		$post_data['cus_phone'] = "01711111111";
		$post_data['cus_fax'] = "01711111111";

		# SHIPMENT INFORMATION
		$post_data["shipping_method"] = "YES";
		$post_data['ship_name'] = "dozkart";
		$post_data['ship_add1'] = "Dhaka";
		$post_data['ship_add2'] = "Dhaka";
		$post_data['ship_city'] = "Dhaka";
		$post_data['ship_state'] = "Dhaka";
		$post_data['ship_postcode'] = "1000";
		$post_data['ship_phone'] = "01742019445";
		$post_data['ship_country'] = "Bangladesh";

		$post_data['emi_option'] = "1";
		$post_data["product_category"] = "Electronic";
		$post_data["product_profile"] = "general";
		$post_data["product_name"] = "Computer";
		$post_data["num_of_item"] = "1";

		# OPTIONAL PARAMETERS
		$post_data['value_a'] = $user_id;
		$post_data['value_b '] = '0123';
		$post_data['value_c'] = $asin;
		$post_data['value_d'] = $row_id;

		# CART PARAMETERS
		$post_data['cart'] = json_encode(array(
			array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
			array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
			array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
			array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
		));
		$post_data['product_amount'] = "100";
		$post_data['vat'] = "5";
		$post_data['discount_amount'] = "5";
		$post_data['convenience_fee'] = "3";






		# REQUEST SEND TO SSLCOMMERZ
		$direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php";

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $direct_api_url);
		curl_setopt($handle, CURLOPT_TIMEOUT, 30);
		curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($handle, CURLOPT_POST, 1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


		$content = curl_exec($handle);

		$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

		if ($code == 200 && !(curl_errno($handle))) {
			curl_close($handle);
			$sslcommerzResponse = $content;
		} else {
			curl_close($handle);
			echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
			exit;
		}

		# PARSE THE JSON RESPONSE
		$sslcz = json_decode($sslcommerzResponse, true);

		if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
		        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
		        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
			echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
			# header("Location: ". $sslcz['GatewayPageURL']);
			exit;
		} else {
			echo "JSON Data parsing error!";
		}


	} else {
		alert('danger','this data not avaible');
		header('location:' . base_url1('404.php'));
	}
}
	
}else{
	header('location:' . base_url1('404.php'));
}
