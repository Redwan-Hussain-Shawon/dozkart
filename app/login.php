<?php define('MYSITE',true);
 include_once('../include/header.php');
    if(is_logged_in()){
        header('Location:dashboard');
       exit();
    }
    include('../include/googleClient.php');
    include('../include/facebookClient.php');
    
$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl(FACEBOOK_REDIRECT_URI, $permissions);
 
?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php') ?>
<section class='bg-light p-5 px-2'>
    <div class="container">
    <div >
        <div class="mx-auto" style="max-width: 520px;">
            <div class="card border-0 align-items-center d-flex flex-column " style='padding: 38px 1.5rem;'>
                <h2 style='font-weight: 600;font-size:25px;color:var(--black)' class='mb-4'>Loing Your Account</h2>
                <form action="<?php base_url('process-login') ?>" class="w-100" method="post">
               
                    <input type="email" class="form-control mb-3 <?php echo formError('email')!=false?'border-danger':'' ?>" value="<?php  old_value('email') !== false ? old_value('email') : ''; ?>" placeholder="Email" name="email" required  >
                    <div class="position-relative">
                    <input type="password" class="form-control mb-1 password-show-hide <?php echo formError('password')!=false?'border-danger':'' ?>" placeholder="Password" name="password" required value="<?php  old_value('password') !== false ? old_value('password') : ''; ?>"  >
                    <div class="position-absolute pointer d-none show-password" style="right: 10px;top:10px" onclick="showHidePassword('hide')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </div>

                    <div class="position-absolute pointer hide-password" style="right: 10px;top:10px" onclick="showHidePassword('show')">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                    </div>
                    </div>
                    <a href='<?php base_url('password-reset') ?>' style='font-weight: 400;font-size:14px;color:var(--primary) !important;user-select:none'>Forgot Your Password?</a>
                    <h4 style="font-weight: 500;font-size:15px;text-align:center">OR</h4>
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-2">
                   <div class="border py-1 hover-bg-gray " style="background-color: #f6f6f6;width:fit-content;font-size:14px">
                    <a href="<?php echo $client->createAuthUrl() ?>" class="d-flex px-2 w-100 align-items-center gap-2">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="LgbsSe-Bz112c" width="18" height="19">
  <g>
    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
    <path fill="none" d="M0 0h48v48H0z"></path>
  </g>
</svg>



Continue with Google

</a>
                   </div>
                   <div class="border py-1 hover-bg-gray" style="background-color: #f6f6f6;width:fit-content;font-size:14px">
                    <a href="<?php echo $loginUrl ?>" class="d-flex px-2 w-100 align-items-center gap-2">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none">
  <path fill="#1877F2" d="M15 8a7 7 0 00-7-7 7 7 0 00-1.094 13.915v-4.892H5.13V8h1.777V6.458c0-1.754 1.045-2.724 2.644-2.724.766 0 1.567.137 1.567.137v1.723h-.883c-.87 0-1.14.54-1.14 1.093V8h1.941l-.31 2.023H9.094v4.892A7.001 7.001 0 0015 8z"></path>
  <path fill="#ffffff" d="M10.725 10.023L11.035 8H9.094V6.687c0-.553.27-1.093 1.14-1.093h.883V3.87s-.801-.137-1.567-.137c-1.6 0-2.644.97-2.644 2.724V8H5.13v2.023h1.777v4.892a7.037 7.037 0 002.188 0v-4.892h1.63z"></path>
</svg>



Continue with Facebook

</a>
                   </div>
                   </div>
                    <input type="submit" name='submit_login' class='btn btn-primary d-block w-100 mt-4 py-2 mb-3'>
                </form>
                <span><a href="<?php base_url('registration') ?>" class='text-primary'>Create a Account</a></span>
            </div>
        </div>
    </div>
    </div>
</section>

<?php include_once('../include/footer.php') ?>