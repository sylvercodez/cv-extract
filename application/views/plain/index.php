<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
            <!-- Start hero-section -->
            <section class="hero-section relative" id="head">
                <div class="container">
                    <div class="row fullscreen align-items-center relative">
                        <div class="col-lg-6 content-wrap">
                            <h1>
                                Get your CV done <br>
                                in just 15 minutes
                            </h1>
                            <p class="pt-20 pb-20 mw-510">
                                You have only <strong>6 seconds</strong> to impress or loose your next employer. Advance Vitae helps you create a visually appealing Resume. Start with one of our carefully designed templates
                            </p>
                            <a href="<?= base_url('cvs')?>" class="genric-btn">Browse Templates</a>
                        </div>
                    </div>
                </div>
                <img class="hero-img" src="<?= asset_url('plain/img/hero/hero-img.png')?>" alt="">             
            </section>
            <!-- End hero-section -->  

            <!-- Start feature section -->
            <section class="feature-section pb-120 pt-90" id="feature">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 feature-left">
                            <div class="feature-left-wrap row">
                            <?php //foreach($quotes as $key=>$val):?>
                                 <div class="col-lg-6 col-md-6">
                                     <div class="single-feature d-flex flex-row align-items-center aquablue-bg">
                                         <div class="icon">
                                             <img class="img-fluid" src="<?= asset_url('plain/img/feature/i1.png')?>" alt="">
                                         </div>
                                         <div class="desc ml-20">
                                             <a href="index.html#">
                                                 <h4>Dummy Title</h4>
                                             </a>
                                             <p class="pt-10 mb-0">
                                                 Some days a motivational quote can provide a quick.
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                        <?php //endforeach;?>
                                 <div class="col-lg-6 col-md-6">
                                     <div class="single-feature d-flex flex-row align-items-center aquablue-bg">
                                         <div class="icon">
                                             <img class="img-fluid" src="<?= asset_url('plain/img/feature/i2.png')?>" alt="">
                                         </div>
                                         <div class="desc ml-20">
                                             <a href="index.html#">
                                                 <h4>Dummy Title</h4>
                                             </a>
                                             <p class="pt-10 mb-0">
                                                 Some days a motivational quote can provide a quick.
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6">
                                     <div class="single-feature d-flex flex-row align-items-center aquablue-bg">
                                         <div class="icon">
                                             <img class="img-fluid" src="<?= asset_url('plain/img/feature/i3.png')?>" alt="">
                                         </div>
                                         <div class="desc ml-20">
                                             <a href="index.html#">
                                                 <h4>Dummy Title</h4>
                                             </a>
                                             <p class="pt-10 mb-0">
                                                 Some days a motivational quote can provide a quick.
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6">
                                     <div class="single-feature d-flex flex-row align-items-center aquablue-bg">
                                         <div class="icon">
                                             <img class="img-fluid" src="<?= asset_url('plain/img/feature/i4.png')?>" alt="">
                                         </div>
                                         <div class="desc ml-20">
                                             <a href="index.html#">
                                                 <h4>Dummy Title</h4>
                                             </a>
                                             <p class="pt-10 mb-0">
                                                 Some days a motivational quote can provide a quick.
                                             </p>
                                         </div>
                                     </div>
                                 </div>                                                                                                   
                            </div>
                        </div>
                        <div class="col-lg-4 text-right feature-right">
                            <h1>
                                Dummy Title
                            </h1>
                            <p class="pt-20">
                                Some days a motivational quote can provide a quick. Some days a motivational quote can provide a quick. Some days a motivational quote can provide a quick.
                            </p>
                        </div>
                    </div>
                </div>    
            </section>
            <!-- End feature Area -->      
            

            <!-- Start price section -->
            <section class="cta-section section-gap gradient-bg" id="price">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h1 class="text-white">Make yourself an efficient & beautifully
                            designed CV for just &#8358;1,500 only</h1>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex flex-row justify-content-end cta-btn">
                                <a href="<?= base_url('cvs')?>" class="ct-btn">View Templates</a>
                                <a href="register.html" class="ct-btn active">Register</a>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>
             <!-- End price section -->
            
            <!-- Start contact section -->
            <section class="contact-section section-gap" id="contact">
                <div class="container">
                    <div class="row justify-content-center section-title-wrap">
                        <div class="col-lg-12">
                            <h1>We'd love to hear from you</h1>  
                            <p>
                                Advance Vitae team provides support via email. If you have a question about our Services, a question or need general information then do not hesitate to contact us. Please note that we are located in timezone GMT + 1 and because of timezone differences we might not be in office at times convenient for you. Our office hours are between 9 AM and 6 PM GMT + 1.
                            </p>                            
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-start">
                        <div class="col-lg-6 col-md-6 contact-left">
                            <div class="map-wrap relative" id="map"></div>
                            <span id="add-show" class="show-btn lnr lnr-chevron-right"></span>
                            <div class="contact-info">
                                <!-- <span id="add-hide" class="cross-btn lnr lnr-cross"></span> -->
                                <div class="single-line d-flex flex-row">
                                    <div class="icon">
                                        <span class="lnr lnr-home"></span>
                                    </div>
                                    <div class="desc">
                                        <h4>Lagos, Nigeria</h4>
                                        <p>Address</p>
                                    </div>
                                </div>
                                <div class="single-line d-flex flex-row">
                                    <div class="icon">
                                        <span class="lnr lnr-phone-handset"></span>
                                    </div>
                                    <div class="desc">
                                        <a href="tel:00(440)98655629865"></a><h4>+234 (0)803 248 3336</h4>
                                        <p>Mon to Fri 9am to 6 pm</p>
                                    </div>
                                </div>
                                <div class="single-line d-flex flex-row">
                                    <div class="icon">
                                        <span class="lnr lnr-envelope"></span>
                                    </div>
                                    <div class="desc">
                                        <h4>support@advancecv.com</h4>
                                        <p class="mb-0">Send us your query anytime!</p>
                                    </div>
                                </div>                                                                
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 contact-right">
                            <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">

                                <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                                <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                                <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">

                                <textarea class="common-textarea form-control" cols="30" rows="7" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>

                                <div class="d-flex flex-column">
                                    <button class="genric-btn d-block mt-30 mr-0 ml-auto">Send Message</button>
                                    <div class="alert-msg"></div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>    
            </section>
            <!-- End contact section -->

