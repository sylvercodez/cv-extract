<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$colors = array('#FECACE','#D7FFC1','#FCFFC6','#C7FFFC','#FFCCF2','#F1D0FF');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Advance Vitae</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/cvs/orbit/bootstrap_print.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cvs/orbit/font-awesome.css') ?>">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" media="all" href="<?= asset_url('css/style.css'); ?>" rel="stylesheet" />
    <script type="text/javascript" src="<?= asset_url('js/jquery-3.3.1.min.js'); ?>"></script>
</head>
<body style="background: #fff !important;">
<div class="container" style="min-width: 1000px; !important">

    <div class="cv-img">
        <div class="form-group" style="padding-left: 20px;padding-right: 20px;">
            <!--<img src="<?php //echo asset_url('cvs/'.$cvinfo->image); ?>" />-->
            <div id="header" style="width: 100%; min-height: 180px; background: #fb4d57 !important; color: #fff !important;">
                <div class="row" >
                    <div class="col-xs-2">
                        <div>
                            <img class="img img-circle " style="height: 150px;" src="<?= base_url('uploads/'.$image); ?>" />
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div style="padding-top: 20px; text-transform: uppercase;">
                            <h2 style="font-weight: bold;color: #fff !important; margin-bottom: 0px;"><?= @$name?></h2>
                            <p style="color: #fff !important; font-size: 18px;"><?= @$job_title; ?></p>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="row" style="word-wrap: break-word; padding: 10px; margin-top: 10px;">
                            <div class="col-xs-6">
                                <ul class="list-unstyled contact-list">
                                    <li class="phone"><p> <i class="fa fa-phone"></i><a href="tel:<?=@$phone ?>"><?=@$phone ?></a> </p></li>                        
                                    <li class="email"><p> <i class="fa fa-envelope"></i><a href="mailto: <?=@$email ?>"><?=@$email ?></a> </p></li>
                                    <?php if( isset($address) && $address): ?><li class="address"><p> <i class="fa fa-map-marker"></i><?=@$address ?> </p></li><?php endif; ?>
                                    <?php if( isset($website) && $website): ?><li class="website"><p> <i class="fa fa-globe"></i><a href="<?=@$website ?>" target="_blank"><?=@$website ?></a> </p></li><?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-xs-6">
                                <ul class="list-unstyled contact-list" style="word-wrap: break-word;">
                                    <?php if( isset($linkedin) && $linkedin): ?><li class="linkedin"><p> <i class="fa fa-linkedin"></i><a href="https://<?= @$linkedin?>" target="_blank"><?= @$linkedin?></a></p></li><?php endif; ?>
                                    <?php if( isset($facebook) && $facebook): ?><li class="facebook"><p> <i class="fa fa-facebook"></i><a href="https://<?= @$facebook?>" target="_blank"><?= @$facebook?></a></p></li><?php endif; ?>
                                    <?php if( isset($twitter) && $twitter): ?><li class="twitter"><p> <i class="fa fa-twitter"></i><a href="https://<?= @$twitter?>" target="_blank">@<?= @$twitter?></a></p></li><?php endif; ?>
                                    <?php if( isset($instagram) && $instagram): ?><li class="instagram"><p> <i class="fa fa-instagram"></i><a href="https://<?= @$instagram?>" target="_blank">@<?= @$instagram?></a></p></li><?php endif; ?>
                                </ul>
                            </div><!--//contact-container-->
                        </div><!--//contact-container-->
                    </div>
                </div>
            </div>
            <div style="background-color: #EBEBEB; !important;padding: 15px !important;">

                

                <div class="row" style="margin: 10px;">
                    <div class="col-xs-8">
                        <div>
                            <div>
                                <h4 style="color: #FB4D57 !important; font-weight: bolder;">ABOUT ME</h4>
                            </div>
                            <div class="" style="padding-top: 10px;">
                                <p style="background-color: #c5ecd8b3; padding: 10px;"><?= $description; ?></p>
                            </div>
                        </div>
                        <div>
                            <div>
                            <h4 style="color: #FB4D57 !important; font-weight: bolder;">WORK HISTORY </h4>
                            </div>
                            <div class="">
                                <?php
                                foreach($experience as $key=>$val){
                                    ?>
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <!-- <img src="img_avatar1.png" class="media-object" style="width:60px"> -->
                                                <label class="label-success" style="padding: 0px 5px;background-color: #D7FFC1 !important;"><?= $val['start']; ?></label><br>
                                                |<br>
                                                <label class="label-success" style="padding: 0px 5px;background-color: #FECACD !important;"><?= $val['end']; ?></label>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?= $val['company']; ?></h4>
                                                <small><i><?= $val['title']; ?></i></small>
                                                <p><?= $val['description']; ?></p>    
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 style="color: #FB4D57 !important; font-weight: bolder;">HOBBIES</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                $count = 0;
                                foreach($hobbies as $key=>$val){
                                    ?>
                                    <label class="label-success" style="padding: 0px 5px;background-color: <?= $colors[$count]; ?> !important;"><?= $val; ?></label>
                                    <?php
                                    $count++;
                                    if($count==6){
                                        $count = 0;
                                    }
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 style="color: #FB4D57 !important; font-weight: bolder;">EDUCATION</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                foreach($education as $key=>$val){
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label class="label-success" style="padding: 0px 5px;background-color: #D7FFC1!important;"><?= $val['year']; ?></label>
                                        </div>
                                        <div class="col-xs-9">
                                            <b><?= $val['degree']; ?> - <?= $val['course']; ?></b>
                                            <p><?= $val['school']; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php if ($awards[0]['title']): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 style="color: #FB4D57 !important; font-weight: bolder;">AWARDS & HONOURS</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                foreach($awards as $key=>$val){
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label class="label-success" style="padding: 0px 5px;background-color: #FECACD !important;"><?= $val['year']; ?></label>
                                        </div>
                                        <div class="col-xs-9">
                                            <b><?= $val['title']; ?></b>
                                            <p><?= $val['description']; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                            <?php endif; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 style="color: #FB4D57 !important; font-weight: bolder;">SKILLS</h4>
                            </div>
                            <div class="panel-body">
                                <?php
                                $count = 0;
                                foreach($skills as $key=>$val){
                                    ?>
                                    <label class="label-success" style="padding: 0px 5px;background-color: <?= $colors[$count]; ?> !important"><?= $val; ?> </label>
                                    <?php
                                    $count++;
                                    if($count==6){
                                        $count = 0;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

</div>
<style>
    .contact-list > li > p > i {
        padding-right: 15px;
}
</style>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?= asset_url('js/bootstrap.js'); ?>"></script>

</body>

</html>

