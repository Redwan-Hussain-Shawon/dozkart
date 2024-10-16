<?php
include_once('include/header.php');

?>

<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Multi Column with Form Separator -->
        <div class="card mb-6">
            <h5 class="card-header">Multi Column with Form Separator</h5>
            <form class="card-body">
                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-username">Username</label>
                        <input type="text" id="multicol-username" class="form-control" placeholder="john.doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-email">Email</label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="multicol-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="multicol-email2">
                            <span class="input-group-text" id="multicol-email2">@example.com</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-password-toggle">
                            <label class="form-label" for="multicol-password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="multicol-password" class="form-control" placeholder="············" aria-describedby="multicol-password2">
                                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-password-toggle">
                            <label class="form-label" for="multicol-confirm-password">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="multicol-confirm-password" class="form-control" placeholder="············" aria-describedby="multicol-confirm-password2">
                                <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-6 mx-n6">
                <h6>2. Personal Info</h6>
                <div class="row g-6">
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-first-name">First Name</label>
                        <input type="text" id="multicol-first-name" class="form-control" placeholder="John">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-last-name">Last Name</label>
                        <input type="text" id="multicol-last-name" class="form-control" placeholder="Doe">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-country">Country</label>
                        <div class="position-relative"><select id="multicol-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="multicol-country" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 481.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-multicol-country-container"><span class="select2-selection__rendered" id="select2-multicol-country-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select value</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                    </div>
                    <div class="col-md-6 select2-primary">
                        <label class="form-label" for="multicol-language">Language</label>
                        <div class="position-relative"><select id="multicol-language" class="select2 form-select select2-hidden-accessible" multiple="" data-select2-id="multicol-language" tabindex="-1" aria-hidden="true">
                                <option value="en" selected="" data-select2-id="4">English</option>
                                <option value="fr" selected="" data-select2-id="5">French</option>
                                <option value="de">German</option>
                                <option value="pt">Portuguese</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 481.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                        <ul class="select2-selection__rendered">
                                            <li class="select2-selection__choice" title="English" data-select2-id="6"><span class="select2-selection__choice__remove" role="presentation">×</span>English</li>
                                            <li class="select2-selection__choice" title="French" data-select2-id="7"><span class="select2-selection__choice__remove" role="presentation">×</span>French</li>
                                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                                        </ul>
                                    </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-birthdate">Birth Date</label>
                        <input type="text" id="multicol-birthdate" class="form-control dob-picker flatpickr-input" placeholder="YYYY-MM-DD" readonly="readonly">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-phone">Phone No</label>
                        <input type="text" id="multicol-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941">
                    </div>
                </div>
                <div class="pt-6">
                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
        </div>

    </div>

</div>



<?php
include_once('include/footer.php');

?>