<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- Start page-top section -->
    <section class="page-top-section" style="padding-top: 140px;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6">
                    <h1 class="text-white">Templates</h1>
                </div>
                <div class="col-lg-6  col-md-6 page-top-nav">
                    <div><a href="index.html">Home</a> <span class="lnr lnr-arrow-right"></span> <a href="#">Templates</div>
                </div>
            </div>
        </div>    
    </section>
    <!-- End page-top section -->

    <!-- Start price section -->
    <section class="price-section section-gap">
        <div class="container">
            <div class="row justify-content-center section-title-wrap">
                <div class="col-lg-12">
                    <h1>Get your CV done in just 15 minutes.</h1>
                    <p style="color: #777777;">You have only 6 seconds to impress or loose your next employer. Advance Vitae helps you create a visually appealing Resume. Start with one of our carefully designed templates.</p>
                </div>
            </div>
            <div class="row">
            <?php foreach($cvs as $key=>$val):?>
                <div class="col-lg-4 col-sm-6" style="margin-top: 50px;">
                    <a href="<?php echo base_url(); ?>cvs/<?php echo isset($oldinfo)?'cvready/'.$val->id:'fillinfo/'.$val->id; ?>">
                        <div class="single-price2" style="background-image: url('<?php echo asset_url('cvs/'.$val->image); ?>');">
                        <div class="overlay-hover" style="height: 100%; width: 100%;"></div>
                    </div></a>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>
        <!-- End price section -->                  
