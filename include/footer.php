<?php 
if(!defined('MYSITE')){
    header("location:../home");
  }
?></main>
<footer class="primary-50 py-5 overflow-hidden">
    <div class="container">
        <div class="row px-4 gy-5">
            <div class="col-lg-4 col-md-4 col-sm-6  px-2">
                <img src="<?php base_url('assets/img/dozkart.png') ?>" alt="" class='mb-2' style='width: 80px;'>
                <p class='mb-3'>The platform to get product from Amazon. India to Bangladesh. You can pay product price in Bangladeshi Taka (BDT).</p>
                <div class='d-flex align-items-center gap-3 mb-2'>
                    <div class="bg-primary rounded-1 d-flex align-items-center justify-content-center" style='width:30px;height:30px;'>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot w-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 18px; height: 18px;">
                            <path fill="#fff" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path>
                        </svg>
                    </div>
                    <address class='mb-0' style='font-size: 15px;'>Khaza Market, Chandi Bazar Road, Bogura, Bangladesh</address>
                </div>
                <div class='d-flex align-items-center gap-3'>
                    <div class="bg-primary rounded-1 d-flex align-items-center justify-content-center" style='width:30px;height:30px;'>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-flip" class="svg-inline--fa fa-phone-flip w-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 18px; height: 18px;">
                            <path fill="#ffff" d="M347.1 24.6c7.7-18.6 28-28.5 47.4-23.2l88 24C499.9 30.2 512 46 512 64c0 247.4-200.6 448-448 448c-18 0-33.8-12.1-38.6-29.5l-24-88c-5.3-19.4 4.6-39.7 23.2-47.4l96-40c16.3-6.8 35.2-2.1 46.3 11.6L207.3 368c70.4-33.3 127.4-90.3 160.7-160.7L318.7 167c-13.7-11.2-18.4-30-11.6-46.3l40-96z"></path>
                        </svg>

                    </div>
                    <a href="tel:+88 09666 78 3333" style='font-size: 15px;'>+88 01898355605</a><span class='text-black'>(10am - 6pm)</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                <h4 style='font-size: 1.25rem;font-weight:600' class='mb-3'>Company</h4>
                <ul class='list-unstyled d-flex flex-column gap-1'>
                    <li><a href="<?php base_url('about-us') ?>" class="hover-primary" style="font-size: .95rem;">About Us</a></li>
                    <li><a href="<?php base_url('about-of-dozkart') ?>" class="hover-primary"style=" font-size: .95rem;">About of Dozkart </a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 px-2">
                <h4 style='font-size: 1.25rem;font-weight:600' class='mb-3'>Support</h4>
                <ul class='list-unstyled d-flex flex-column gap-1'>
                    <li><a href="#" class=" hover-primary" style="font-size: .95rem;">Help Center</a></li>
                    <li><a href="<?php base_url('terms-conditions') ?>" class="hover-primary" style="font-size: .95rem;">Terms and Conditions</a></li>
                    <li><a href="<?php base_url('privacy-policy') ?>" class="hover-primary" style="font-size: .95rem;">Privacy Policy</a></li>
                    <li><a href="<?php base_url('return-refund-policy') ?>" class="hover-primary" style="font-size: .95rem;">Refund Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 px-2">
                <h4 style='font-size: 1.25rem;font-weight:600' class='mb-3'>Follow Us</h4>
                <div class="d-flex gap-2 mb-3">
                    <a href="https://www.facebook.com/dozkart" target="_blank" class="bg-primary text-center rounded-1 hover-scale text-white d-flex align-items-center justify-content-center" style='width: 40px;height:40px;'><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" style="width: 18px; height: 18px;">
                            <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                        </svg>
                    </a>
                    <a href="#" class="d-flex align-items-center rounded-1 hover-scale justify-content-center bg-primary text-center text-white" style='width: 40px;'><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 18px; height: 18px;">
                            <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                        </svg>
                    </a>
                    <a href="#" class="d-flex align-items-center rounded-1 hover-scale justify-content-center bg-primary text-center text-white" style='width: 40px;'><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 18px; height: 18px;">
                            <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                    </a>
                </div>
                <h4 style='font-size: 1.25rem;font-weight:600' class='mb-3'>Payment Method</h4>
                <div class='d-flex gap-2 flex-wrap'>
                    <a href="<?php base_url('home') ?>">
                        <img src="<?php base_url('assets/img/payment-icons.jpeg') ?>" alt="" style="width:100%;height:81px" class="rounded-1">
                    </a>
                    
                </div>
            </div>
        </div>
    </div>

</footer>
<script>
    if(document.querySelector('.product-scroll.mySwiper')){
        var swiper = new Swiper(".product-scroll.mySwiper", {
            slidesPerView: 1,
            freeMode: true,
            // autoplay: true,
            loop: true,
            breakpoints: {
                1000: {
                    spaceBetween: 10,
                    slidesPerView: 5
                },
                900: {
                    spaceBetween: 10,
                    slidesPerView: 4
                },
                700: {
                    spaceBetween: 10,
                    slidesPerView: 3
                },
                440: {
                    spaceBetween: 10,
                    slidesPerView: 2
                }
            }

        })
    }
    </script>
<script src='<?php base_url('assets/js/fixt.min.js') ?>'></script>
<script src='<?php base_url('assets/js/main.js') ?>'></script>
<script src='<?php base_url('assets/js/script.js') ?>'></script>
</body>

</html>