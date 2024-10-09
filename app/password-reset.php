<?php define('MYSITE',true);
 include_once('../include/header.php');
    if(is_logged_in()){
        header('Location:dashboard');
       exit();
    }
 
?>
<?php include_once('../include/header.php') ?>
<?php include_once('../include/header_main.php') ?>
<section class='bg-light p-5 px-2'>
    <div class="container">
    <div >
        <div class="mx-auto" style="max-width: 520px;">
            <div class="card border-0 align-items-center d-flex flex-column " style='padding: 38px 1.5rem;'>
                <h2 style='font-weight: 600;font-size:25px;color:var(--black)' class='mb-4'>Reset Password                </h2>
                <form action="<?php base_url('send-email') ?>" class="w-100" method="post">
               
                    <input type="email" class="form-control mb-3 <?php echo formError('email')!=false?'border-danger':'' ?>" value="<?php  old_value('email') !== false ? old_value('email') : ''; ?>" placeholder="Email" name="email" required >
                    <input type="submit" name='submit_email_rest' value='Send Reset OTP' class='btn btn-primary d-block w-100 mt-4 py-2 mb-3'>
                </form>
                <span><a href="<?php base_url('login') ?>" class='text-primary' style='font-size:15px'>Login</a></span>
            </div>
        </div>
    </div>
    </div>
</section>


<?php include_once('../include/footer.php') ?>