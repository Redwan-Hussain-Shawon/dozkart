<?php
include_once("../connect/conn.php");
define('MYSITE',true);
include_once("../include/helper.php");
allowDomin();
if (isset($_POST['submit_registration'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    if ($name == '' || $phone == '' || $email == '' || $password == '') {
        alert('danger', 'Input Field Cannot be Empty');
        header('Location: registration');
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE phone = '$phone'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['form']['name'] = $name;
            $_SESSION['form']['email'] = $email;
            $_SESSION['form']['password'] = $password;
            $_SESSION['error']['']['phone']=$phone;
            alert('danger', 'This number already exists. Please provide a new number.');
            header('Location: registration');
            exit();
        } else if (!preg_match('/^[0-9]+$/', $phone)) {
            $_SESSION['form']['name'] = $name;
            $_SESSION['form']['email'] = $email;
            $_SESSION['form']['password'] = $password;
            $_SESSION['form']['error']['phone']=$phone;
            alert('danger', 'Only number allowed.');
            header('Location: registration');
            exit();
        } else if (strlen($phone) !== 11) {
            $_SESSION['form']['name'] = $name;
            $_SESSION['form']['email'] = $email;
            $_SESSION['form']['password'] = $password;
            $_SESSION['form']['error']['phone']=$phone;
            alert('danger', 'Phone number should be exactly 11 digits.');
            header('Location: registration');
            exit();
        }else if(strlen($password) < 6) {
            $_SESSION['form']['name'] = $name;
            $_SESSION['form']['phone'] = $phone;
            $_SESSION['form']['email'] = $email;
            $_SESSION['form']['error']['password']=$password;
            alert('danger', 'Your password must be at least 6 characters long.');
            header('Location: registration');
            exit();
        } else if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $_SESSION['form']['name'] = $name;
            $_SESSION['form']['phone'] = $phone;
            $_SESSION['form']['email'] = $email;
            $_SESSION['form']['error']['password']=$password;
            alert('danger', 'Your password must include at least one special character.');
            header('Location: registration');
            exit();
        }else {
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['form']['name'] = $name;
                $_SESSION['form']['password'] = $password;
                $_SESSION['form']['phone'] = $phone;
                $_SESSION['form']['error']['password']=$password;
                alert('danger', 'This Email already exists. Please provide a new email.');
                header('Location: registration');
                exit();
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user(name,phone,email,password)VALUES('$name','$phone','$email','$password')";

                if ($conn->query($sql)) {
                     $inserted_id = $conn->insert_id;
                    notifications($inserted_id,'Account created successfully !','');
                    alert('success', 'Account created successfully! Please log in to continue');
                    header('Location: login');
                    exit();
                }
            }
        }
    }
} else {
    header('Location:home');
}
