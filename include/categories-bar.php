<?php
if (!defined('MYSITE')) {
    header("location:../home");
}
?>
<div class='bg-white shadow-sm h-full rounded-1 mb-4'>
    <h3 class='d-flex mb-0 justify-content-between bg-primary text-white' style='border-radius:0.25rem 0.25rem 0 0;font-size:1.2rem;padding:13px 1rem;'>Categories <a href='<?php base_url('categories') ?>' style='font-size: 1rem;' class='text-white'> See All</span></h3>
    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Grocery<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>
        <div class='dropdown-menu categories '>
            <div class=' d-flex gap-5'>
                <ul class="p-3 list-unstyled d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                    <li class="text-black fw-medium">GHEE & OILS
                        <ul>
                            <li><a href="<?php base_url('categories?search=GHEE') ?>" class="hover-primary pointer text-paragraph fw-normal">GHEE</a></li>
                            <li><a href="<?php base_url('categories?search=olivi oil') ?>" class="hover-primary pointer text-paragraph fw-normal">OLIVE OIL</a></li>
                        </ul>
                    </li>
                    <li class="text-black fw-medium">MASALAAS & SPICES
                        <ul>
                            <li><a href="<?php base_url('categories?search=Whole spice') ?>" class="hover-primary pointer text-paragraph fw-normal">Whole spice</a></li>
                            <li><a href="<?php base_url('categories?search=spice powder') ?>" class="hover-primary pointer text-paragraph fw-normal">Spice Powder </a></li>
                        </ul>
                    </li>
                    <li class="text-black fw-medium">Dry fruits & nuts
                        <ul>
                            <li><a href="<?php base_url('categories?search=Cashew nuts') ?>" class="hover-primary pointer text-paragraph fw-normal">Cashew nuts</a></li>
                            <li><a href="<?php base_url('categories?search=Date Risins') ?>" class="hover-primary pointer text-paragraph fw-normal">Date & Risins</a></li>
                            <li><a href="<?php base_url('categories?search=dry fruits') ?>" class="hover-primary pointer text-paragraph fw-normal">Dry Fruits </a></li>
                        </ul>
                    </li>
                    <li class="text-black fw-medium">Milk
                        <ul>
                            <li><a href="<?php base_url('categories?search=Milk Powder') ?>" class="hover-primary pointer text-paragraph fw-normal">Milk Powder</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="p-3 list-unstyled d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                    <li class="text-black fw-medium">Snack & Bevarage
                        <ul>
                            <li><a href="<?php base_url('categories?search=cofee') ?>" class="hover-primary pointer text-paragraph fw-normal">Cofee</a></li>
                            <li><a href="<?php base_url('categories?search=Health drinks milk') ?>" class="hover-primary pointer text-paragraph fw-normal">Health drinks milk</a></li>
                        </ul>
                    </li>
                    <li class="text-black fw-medium">Package Food
                        <ul>
                            <li><a href="<?php base_url('categories?search=flakes') ?>" class="hover-primary pointer text-paragraph fw-normal">Flakes</a></li>
                            <li><a href="<?php base_url('categories?search=chocolates sweet') ?>" class="hover-primary pointer text-paragraph fw-normal">Chocolates & Sweet</a></li>
                            <li><a href="<?php base_url('categories?search=jams haney') ?>" class="hover-primary pointer text-paragraph fw-normal">Jams Haney</a></li>
                            <li><a href="<?php base_url('categories?search=achar') ?>" class="hover-primary pointer text-paragraph fw-normal">Achar</a></li>
                            <li><a href="<?php base_url('categories?search=baking flouver') ?>" class="hover-primary pointer text-paragraph fw-normal">Baking Flouver</a></li>
                        </ul>
                    </li>


                    <li class="text-black fw-medium">HOME & KITCHEN
                        <ul>
                            <li><a href="<?php base_url('categories?search=Cookware Serveware') ?>" class="hover-primary pointer text-paragraph fw-normal">Cookware & Serveware</a></li>
                            <li><a href="<?php base_url('categories?search=Dining Cutlery') ?>" class="hover-primary pointer text-paragraph fw-normal">Dining & Cutlery</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   

    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" href="#" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Personal Baby Care<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>
        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Soaps and Body Wash') ?>" class="pointer hover-primary">Soaps & Body Wash</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Baby Bath Skin Care') ?>" class="pointer hover-primary">Baby Bath & Skin Care</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=CareOral Care') ?>" class="pointer hover-primary">CareOral Care</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Deos and Perfumes and Talc') ?>" class="pointer hover-primary">Deos, Perfumes & Talc</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Creams and Lotions and Skin Care') ?>" class="pointer hover-primary">Creams, Lotions, Skin Care</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Kajal Makeup') ?>" class="pointer hover-primary">Kajal Makeup</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Wellness and Common Pharma') ?>" class="pointer hover-primary">Wellness & Common Pharma</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Shaving Needs') ?>" class="pointer hover-primary">Shaving Needs</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Baby Foods') ?>" class="pointer hover-primary">Baby Foods</a></li>
            </ul>
        </div>

    </div>

    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" href="#" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Pet Food Supply<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>
        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Dog') ?>" class="pointer hover-primary"> DOG</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=Cat') ?>" class="pointer hover-primary">CAT</a></li>
                <li class="pointer hover-primary"><a href="<?php base_url('categories?search=FISH and AQUAITIS') ?>" class="pointer hover-primary">FISH & AQUAITIS</a></li>
            </ul>
        </div>

    </div>


    <!-- Old  -->


    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" href="#" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Fashion<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>
        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li><a href="<?php base_url('categories?search=Shoe Laces ') ?>" class="hover-primary pointer text-paragraph fw-normal">Shoe Laces </a></li>
                <li><a href="<?php base_url('categories?search=Mens Casual Shoes') ?>" class="hover-primary pointer text-paragraph fw-normal">Men’s Casual Shoes</a></li>
                <li><a href="<?php base_url('categories?search=Mens Sports Shoes') ?>" class="hover-primary pointer text-paragraph fw-normal">Men’s Sports Shoes</a></li>
                <li><a href="<?php base_url('categories?search=Mens Formal Shoes') ?>" class="hover-primary pointer text-paragraph fw-normal">Mens Formal Shoes</a></li>
                <li><a href="<?php base_url('categories?search=Mens Sandals and Floaters') ?>" class="hover-primary pointer text-paragraph fw-normal">Men’s Sandals & Floaters</a></li>
                <li><a href="<?php base_url('categories?search=Mens Slippers and Flip Flops') ?>" class="hover-primary pointer text-paragraph fw-normal">Men's Slippers & Flip Flops</a></li>
                <li><a href="<?php base_url('categories?search=Mens Ethnic Shoes') ?>" class="hover-primary pointer text-paragraph fw-normal">Men's Ethnic Shoes</a></li>
                <li><a href="<?php base_url('categories?search=Shoe Care') ?>" class="hover-primary pointer text-paragraph fw-normal">Shoe Care</a></li>
                <li><a href="<?php base_url('categories?search=WOMAN FOOT WEAR') ?>" class="hover-primary pointer text-paragraph fw-normal">WOMAN- FOOT WEAR</a></li>
                <li><a href="<?php base_url('categories?search=WATCH') ?>" class="hover-primary pointer text-paragraph fw-normal">WATCH <a></li>
                <li><a href="<?php base_url('categories?search=BAG LAGAGE') ?>" class="hover-primary pointer text-paragraph fw-normal">BAGLAGAGE</a></li>

            </ul>
        </div>
    </div>

    <div class="dropdown categories-main px-3">
        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li class="pointer hover-primary"><a class="pointer hover-primary" href="<?php base_url('categories?search=Camera Accessories') ?>" class="pointer hover-primary">Camera Accessories</a> </li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Health and Personal Care') ?>">Health & Personal Care</a> </li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Mobile Accessories') ?>">Mobile Accessories</a></li>
            </ul>
        </div>
    </div>

    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" href="#" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Home & Appliance<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>
        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li class="pointer hover-primary" ><a href="<?php base_url('categories?search=Home Decor') ?>" >Home Decor</a></li>
                <li class="pointer hover-primary" ><a href="<?php base_url('categories?search=Light') ?>" >Light</a></li>
                <li class="pointer hover-primary" ><a href="<?php base_url('categories?search=Belender') ?>" > Belender</a></li>
            </ul>
        </div>
    </div>

    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" href="#" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Electronices <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>

        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li class="pointer hover-primary"><a class="pointer hover-primary" href="<?php base_url('categories?search=Camera Accessories') ?>" class="pointer hover-primary">Camera Accessories</a> </li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Health and Personal Care') ?>">Health & Personal Care</a> </li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Mobile Accessories') ?>">Mobile Accessories</a></li>
            </ul>
        </div>
    </div>
    
   

    <div class="dropdown categories-main px-3">
        <a class="btn hover-primary px-0 btn-secondary rounded-0  d-flex justify-content-between" href="#" role="button" data-bs-toggle="" aria-expanded="false" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
        Stationery Items <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" d="m10 17l5-5l-5-5" />
            </svg>
        </a>

        <div class='dropdown-menu categories'>
            <ul class="p-3 d-flex flex-column gap-2" style='list-style:disc;padding-left:35px !important'>
                <li class="pointer hover-primary"><a class="pointer hover-primary" href="<?php base_url('categories?search=Color pencil') ?>" class="pointer hover-primary">Color pencil</a> </li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Pencil') ?>">Pencil</a> </li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Water Colour') ?>">Water Colour</a></li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Pen') ?>">Pen</a></li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Erasner') ?>">Erasner</a></li>

                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Sharpner') ?>">Sharpner</a></li> 
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Geometry') ?>">Geometry</a></li>
                <li class="pointer hover-primary"> <a class="pointer hover-primary" href="<?php base_url('categories?search=Oil Pastels')?>">Oil Pastels</a></li>

            </ul>
        </div>
    </div>
    <div class="dropdown categories-main px-3">
        <a class="btn px-0 hover-primary btn-secondary  rounded-0  d-flex justify-content-between py-2" href="<?php base_url('categories?search=Mobile') ?>" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Mobile
        </a>

    </div>
    <div class="dropdown categories-main px-3">
        <a class="btn px-0 hover-primary btn-secondary  rounded-0  d-flex justify-content-between py-2" href="<?php base_url('categories?search=Cosmetics') ?>" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Cosmetics
        </a>
    </div>
    <div class="dropdown categories-main px-3">
        <a class="btn px-0 hover-primary btn-secondary  rounded-0  d-flex justify-content-between py-2" href="<?php base_url('categories?search=Automobile Accessories') ?>" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
            Automobile Accessories
        </a>
    </div>
    <div class="dropdown categories-main px-3">
        <a class="btn px-0 hover-primary btn-secondary  rounded-0  d-flex justify-content-between py-2" href="<?php base_url('categories?search=  Students Kit') ?>" style='font-size: 14px;border-bottom:1px solid var(--primary)'>
        Students Kit
        </a>
    </div>
</div>