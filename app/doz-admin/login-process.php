

<?php  
session_start(); 
include_once ('../../connect/conn.php');
include_once ('../../connect/base_url.php');
include_once ('include/helper.php');

$email=mysqli_real_escape_string($conn,trim($_POST['email']));
$password=mysqli_real_escape_string($conn,trim($_POST['password']));

$sql="SELECT * FROM admin WHERE email='$email'";
$result=$conn->query($sql);
if($result->num_rows>0){
    $data=$result->fetch_assoc();
    $db_password=$data['pass'];
    if(password_verify($password,$db_password)){
        $_SESSION['admin_redwan'] = $data['email'];
        redirect('admin-doz/dashboard');
    }else{
        alert('danger','Password Not Match');
        redirect('doz-admin');
    }
}else{
    alert('danger','No account found with this email.');
    redirect('doz-admin');
}



?>