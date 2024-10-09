<?php define('MYSITE',true);
include_once('../include/header.php'); 
if(is_logged_in()){
    header('Location:dashboard');
   exit();
}
allowDomin();
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
if(isset($_POST['submit_new_password'])){
    $otp = mysqli_real_escape_string($conn,trim($_POST['otp']));
    $password = mysqli_real_escape_string($conn,trim($_POST['new-password']));
    $jwt = $_SESSION['opt_rest_password'];
    try{
        $decoded = JWT::decode($jwt,new Key(JWT_SECRET_KEY,'HS256'));
        $session_otp = $decoded->otp;
        $email = $decoded->email;
        if ($otp == '' || $password == '') {
            alert('danger', 'Input Field Cannot be Empty');
            header('Location: verify-password');
            exit();
        }else{
        if($session_otp == $otp){
            if(strlen($password) < 6) {
                $_SESSION['form']['otp'] = $otp;
                $_SESSION['form']['error']['new-password']=$password;
                alert('danger', 'Your password must be at least 6 characters long.');
                header('Location: verify-password');
                exit();
            } else if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                $_SESSION['form']['otp'] = $otp;
                $_SESSION['form']['error']['new-password']=$password;
                alert('danger', 'Your password must include at least one special character.');
                header('Location: verify-password');
                exit();
            }else{
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE user set password='$password' WHERE email='$email'";
                if ($conn->query($sql)) {
                    alert('success', 'Password updated successfully!');
                    $sql = "SELECT id FROM user WHERE email='$email'";
                    $result = $conn->query($sql);
                    $data = $result->fetch_assoc();
                    $user_id = $data['id'];
                    notifications($user_id,'Password updated successfully');
                    header('Location: login');
                    exit();
                }
            }
        }else{
            $_SESSION['form']['new-password'] = $password;
            $_SESSION['form']['error']['otp']=$otp;
            alert('danger', 'The OTP you entered is incorrect . Please try again or request a new OTP. ');
            header('Location: verify-password');
            exit();
        }
        
    }



    }catch (Exception $e) {
        echo "<h2 class='text-danger'>Caught exception: ",  $e->getMessage(), "\n" ."</h2>";
        exit();
}
   
    

   


}

 include_once('../include/header.php');
    if(is_logged_in()){
        header('Location:dashboard');
       exit();
    }
 
?>

<?php include_once('../include/header_main.php') ?>



<section class='bg-light p-5 px-2'>
    <div class="container">
    <div >
        <div class="mx-auto" style="max-width: 520px;">
            <div class="card border-0 align-items-center d-flex flex-column " style='padding: 38px 1.5rem;'>
                <h2 style='font-weight: 600;font-size:25px;color:var(--black)' class='mb-4'>Verify and Set New Password                </h2>
                <form  class="w-100" method="post">
               
                    <input type="text" class="form-control mb-3 <?php echo formError('otp')!=false?'border-danger':'' ?>" value="<?php  old_value('otp') !== false ? old_value('otp') : ''; ?>" placeholder="OTP" name="otp" required >
       
                    <div class="position-relative">
                    <input type="password" class="form-control mb-3 password-show-hide <?php echo formError('new-password')!=false?'border-danger':'' ?>" value="<?php  old_value('new-password') !== false ? old_value('new-password') : ''; ?>" placeholder="New Password" name="new-password" required >
                        <div class="position-absolute pointer d-none show-password" style="right: 10px;top:10px" onclick="showHidePassword('hide')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </div>

                    <div class="position-absolute pointer hide-password" style="right: 10px;top:10px" onclick="showHidePassword('show')">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                    </div>
                    </div>
                    <input type="submit" name='submit_new_password' value='Submit' class='btn btn-primary d-block w-100 mt-4 py-2 mb-3'>
                </form>
                <span><a href="<?php base_url('password-reset') ?>" class='text-primary' style='font-size:15px'>Resend OTP </a></span>
            </div>
        </div>
    </div>
    </div>
</section>


<?php include_once('../include/footer.php') ?>