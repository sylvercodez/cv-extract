<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="container">
                    <div class="row justify-content-center section-title-wrap">
                        <div class="col-lg-12">
                            <h3>Sign in to your AV Account</h3>
                        </div>
                    </div>                       
                    <div class="row align-items-center justify-content-center">
                        <div class="req-demo-left">
                            <form class="form-area contact-form" action="<?php echo base_url('user/login'); ?>" method="post">
                                <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" class="common-input mb-20 form-control" required="" type="email">
                                <input name="password" placeholder="Enter your password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" class="common-input mb-20 form-control" required="" type="password">
                                <button class="genric-btn gradient-bg2 d-block mt-30 mr-0 ml-auto">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>  
      </div>
    </div>

  </div>
</div>

    <!-- start footer Area -->      
    <footer class="footer-area" style="padding: 30px 0;">

        <div class="container">
            <div class="footer-bottom row justify-content-center">
                <p class="footer-text m-0 col-lg-6 col-md-12">Copyright © 2018 All rights reserved to Advance CV</p>
            </div>
        </div>
    </footer>   
    <!-- End footer Area -->

    <script src="<?= asset_url('plain/js/vendor/jquery-2.2.4.min.js')?>"></script>
    <script src="<?= asset_url('plain/js/popper.min.js')?>"></script>
    <script src="<?= asset_url('plain/js/vendor/bootstrap.min.js')?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="<?= asset_url('plain/js/easing.min.js')?>"></script>            
    <script src="<?= asset_url('plain/js/superfish.min.js')?>"></script>
    <script src="<?= asset_url('plain/js/jquery.ajaxchimp.min.js')?>"></script>
    <script src="<?= asset_url('plain/js/owl.carousel.min.js')?>"></script>   
    <script src="<?= asset_url('plain/js/mail-script.js')?>"></script>
    <script src="<?= asset_url('plain/js/main.js')?>"></script>
</body>

</html>