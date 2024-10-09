<?php define('MYSITE',true);
include_once("../include/header.php"); ?>
<?php include_once("../include/header_main.php"); ?>



<section class="py-5">
    <div class='py-2 py-md-5'>
    <div class="container d-flex flex-column flex-md-row justify-content-md-center" style="column-gap:80px;row-gap:30px">
        <div class="d-flex justify-content-center">
            <img src="<?php base_url('assets/img/404.png') ?>" alt="404 image" width="200" height="200">
        </div>
        <div class="">
            <div>
                <h2 class="fw-bolder h3 tracking-twenty text-title-dark text-center text-md-start">Page not found!</h2>
                <h3 class="text-base fw-normal h5 tracking-twenty text-pcolor-light text-paragraph text-center text-md-start" >Sorry, we're unable to find the page you're looking for.</h3>
            </div>
            <div class="d-flex justify-content-md-start mt-3 justify-content-center">
                <a class="bg-primary text-white rounded px-4 py-2" href="<?php base_url('home') ?>">Back to home</a>
            </div>
        </div>
    </div>
    </div>
</section>



<?php include_once("../include/footer.php"); ?>