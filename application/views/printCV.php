<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="mypanel cv-ready">
        <div class="row">
            <div class="col-md-6">
                <div class="cv-img">
                    <div class="form-group">
                    <?php if (isset($_SESSION['cvdata']['preview'] )):?>
                <div class="cv-img">
                    <img src="<?= base_url('preview/'.$_SESSION['cvdata']['preview']); ?>" />
                </div>
                <?php else: ?>                
                <div class="cv-img">
                    <iframe src="<?=base_url('cvs/preview/'.$this->uri->segment('3')) ?>" style="min-width: 90%; height: 500px; border: none"></iframe>
                </div>
                <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="">
                    <div class="row cv-info">
                        <div class="bdr col-md-12">
                            <div class="print-cv-box">
                                <h2>Wish you the very best.</h2>
                                <button class="make-payment">Print CV</button>                                
                            </div>
                            <a class="btn cv-ready-option" href="<?=base_url('cvs/download/'.$cvinfo->id)?>">Save/Download</a>
                        </div>
                    </div>
                    <?php
                        if($user_id==0){
                            ?>
                            <br />
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?php echo base_url('user/register'); ?>" method="post">
                                        <div class="panel panel-widget sign-in-panel cv-form">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Create an AV account</h3>
                                                <h5>This allows you modify your CVs anytime you Log In</h5>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter name" required="required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Enter email" required="required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Enter Password" required="required" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <button type="submit" class="make-payment">Create Account</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>