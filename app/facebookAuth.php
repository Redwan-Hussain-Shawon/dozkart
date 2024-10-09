<?php 
session_start();
include_once('../connect/base_url.php');
include_once('../connect/conn.php');
include_once('../include/helper.php');
include_once('../include/facebookClient.php');
use Firebase\JWT\JWT;
allowDomin();
try {
    $accessToken = $helper->getAccessToken();

    if ($accessToken) {

        $response = $fb->get('/me?fields=name,email,picture.type(large)', $accessToken);

        $user = $response->getGraphUser();
        $name = $user->getName();
        $email = $user->getEmail();
        $image_url = $user->getPicture()->getUrl();
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
            $sql = "INSERT INTO user(name,email,image_url)VALUES('$name','$email','$image_url')";
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


        exit;
    } else {
        echo 'No access token found. Please try logging in again.';
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
} catch (Exception $e) {
    // Handle generic errors
    echo 'Error: ' . $e->getMessage();
}


?>