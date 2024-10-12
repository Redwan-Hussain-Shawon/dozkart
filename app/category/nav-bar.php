<nav class="navbar border-primary px-2 py-1 px-lg-0 py-lg-0 border-1 border navbar-expand-lg position-static position-lg-sticky align-items-center shadow-sm bg-white shadow-sm z-0 z-lg-10000   py-0 mb-3 mb-lg-0" style='top:75px;border-radius: 2px;'>
    <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="font-size: 16px;font-weight: 600;color: #111112;  padding-left:0px
">
        <svg width="26" height="26" viewBox="0 0 256 256">
            <path fill="none" d="M0 0h256v256H0z"></path>
            <path fill="none" stroke="#111112" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M148 172H40M216 172h-28"></path>
            <circle cx="168" cy="172" r="20" fill="none" stroke="#111112" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"></circle>
            <path fill="none" stroke="#111112" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M84 84H40M216 84h-92"></path>
            <circle cx="104" cy="84" r="20" fill="none" stroke="#111112" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"></circle>
        </svg>
        Filter
    </button>
    <h5 class='text-paragraph fw-normal d-block d-lg-none mb-0 ' style='font-size: 14px;'>Home / <strong><?php echo isset($query) ? $query : 'All Categories' ?></strong></h5>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-body d-flex flex-column">
            <div class="offcanvas-header p-1 position-absolute" style="right:20px">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="fs-15  border-bottom " style='font-weight: 600;padding:13px 16px;font-size:18px'>
                Filters
            </div>
            <form class="">
                <div class="border-bottom" style="padding:13px 16px">
                    <h4 class="text-black f-14 fw-semibold">CATEGORIES</h4>
                    <h5 class="text-black mb-0 ml-1 f-14 pointer fw-normal">Mixer Grinder</h5>
                </div>
                <div class="border-bottom" style="padding:13px 16px">
                    <h4 class="text-black f-14 fw-semibold">PRICE</h4>
                    <!-- <input type="range" class="input-group "> -->
                    <div class="d-flex gap-2 justify-content-center align-items-center mt-2">
                        <select name=""  class="border p-1 w-100 outline-none f-14" id='min-price'>
                            <option value="">Min</option>
                            <option value="1000">1000</option>
                            <option value="2000">2000</option>
                            <option value="2500">2500</option>
                        </select>
                        to
                        <select name=""  class="border p-1 w-100 outline-none f-14" id='max-price'>
                        <option value="">Max</option>
                            <option value="1000">1000</option>
                            <option value="2000">2000</option>
                            <option value="2500">2500</option>
                        </select>
                    </div>
                </div>
                <div class="border-bottom " style="padding:13px 16px">
                    <h4 class="text-black f-14 d-flex align-items-center pointer  justify-content-between mb-0 categoryClick user-select-none">
                        BRAND
                        <svg width="8" height="12" viewBox="0 0 16 27" style="transform: rotate(-89deg)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"></path>
                        </svg>
                    </h4>

                    <div class="collapse " style="margin-top: 11px;">
                        <div class="d-flex flex-column gap-3">
                            <label for="flipkart" class="d-flex align-items-center gap-2  pointer">
                                <input type="checkbox" class="form-check" id="flipkart" value="amazon">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">Flipkart</h5>
                            </label>
                            <label for="amazon" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="amazon" value="flipcart">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">Amazon</h5>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="border-bottom " style="padding:13px 16px">
                    <h4 class="text-black f-14 d-flex align-items-center pointer  justify-content-between mb-0 categoryClick fw-semibold user-select-none">
                        SIZE
                        <svg width="8" height="12" viewBox="0 0 16 27" style="transform: rotate(-89deg)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"></path>
                        </svg>
                    </h4>

                    <div class=" " style="margin-top: 11px;">
                        <div class="d-flex flex-column gap-3">
                            <label for="3jar" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check" id="3jar" value="3 Jar">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">3 Jar</h5>
                            </label>
                            <label for="4jar" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="4jar" value="4 Jar">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">4 Jar</h5>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="border-bottom " style="padding:13px 16px">
                    <h4 class="text-black f-14 d-flex align-items-center pointer  justify-content-between mb-0 categoryClick fw-semibold user-select-none">
                        COLOR
                        <svg width="8" height="12" viewBox="0 0 16 27" style="transform: rotate(-89deg)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"></path>
                        </svg>
                    </h4>

                    <div class="collapse " style="margin-top: 11px;">
                        <div class="d-flex flex-column gap-3">
                            <label for="black" class="d-flex align-items-center gap-2 ">
                                <input type="checkbox" class="form-check" id="black" value="Black">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">Black</h5>
                            </label>
                            <label for="red" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="red" value="Red">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">Red</h5>
                            </label>
                            <label for="white" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="white" value="White">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">White</h5>
                            </label>
                             <label for="blue" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="blue" value="Blue">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">Blue</h5>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="border-bottom " style="padding:13px 16px">
                    <h4 class="text-black f-14 fw-semibold d-flex align-items-center pointer  justify-content-between mb-0 categoryClick user-select-none" >
                    CUSTOMER RATINGS 
                        <svg width="8" height="12" viewBox="0 0 16 27" style="transform: rotate(-89deg)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#878787"></path>
                        </svg>
                    </h4>

                    <div class="collapse " style="margin-top: 11px;">
                        <div class="d-flex flex-column gap-3">
                        <label for="rating4" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="rating4" value="4">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">4★ & above</h5>
                            </label>
                            <label for="rating3" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check" id="rating3" value="3">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">3★ & above</h5>
                            </label>
                          
                            <label for="rating2" class="d-flex align-items-center gap-2 pointer">
                                <input type="checkbox" class="form-check " id="rating2" value="White">
                                <h5 class="text-black mb-0  f-14 fw-normal pointer hover-primary">2★ & above</h5>
                            </label>

                        </div>
                    </div>
                </div>
               <div class="d-flex mt-3">
               <a href="" class="btn w-100" style="border-radius: 2px;background:#f6f6f6">Cancel</a>
               <button class="btn btn-primary w-100" style="border-radius: 2px;" onclick="filterSubmit() ">Submit</button>
               </div>


                        </form>

        </div>

    </div>
</nav>
<script>
  
</script>