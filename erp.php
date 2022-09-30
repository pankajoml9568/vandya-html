<?php include('components/header.php'); ?>

<!-- top banner start -->
<section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('images/erp-banner.jpg');">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <!-- <h1 class="alt-font text-white opacity-6 margin-20px-bottom">What we offers</h1> -->
                <h2 class="text-white alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">ERP</h2>
            </div>
             
        </div>
    </div>
</section>
<!-- top banner end -->
<!-- breadcum starts -->
<section class="breadcrum bg-light-grey p-0">
    <div class="container ">
        <ul id="breadcrumbs" class="d-flex">
            <li><a href="#">Get Involved</a></li>
            <li><a class="active font-weight-600">ERP</a></li>
        </ul>
    </div>
</section>
<!-- breadcum end -->

<!-- start section -->
<section class="extra-big-section cover-background overflow-visible bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 col-md-6" data-wow-delay="0.4s">
                <h4 class="alt-font text-extra-dark-gray font-weight-600 margin-30px-bottom text-vandya-orange f-40 wow animate__fadeInUp" data-wow-delay="0.45s">ERP</h4>

                <p class="w-95 wow animate__fadeInUp" data-wow-delay="0.5s">Vandya International School uses Fedena to update and keep all student and staff records. Each parent and student is provided with an individual login to access personal information, assessment records, assignments, study material, attendance records, time-table, leave records, and much more. The school communicates with the parents through official emails and through messages via Fedena (ERP) platform.</p>

                <!-- <p class="w-95 wow animate__fadeInUp" data-wow-delay="0.5s"><em>Comment: Can we two tabs: Parent Login and Student Login</em></p> -->

            </div>

            <div class="col-12 col-lg-6 col-md-6 erp_cont" data-wow-delay="0.4s">
                <div class="erp_form">
                    
                <form>                        
                    <legend>Sign in to your account</legend>                        
                    <div class="">
                         <input type="text" id="" class="form-control" placeholder="User Name">
                    </div>
                    <div class="">                        
                        <input type="text" id="" class="form-control" placeholder="Password">
                    </div>                        
                    <button type="submit" class="btn btn-primary vandya-btn">Sign In</button>                    

                    <div class="row">
                        <div class="col checkbox">
                            <input type="checkbox"><span>Keep Me login</span>
                        </div>
                        <div class="col forgot">
                            <a href="#">Forgot your Password?</a>
                        </div>
                    </div>
                    <div class="other_loging">Other Login</div>

                    <button type="submit" class="btn btn-primary vandya-btn" style="background-color:#000">Parents Login</button>  

                    <button type="submit" class="btn btn-primary vandya-btn" style="background-color:#8bc34a">Teachers Login</button>  

                    <button type="submit" class="btn btn-primary vandya-btn" style="background-color:#607d8b">Admin Login</button>  

                </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
 

<?php include('components/footer.php'); ?>