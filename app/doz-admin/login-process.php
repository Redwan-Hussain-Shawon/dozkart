

<?php  
session_start(); 
include_once ('../../connect/conn.php');
include_once ('include/helper.php');

$email=mysqli_real_escape_string($conn,trim($_POST['email']));
$password=mysqli_real_escape_string($conn,trim($_POST['password']));
// $password=password_hash($password,PASSWORD_DEFAULT);

$sql="SELECT * FROM admin WHERE email='$email'";
$result=$conn->query($sql);
if($result->num_rows>0){
    $data=$result->fetch_assoc();
    $db_password=$data['pass'];
    if(password_verify($password,$db_password)){
        echo 'ok';
    }else{
        echo 'password not found';
    }
}else{
    alart('danger','No account found with this email.');
   header('location:doz-admin');
}



?>