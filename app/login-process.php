<?php
include_once("../connect/conn.php");
include_once("../connect/base_url.php");
include_once('../vendor/autoload.php');
define('MYSITE',true);
use Firebase\JWT\JWT;
include_once("../include/helper.php");
allowDomin();
if (isset($_POST['submit_login'])) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    if ($email == '' || $password == '') {
        alert('danger', 'Input Field Cannot be Empty');
        header('Location: login');
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                $user_id = $row['id'];
                alert('success', 'Login successful! You can now continue shopping.');
                $payload =[
                    'iss'=>'dozkart',
                    'iat'=>time(),
                    'exp'=>strtotime('7 Day'),
                    'email'=>$email,
                    'id'=>$user_id
                ];
                $jwt = JWT::encode($payload,JWT_SECRET_KEY,'HS256');
                $_SESSION['sh_user'] = $jwt;
                header('Location:dashboard');
            } else {
                $_SESSION['form']['error']['password']=$password;
                $_SESSION['form']['email'] = $email;
                alert('danger', 'Please enter a valid password.');
                header('Location:login');
                exit();
            }
        } else {
            alert('danger', 'Please enter a valid email address.');
            header('Location:login');
            $_SESSION['form']['error']['email']=$email;
            exit();
        }
    }
} else {
    header('Location:home');
}
