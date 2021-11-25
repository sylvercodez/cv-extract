<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="mypanel">
        <div class="row">
            <div class="cv-info col-md-4" style="margin-top: 0;">
                <div class="row">
                    <div class="bdr col-md-12">
                        <div class="cv-img">
                            <img src="<?php echo asset_url('cvs/'.$cvinfo->image); ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="bdr col-md-12">
                        <h1>N<?php echo $cvinfo->price; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="cv-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <h1>Fill in your information below.</h1>
                                <h5>We've selected the essential data your next employer wants to see</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo base_url('cvs/savecardinfo'); ?>" method="post">
                                <input type="hidden" name="cv" id="id" value="<?php echo $cvinfo->id; ?>" />
                                <div class="panel panel-widget">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Card Details</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Card Name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="number" id="number" class="form-control input-lg" placeholder="Card Number" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="expiry_date" id="expiry_date" class="form-control datepicker input-lg expiry-date" placeholder="Expiry Date" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="code" id="code" class="form-control input-lg security-code" placeholder="Security Code" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="submit" class="make-payment">Make Payment</button>
                                        <button type="reset" class="cancel">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link type="text/css" href="<?php echo asset_url('css/datetimepicker.css'); ?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo asset_url('js/datetimepicker.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datetimepicker({
            //useCurrent:false,
            //autoclose: true,
            //value:'',
    		//lang:'en',
    		format:'Y-m-d',
    		//formatTime:'H:i',
    		//formatDate:'d-m-Y',
    		//step:60,
    		//closeOnDateSelect:0,
    		//closeOnWithoutClick:true,
    		timepicker:false,
            scrollInput : false,
        });
    })
</script>