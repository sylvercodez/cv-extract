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
    <link type="text/css" media="all" href="<?= asset_url('css/bootstrap.css'); ?>" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" media="all" href="<?= asset_url('css/style.css'); ?>" rel="stylesheet" />
    <script type="text/javascript" src="<?= asset_url('js/jquery-3.3.1.min.js'); ?>"></script>
</head>
<body>
<div class="container" style="min-width: 1000px; !important">

    <div class="cv-img">
        <div class="form-group">
            <!--<img src="<?php //echo asset_url('cvs/'.$cvinfo->image); ?>" />-->
            <div style="width: 100%;min-height: 200px;background: linear-gradient(to right, #2D7CC0 , #7D348E) !important;">
                <div class="row">
                    <div class="col-xs-4">
                        <div style="padding-top: 40px;padding-left: 50px;">
                            <img class="img img-circle img-thumbnail" style="width: 120px;height: 120px;" src="<?= base_url('uploads/'.$image); ?>" />
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div style="padding-top: 20px;">
                            <h2 style="font-size: 18px;color: #fff !important;text-transform: uppercase; !important;">HELLO! MY NAME IS <?= @$name?></h2>
                            <div style="border: 0.3px solid #82DCFF;width: 50px;"></div>
                            <p style="color: #fff !important; padding-top: 10px;"><?= @$description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background: #fff !important;padding: 15px !important;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3 class="panel-title" style="color: #7B358E !important;text-align: center;">PHONE:</h3>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3 class="panel-title" style="color: #7B358E !important;text-align: center;">EMAIL:</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body" style="text-align: center;">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <img src="<?= asset_url('img/phone.png'); ?>" style="width: 18px;" /> <?= @$phone ?>
                                    </div>
                                    <div class="col-xs-6">
                                        <img src="<?= asset_url('img/email.png'); ?>" style="width: 20px;" /> <?= @$email ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #2A7DC1 !important;">EDUCATION</h3>
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
                                <h3 class="panel-title" style="color: #2A7DC1 !important;">AWARDS & HONOURS</h3>
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
                                <h3 class="panel-title" style="color: #2A7DC1 !important;">SKILLS</h3>
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
                        <?php if($instagram || $linkedin || $twitter || $facebook): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #2A7DC1 !important;">SOCIAL MEDIA</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <?php if($linkedin): ?>
                                    <div class="col-xs-6">
                                        <img src="<?= asset_url('img/linkedin.png'); ?>" style="width: 20px;" /> <?= @$linkedin ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($instagram): ?>
                                    <div class="col-xs-6">
                                        <img src="<?= asset_url('img/instagram.png'); ?>" style="width: 20px;" /> <?= @$instagram?>
                                    </div>
                                <?php endif; ?>
                                </div>
                                <br />
                                <div class="row">
                                <?php if($facebook): ?>
                                    <div class="col-xs-6">
                                        <img src="<?= asset_url('img/facebook.png'); ?>" style="width: 20px;" /> <?= @$facebook ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($twitter): ?>
                                    <div class="col-xs-6">
                                        <img src="<?= asset_url('img/twitter.png'); ?>" style="width: 20px;" /> <?= @$twitter?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #2A7DC1 !important;">EXPERIENCE</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                foreach($experience as $key=>$val){
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label class="label-success" style="padding: 0px 5px;background-color: #D7FFC1 !important;"><?= $val['start']; ?></label>
                                            |
                                        </div>
                                        <div class="col-xs-9">
                                            <b><?= $val['company']; ?></b>
                                            <p><?= $val['title']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label class="label-success" style="padding: 0px 5px;background-color: #FECACD !important;"><?= $val['end']; ?></label>
                                        </div>
                                        <div class="col-xs-9">
                                            <p><?= $val['description']; ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #2A7DC1 !important;">HOBBIES</h3>
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
                </div>
                <?php if (isset($download_link)): ?>
                    <a href="<?=base_url('admin/cv/download/'.$this->uri->segment('4'))?>">Download a copy here</a>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?= asset_url('js/bootstrap.js'); ?>"></script>

</body>

</html>

