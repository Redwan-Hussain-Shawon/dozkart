<?php
session_start();

include_once('../connect/base_url.php');
include_once('../connect/conn.php');
include('../include/googleClient.php');  
use Firebase\JWT\JWT;
if (isset($_SERVER['HTTP_REFERER']) && str_contains($_SERVER['HTTP_REFERER'], 'https://accounts.google.com/') === true) {

    if (isset($_GET['code'])) {
        try{
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (isset($token['error'])) {
                throw new Exception('Error fetching access token: ' . $token['error']);
            }

            $client->setAccessToken($token['access_token']);
    
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            
            $name = $google_account_info->name;
            $email = $google_account_info->email;
            $img_url = $google_account_info->picture;
            $sql = "SELECT * FROM user WHERE email='$email'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $data = $result->fetch_assoc();
                $inserted_id = $data['id'];
                $payload =[
                    'iss'=>'dozkart',
                    'iat'=>time(),
                    'exp'=>strtotime('7 Day'),
                    'email'=>$email,
                    'id'=>$inserted_id
                ];
                $jwt = JWT::encode($payload,JWT_SECRET_KEY,'HS256');
                $_SESSION['sh_user'] = $jwt;
                redirect('dashboard'); 
            }else{
                $sql = "INSERT INTO user(name,email,image_url)VALUES('$name','$email','$img_url')";
                if($conn->query($sql)){
                    $inserted_id = $conn->insert_id;
                    $payload =[
                        'iss'=>'dozkart',
                        'iat'=>time(),
                        'exp'=>strtotime('7 Day'),
                        'email'=>$email,
                        'id'=>$inserted_id
                    ];
                    $jwt = JWT::encode($payload,JWT_SECRET_KEY,'HS256');
                    $_SESSION['sh_user']= $jwt;
                    redirect('dashboard'); 
                }else{
                    echo 'error';
                }

            }


        }catch (Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
}
      
     
    }else{
        redirect(''); 
    }
}else{
    redirect('');
}
