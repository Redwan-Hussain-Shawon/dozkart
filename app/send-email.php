
<?php 
session_start();
include_once("../connect/conn.php");
define('MYSITE',true);
include_once("../include/helper.php");
if(is_logged_in()){
    header('Location:dashboard');
   exit();
}
include_once('../vendor/autoload.php');
use Firebase\JWT\JWT;
allowDomin();
if(isset($_POST['submit_email_rest'])){
    $email = mysqli_real_escape_string($conn,trim($_POST['email']));
    if(empty($email)){
        alert('danger', 'email cannot be empty');
        header('Location: password-reset');
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE email ='$email'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $otp = random_int(100000, 999999);
            $payload =[
                'iss'=>'dozkart',
                'iat'=>time(),
                'exp'=>strtotime('1 Day'),
                'otp'=>$otp,
                'email'=>$email
            ];
            /// Gmail Send the opt


            $jwt = JWT::encode($payload,JWT_SECRET_KEY,'HS256');

            $_SESSION['opt_rest_password'] = $jwt;
            echo $otp;
        }else{
            alert('danger', "We couldn't find an account with that email. Please check again!");
            header('Location: password-reset');
            exit();
        }
    }
}

?>

