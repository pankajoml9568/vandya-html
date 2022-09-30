<?php include('components/header.php'); ?>

<section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5"
    style="background-image:url('images/emotional-development-banner.png');">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h2
                    class="text-white alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">Emotional Development</h2>
            </div>
            
        </div>
    </div>
</section>
<!-- end page title -->

<section class="breadcrum bg-light-grey p-0">
    <div class="container ">
        <ul id="breadcrumbs" class="d-flex">
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="#">Emotional Development</a></li>
        </ul>
    </div>
</section>

<!-- start section -->
<section class="extra-big-section cover-background overflow-visible">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center" data-wow-delay="0.4s">
                <h4 class="alt-font text-extra-dark-gray font-weight-600 text-vandya-blue f-40 wow animate__fadeInUp" data-wow-delay="0.45s">Emotional Development</h4>
                <p class="w-95 wow animate__fadeInUp" data-wow-delay="0.5s">The finely intertwined intervention in everyday curricula, Emotional Development, provides developmentally and culturally appropriate instructions to create a caring and engaging learning environment.</p>

                <p class="w-95 wow animate__fadeInUp" data-wow-delay="0.7s">Each carefully throughout endeavor and the trained teacher body helps children apply emotional skills in and out of the school milieu. This is done by addressing the cognitive, social, and emotional dimensions of learning and is an integral part of the very fabric of the curriculum.</p>
            </div>
        </div>
    </div>
</section>
<!-- end section -->

<section class="big-sectionxx wow animate__fadeIn" style="padding-top:0px">
    <div class="containerxx">
        <div class="row justify-content-center">
            <div class="col-12 tab-style-05">
                <div class="tab-box">
                    <!-- start tab navigation -->
                    <ul
                        class="nav nav-tabs margin-1-rem-bottom md-margin-5-rem-bottom xs-margin-15px-lr align-items-center justify-content-center text-uppercase">
                        <li class="nav-item alt-font text-uppercase">
                            <a class="nav-link f-12 active" data-id="#rhsl" href="#rhsl_tab" data-toggle="tab">Relationship, Health, Social and Learning</a>
                        </li>
                        <li class="nav-item alt-font text-uppercase">
                            <a class="nav-link f-12" data-id="#behavioural" href="#behavioural_tab" data-toggle="tab">Behavioural Counselling</a>
                        </li>
                                           
                    </ul>
                    <!-- end tab navigation -->
                </div>

                <div class="tab-content">
                    <!-- start tab content -->
                    <div class="tab-pane med-text fade in active show" id="rhsl_tab">
                        <div class="panel-group accordion-event accordion-style-04" id="accordion1"
                            data-active-icon="icon-feather-minus" data-inactive-icon="icon-feather-plus">
                            <!-- start section -->
                            <section class="position-relative overflow-visible" style="padding:0px">
                                <div class="dark_bg">
                                    <div class="container">
                                        <div class="row align-items-lg-center ">
                                            <div class="col-12 col-lg-5 col-md-5">
                                                <img src="images/relationship-health-social-and-learning.jpg" class="img-mb-5" alt=""
                                                    data-no-retina="">
                                            </div>
                                            <div class="col-12 col-lg-7 col-md-7">
                                                <h4>Relationship, Health, Social and Learning</h4>
                                                <p>Relationship, Health, Social and Emotional Learning is life-long. Taught with a spiral approach to learning, in which children will revisit the same topics at an age-appropriate stage through their school life, the RHSE program includes teaching about personal health, physical and emotional wellbeing, strong emotions, private parts of the body, personal relationships, family structures, trusted adults, life cycles, the dangers of social media, providing an understanding of the ‘Common Good’ and providing the experience of living in the wider world.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- end section -->
                        </div>
                    </div>
                    <!-- end tab content -->

                    <!-- start tab content -->
                    <div class="tab-pane med-text fade in show" id="behavioural_tab">
                        <div class="panel-group accordion-event accordion-style-04" id="accordion1"
                            data-active-icon="icon-feather-minus" data-inactive-icon="icon-feather-plus">
                            <!-- start section -->
                            <section class="position-relative overflow-visible" style="padding:0px">

                                <div class="dark_bg">
                                    <div class="container">
                                        <div class="row align-items-lg-center d-flex">
                                            <div class="col-12 col-lg-5 col-md-5">
                                                <img src="images/behavioural-counselling.jpg" class="img-mb-5" alt=""
                                                    data-no-retina="">
                                            </div>
                                            <div class="col-12 col-lg-7 col-md-7">
                                                <h4>Behavioural Counselling</h4>
                                                <p>Schools are the secondary sphere of socialization, development, and growth for children. Because happy individuals are prime for the development of any community, the Behavioural Counselling program aims to provide relentless support to students and the school community. The endeavour aims to build students’ abilities to deal with any sort of anxiety, trauma, puberty-related discomforts, major-life challenges. Parents and students are encouraged to reach out to the Behavioural Counsellor at school.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end section -->
                        </div>
                    </div>
                    <!-- end tab content -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
<?php include('components/footer.php'); ?>

<script>
    $(function(){
        var hash = location.hash;
        
        if(hash) {
            goToHash(hash);
        }

        $(window).on('hashchange', function() {
            var hash = location.hash;
            if(hash=="#rhsl" || hash=="#behavioural" ) {
                goToHash(hash);
            }
        });
    })

    function goToHash(hash) {
        $("[data-id='"+hash+"']").trigger('click');
        $('html, body').animate({
            scrollTop: $("[data-id='"+hash+"']").offset().top
        });
    }
</script>