  <?php
    if (!defined('MYSITE')) {
        header("location:../home");
    }
    ?>


  <!-- Demo styles -->
  <style>
      .slider-top {
          overflow: hidden;
      }

      .slider-top .swiper-slide {
          text-align: center;
          font-size: 18px;
          background: #fff;
          display: flex;
          justify-content: center;
          align-items: center;
      }


      .slider-top {
          margin-left: auto;
          margin-right: auto;
      }

      .swiper-pagination-bullet-active {
          background-color: var(--primary);
      }

      .swiper-pagination-clickable .swiper-pagination-bullet {
          width: 10px;
          height: 10px;
      }
  </style>
  <div class='py-3'>
      <div class="container overflow-hidden">
          <div class="row">
              <div class="col-lg-4 d-none d-lg-block pb-3">
                  <?php include_once('../include/categories-bar.php') ?>
              </div>
              <div class="col-lg-8">
                  <div class="slider-top mySwiper position-relative">
                      <div class="swiper-pagination"></div>
                      <div class="swiper-wrapper position-relative">
                          <div class="swiper-slide rounded-1">
                              <img src="<?php base_url('assets/img/slider-1.jpg')?>" alt="" class="rounded-1" style='max-height: 360px;height:auto;width:98%'>
                          </div>
                          <div class="swiper-slide rounded-1">
                              <img src="<?php base_url('assets/img/slider-2.jpg')?>" alt="" class="rounded-1" style='max-height: 360px;height:auto;width:98%'>
                          </div>
                           <div class="swiper-slide rounded-1">
                              <img src="<?php base_url('assets/img/slider-3.png')?>" alt="" class="rounded-1" style='max-height: 360px;height:auto;width:98%'>
                          </div>
                           <div class="swiper-slide rounded-1">
                              <img src="<?php base_url('assets/img/slider-4.png')?>" alt="" class="rounded-1" style='max-height: 360px;height:auto;width:98%'>
                          </div>
                           <div class="swiper-slide rounded-1">
                              <img src="<?php base_url('assets/img/slider-5.png')?>" alt="" class="rounded-1" style='max-height: 360px;height:auto;width:98%'>
                          </div>
                          <div class="swiper-slide rounded-1">
                              <img src="<?php base_url('assets/img/slider-6.png')?>" alt="" class="rounded-1" style='max-height: 360px;height:auto;width:98%'>
                          </div>
                      </div>
                  </div>
                  <div class="d-none d-lg-flex row py-3 px-3 gy-3">
                      <div class="col-md-3 col-sm-6 px-1">
                          <div class='px-2 py-3 shadow-sm d-flex flex-column align-items-center gap-2 rounded-1' style="height: 100%;">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bag-shopping" class="svg-inline--fa fa-bag-shopping text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="22" height="22" style="width: 22px; height: 22px;">
                                  <path fill="currentColor" d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 96c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24zm200-24c0 13.3-10.7 24-24 24s-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24z"></path>
                              </svg>
                              <h4 style='font-size: 17px;' class='mb-0'>Easy to use</h4>
                              <p class='text-center text-paragraph mb-0' style='font-size: 14px;'>Surf, Select, and Purchase. It's that easy to do Cross Border Shopping now.</p>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6 px-1">
                          <div class='px-2 py-3 shadow-sm d-flex flex-column align-items-center gap-2 rounded-1' style="height: 100%;">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="truck" class="svg-inline--fa fa-truck text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="22" height="22" style="width: 22px; height: 22px;">
                                  <path fill="currentColor" d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM208 416c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zm272 48c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48z"></path>
                              </svg>
                              <h4 style='font-size: 17px;' class='mb-0'>Fastest Delivery
                              </h4>
                              <p class='text-center text-paragraph mb-0' style='font-size: 14px;'>Doorstep delivery of Cross Border Trade products in 14 days</p>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6 px-1">
                          <div class='px-2 py-3 shadow-sm d-flex flex-column align-items-center gap-2 rounded-1' style="height: 100%;">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headset" class="svg-inline--fa fa-headset text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22" style="width: 22px; height: 22px;">
                                  <path fill="currentColor" d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"></path>
                              </svg>



                              <h4 style='font-size: 17px;' class='mb-0'>Best Support</h4>
                              <p class='text-center text-paragraph mb-0' style='font-size: 14px;'>Feel free to contact us via Call, Live Chat, and Facebook.</p>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6 px-1">
                          <div class='px-2 py-3 shadow-sm d-flex flex-column align-items-center gap-2 rounded-1' style="height: 100%;">
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="handshake-angle" class="svg-inline--fa fa-handshake-angle text-primary" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="22" height="22" style="width: 22px; height: 22px;">
                                  <path fill="currentColor" d="M543.9 251.4c0-1.1 .1-2.2 .1-3.4c0-48.6-39.4-88-88-88l-40 0H320l-16 0 0 0v16 72c0 22.1-17.9 40-40 40s-40-17.9-40-40V128h.4c4-36 34.5-64 71.6-64H408c2.8 0 5.6 .2 8.3 .5l40.1-40.1c21.9-21.9 57.3-21.9 79.2 0l78.1 78.1c21.9 21.9 21.9 57.3 0 79.2l-69.7 69.7zM192 128V248c0 39.8 32.2 72 72 72s72-32.2 72-72V192h80l40 0c30.9 0 56 25.1 56 56c0 27.2-19.4 49.9-45.2 55c8.2 8.6 13.2 20.2 13.2 33c0 26.5-21.5 48-48 48h-2.7c1.8 5 2.7 10.4 2.7 16c0 26.5-21.5 48-48 48H224c-.9 0-1.8 0-2.7-.1l-37.7 37.7c-21.9 21.9-57.3 21.9-79.2 0L26.3 407.6c-21.9-21.9-21.9-57.3 0-79.2L96 258.7V224c0-53 43-96 96-96z"></path>
                              </svg>


                              <h4 style='font-size: 17px;' class='mb-0'>Trusted Refund Policy</h4>
                              <p class='text-center text-paragraph mb-0' style='font-size: 14px;'>Shop without Hesitation as you are covered by refund policy

                              </p>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>






  <script>
      var swiper = new Swiper(".slider-top.mySwiper", {
          slidesPerView: 1,
          spaceBetween: 30,
          autoplay: true,
          loop: true,
          pagination: {
              el: ".swiper-pagination",
              clickable: true,
          },
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
      });
  </script>