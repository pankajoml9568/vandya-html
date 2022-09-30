<section class="bg-blue">
   <div class="container">
       <div class="row">
            <div class="col-md-12">
                <div class="admission-journey-links">
                    <ul>
                        <?php if(basename($_SERVER['REQUEST_URI']) != 'admission-journey.php') { ?>
                            <li><a href="admission-journey.php">Admission Journey</a></li>
                        <?php } ?>
                        
                        <?php if(basename($_SERVER['REQUEST_URI']) != 'fee-structure.php') { ?>
                            <li><a href="fee-structure.php">Fee Structure</a></li>
                        <?php } ?>

                        <?php if(basename($_SERVER['REQUEST_URI']) != '#') { ?>
                            <li><a href="#">Book a Campus Tour</a></li>
                        <?php } ?>

                        <?php if(basename($_SERVER['REQUEST_URI']) != 'open-days.php') { ?>
                            <li><a href="open-days.php">Open Days</a></li>
                        <?php } ?>

                        <?php if(basename($_SERVER['REQUEST_URI']) != 'virtual-tour.php') { ?>
                            <li><a href="virtual-tour.php">Virtual Tour</a></li>
                        <?php } ?>

                        <?php if(basename($_SERVER['REQUEST_URI']) != 'admission-faq.php') { ?>
                            <li><a href="admission-faq.php">Admission FAQ</a></li>
                        <?php } ?>
                        
                        <!-- <li><a href="fee-structure.php">Fee Structure</a></li>
                        <li><a href="#">Book a Campus Tour</a></li>
                        <li><a href="open-days.php">Open Days</a></li>
                        <li><a href="virtual-tour.php">Virtual Tour</a></li>
                        <li><a href="admission-faq.php">Admission FAQ</a></li> -->
                    </ul>
                </div>
            </div>
       </div>
   </div>     
</section>