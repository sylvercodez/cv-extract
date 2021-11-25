<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="mypanel">
        <div class="row">
            <div class="col-md-12 cv-info" style="margin-top: 10px;margin-bottom: 30px;">
                <div class="bdr">
                    <h1>Get your CV done in just 15 minutes.</h1>
                    <h5 class="color-aqua">Start with one of our carefully designed template</h5>
                </div>
            </div>
        </div>
        <div class="row col-container">
            <?php
                foreach($cvs as $key=>$val){
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="cv-box">
                            <a href="<?php echo base_url(); ?>cvs/<?php echo isset($oldinfo)?'cvready/'.$val->id:'fillinfo/'.$val->id; ?>">
                                <img src="<?php echo asset_url('cvs/'.$val->image); ?>" class="image img-responsive" />
                                <div class="middle">
                                    <div class="text"><img src="<?php echo asset_url('images/select.png'); ?>"/></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center form-group">
                <a id="top" href="#top"><img src="assets/images/top.png" /></a>
            </div>
        </div>
    </div>
</div>