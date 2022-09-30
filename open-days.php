<?php include('components/header.php'); ?>
<!-- top banner start -->
<section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5"
    style="background-image:url('images/admission-journey-bg.jpg');">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <!-- <h1 class="alt-font text-white opacity-6 margin-20px-bottom">What we offers</h1> -->
                <h2 class="text-white alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">Open days</h2>
            </div>
        </div>
    </div>
</section>
<!-- top banner end -->

<!-- breadcum starts -->
<section class="breadcrum bg-light-grey p-0">
    <div class="container ">
        <ul id="breadcrumbs" class="d-flex">
            <li><a href="#">Admissions</a></li>
            <li><a class="active font-weight-600">Open days</a></li>
        </ul>
    </div>
</section>
<!-- breadcum end -->

<!-- start section -->
<section class="position-relative overflow-visible" style="padding:0px">
    <div class="dark_bg">
        <div class="container">
            <div class="row align-items-lg-center ">
                <div class="col-12 col-lg-5 col-md-5">
                    <img src="images/event-3-big.jpg" class="img-mb-5" alt="" data-no-retina="">
                </div>
                <div class="col-12 col-lg-7 col-md-7">
                    <h4>Open days</h4>
                    <p>To ease the process of admission in our school, we shall facilitate a Campus-Tour for you on a
                        weekday as per your convenience. Prospective students need to see what study and learning
                        opportunities are availabel to them before they make a big decision about how to spend the next
                        few years of their life. Parents can also avail these opportunities to be on the same page and
                        know us better.</p>

                    <p><b>To know more about our next open day</b></p>

                    <a href="#contact-form"
                        class="btn btn-large btn-dark-gray btn-transparent-black btn-transparent-blue btn-rounded d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr popup-with-form closeBtnInside:true">Campus Tour Registation</a>

                    <!-- start contact form -->
                    <form id="contact-form" action="php/save-enquiry.php" method="post"
                        class="white-popup-block col-xl-7 col-lg-7 col-sm-9  p-0 mx-auto mfp-hide">
                        <div class="campus-tour bg-white">
                            <h6 class="text-extra-dark-gray font-weight-500 margin-35px-bottom xs-margin-15px-bottom">Campus Tour Registation</h6>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student Name<span>*</span></label>
                                    <input class="medium-input required" type="text" required name="sname">
                                    <input type="hidden" name="formtype" value="open-days">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student Age<span>*</span></label>
                                    <input class="medium-input required" type="text" autocomplete="of"  maxlength="2" onkeypress="return onlyNumberKey(event)" required name="sage">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Admission Sought to Grade<span>*</span></label>
                                    <input class="medium-input required" type="text" autocomplete="of"  maxlength="2" onkeypress="return onlyNumberKey(event)" required name="grade">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Parent Name<span>*</span></label>
                                    <input class="medium-input required" type="text" required name="parentname">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Parent Phone<span>*</span></label>
                                    <input class="medium-input required" autocomplete="of" type="text" minlength="10" maxlength="15" onkeypress="return onlyNumberKey(event)" required name="parentphone">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Parent Email Id<span>*</span></label>
                                    <input class="medium-input required" type="email" required name="pemailid">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Date of Visit <span1 style="font-size:11px; display:block;">(All days except
                                            Sunday and Gazetted Holidays)
                                        </span1></label>
                                    <input class="medium-input required" type="date" id="userdate" onchange="TDate()" required name="dov">
                                    <span class="text-danger" style="font-size:11px; display:block;" id="datemsg"></span>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label>Query</label>
                                    <textarea class="medium-textarea xs-h-100px xs-margin-10px-bottom" rows="6"
                                        required name="query"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button class="btn btn-medium btn-gradient-sky-blue-pink mb-0"
                                        type="submit">
                                        <span class="spinner-border spinner-border-sm sub_loader" style="display: none;" role="status" aria-hidden="true"></span>Send Message</button>
                                    <div class="form-results d-none"></div>
                                </div>
                            </div>
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->

<?php include('components/journey-sidebar.php'); ?>
<?php include('components/footer.php'); ?>