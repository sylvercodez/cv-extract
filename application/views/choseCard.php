<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="mypanel">
        <div class="row">
            <div class="col-md-6">
                <div class="cv-img">
                    <img src="<?php echo asset_url('cvs/'.$cvinfo->image); ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="cv-info">
                    <div class="row">
                        <div class="bdr col-md-12">
                            <h2>Aswsome! Your CV is ready.</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="bdr col-md-12">
                            <h1>N<?php echo $cvinfo->price; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="bdr col-md-12">
                            <h4>Choose Card Type</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('cvs/cardinfo/mastercard'); ?>"><img src="<?php echo asset_url('images/mastercard-icon.png'); ?>" /></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('cvs/cardinfo/visa'); ?>"><img src="<?php echo asset_url('images/visa-icon.png'); ?>" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('cvs/cardinfo/verve'); ?>"><img src="<?php echo asset_url('images/verve-icon.png'); ?>" /></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="payment-methods">
                                            Payment Methods
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-block cv-cancel-option" href="<?php echo base_url(); ?>">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>