<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?php echo asset_url('css/bootstrap-tagsinput.css'); ?>" xmlns=""/>
<link rel="stylesheet" href="<?php echo asset_url('css/app.css'); ?>" />
<script src="<?php echo asset_url('js/bootstrap-tagsinput.js'); ?>"></script>
<script src="<?php echo asset_url('js/validator.js'); ?>"></script>
<script src="<?php echo asset_url('js/jquery.validate.js'); ?>"></script>
<script src="<?php echo asset_url('js/jquery.form.min.js'); ?>"></script>
<div class="container">
    <div class="mypanel cv-form">
        <div class="row">
            <div class="col-md-12">
                <div class="heading" style="padding-bottom: 36px;">
                    <h1>Fill in your information below.</h1>
                    <h5>We've selected the essential data your next employer wants to see</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>cvs/generatecv" method="post" id="cvfrm" enctype="multipart/form-data">
                    <input type="hidden" name="cv" id="cv" value="<?php echo $cv; ?>" />
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">About</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="inputupload">
                							<label id="upload-label-1" for="upload-photo-1">Add Image</label>
                							<input name="file" id="upload-photo-1" type="file" onchange="readURL(this);" <?php echo isset($_SESSION['image'])&&$_SESSION['image']!=''?'':'required="true"'; ?> />
                						</div>
                                    </div>
                                    <style type="text/css">
                                        .inputupload {
                                            float: left;
                                            position: relative;
                                            background-color: #EBEBEB;
                                            border: 1px solid #dedede;
                                            border-radius: 5px;
                                            font-weight: 400;
                                            color: #989797;
                                            font-size: 13px;
                                            height: 300px;
                                            padding-left: 10px;
                                            text-transform: capitalize;
                                            width: 300px;
                                            border-radius: 30px;
                                            /* -webkit-appearance: none; */
                                            -moz-appearance: none;
                                            -ms-appearance: none \9;
                                            -o-appearance: none;
                                        }
                                        .inputupload label {
                                            cursor: pointer;
                                            background-color: transparent;
                                            background-image: url(<?php echo asset_url('images/add.png'); ?>);
                                            background-repeat: no-repeat;
                                            background-position: center center;
                                            color: #989797;
                                            font-weight: 400;
                                            margin: 0;
                                            cursor: pointer;
                                            border: none;
                                            font-size: 14px;
                                            height: 100%;
                                            padding: 200px 0 0;
                                            text-transform: capitalize;
                                            width: 100%;
                                            letter-spacing: 0.5px;
                                            text-align: center;
                                        }
                                        .inputupload input[type="file"] {
                                            opacity: 0;
                                            left: 0;
                                            top: 0;
                                            position: absolute;
                                            z-index: -1;
                                        }
                                    </style>
                                    <!--
                                    <div class="form-group img-upload-box">
                                        <div class="img-upload-box parent" style="position: relative;">
                                            <div class="child">
                                                <input type="file" name="image" id="image" style="position: absolute;z-index: -1; opacity: 0;" />
                                                <img src="<?php echo asset_url('images/add.png'); ?>"/>
                                                <div>Add Image</div>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                    <?php
                                        if(isset($_SESSION['image'])&&$_SESSION['image']!=''){
                                            ?>
                                            <button type="button" id="remove-img" style="display: block;top:-10px;position: absolute;right:-35px;z-index: 99999;border-radius: 5px;" class="pull-right">&times;</button>
                                            <img id="blah" src="<?php echo base_url('uploads/'.$_SESSION['image']); ?>" style="position: absolute;top:0px;display: block; width: 300px; height: 300px;" alt="your image" />
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <button type="button" id="remove-img" style="display: none;top:-10px;position: absolute;right:-35px;z-index: 99999;" class="pull-right">&times;</button>
                                            <img id="blah" src="#" style="position: absolute;left: 22px;top:0px;display: none;" alt="your image" />
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="col-md-3">
                                    
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" value="<?= isset($user['first_name']) ? $user['first_name'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" value="<?= isset($user['last_name']) ? $user['last_name'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="job_title" id="job_title" class="form-control input-lg" placeholder="Job Title" value="<?= isset($user['job_title']) ? $user['job_title'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Phone" value="<?= isset($user['phone']) ? $user['phone'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?= isset($user['email']) ? $user['email'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="website" id="website" class="form-control input-lg" placeholder="Website" value="<?= isset($user['website']) ? $user['website'] : ''; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control input-lg" name="description" id="description" required="true" placeholder="Brief Profile" rows="8"><?= isset($user['description']) ? $user['description'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">Education</h3>
                        </div>
                        <div class="panel-body">
                            <div id="edu_info" class="edu_info">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" style="display: none;" class="btn-remove pull-right">&times;</button>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="education[0][year]" id="edu_0_year" required="true">
                                            <option value="">Year</option>                                            
                                            <?php
                                                for($i=date("Y")+1;$i>=1990;$i--){
                                                    ?>
                                                    <option <?php echo (isset($user['education'][0]['year']) && $user['education'][0]['year']==$i)?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="education[0][degree]" id="edu_0_degree" required="true">
<!--                                            <option value="Degree">Degree</option>-->
<!--                                            <option value="Degree">Degree</option>-->
                                            <?php

                                                foreach($degree as $k=>$v){
                                                    ?>
                                                    <option <?php echo (isset($user['education'][0]['degree']) && $user['education'][0]['degree']==$v)?'selected="selected"':''; ?> value="<?=$v; ?>"><?php echo $v; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="education[0][course]" id="edu_0_course" required="true" placeholder="Course" value="<?php echo (isset($user['education'][0]['course']) ? $user['education'][0]['course'] : ''); ?>" class="form-control input-lg">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="education[0][school]" value="<?php echo (isset($user['education'][0]['school']) ? $user['education'][0]['school'] : ''); ?>" id="edu_0_school" class="form-control input-lg" placeholder="School" required="true" />
                                </div>
                            </div>
                            </div>
                            <?php
                            if (isset($user['education'])):
                                foreach($user['education'] as $key=>$val){
                                    if($key>0){
                                        ?>
                                        <div id="edu_info<?php echo $key; ?>" class="edu_info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" style="display: block;" class="btn-remove pull-right">&times;</button>
                                                </div>
                                            </div>
                                                
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <select class="form-control input-lg" name="education[<?php echo $key; ?>][year]" id="edu_<?php echo $key; ?>_year" required="true">
                                                            <option value="">Year</option>
                                                            <?php
                                                                for($i=date("Y");$i>=1990;$i--){
                                                                    ?>
                                                                    <option <?php echo $val['year']==$i?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select class="form-control input-lg" name="education[<?php echo $key; ?>][degree]" id="edu_<?php echo $key; ?>_degree" required="true">
<!--                                                            <option value="">Degree</option>-->
                                                            <?php

                                                                foreach($degree as $k=>$v){
                                                                    ?>
                                                                    <option <?php echo $val['degree']==$v?'selected="selected"':''; ?> value="<?= $v; ?>"><?php echo $v; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                <div class="form-group">                                    
                                    <input type="text" name="education[<?php echo $key; ?>][course]" value="<?php echo $val['course']; ?>" id="edu_<?php echo $key; ?>_course" class="form-control input-lg" placeholder="Course" required="true" />
                                </div>
                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" name="education[<?php echo $key; ?>][school]" value="<?php echo $val['school']; ?>" id="edu_<?php echo $key; ?>_school" class="form-control input-lg" placeholder="School" required="true" />
                                                </div>
                                            </div>
                                            </div>
                                        <?php
                                    }
                                }
                            endif;
                            ?>
                            <div id="more_edu"></div>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="add_edu" class="btn btn-lg btn-add">Add Education <div class="pull-right"><img class="add-img" src="<?php echo asset_url('images/add-WHITE.png'); ?>" /></div></button>
                        </div>
                    </div>
                    
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">Experience</h3>
                        </div>
                        <div class="panel-body">
                            <div id="exp_info" class="exp_info">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" style="display: none;" class="btn-remove pull-right">&times;</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" name="experience[0][company]" placeholder="Company (Place you worked)" value="<?= isset( $user['experience'][0]['company']) ? $user['experience'][0]['company'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" name="experience[0][title]" placeholder="Job Title" value="<?= isset( $user['experience'][0]['title']) ?  $user['experience'][0]['title'] : ''; ?>" required="true" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="experience[0][start]" id="exp_0_year" required="true">
                                            <option value="">Work Start Year</option>
                                            
                                            <?php
                                                for($i=date("Y");$i>=1990;$i--){
                                                    ?>
                                                    <option <?=  (isset( $user['experience'][0]['start']) && $user['experience'][0]['start']==$i)?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="experience[0][end]" id="exp_0_end" required="true">
                                            <option value="">Work End Year</option>
                                            <option <?=  (isset( $user['experience'][0]['end']) && $user['experience'][0]['end']=="Present")?'selected="selected"':''; ?>>Present</option>
                                            <?php
                                                for($i=date("Y");$i>=1990;$i--){
                                                    ?>
                                                    <option <?php echo (isset( $user['experience'][0]['end']) && $user['experience'][0]['end']==$i)?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control input-lg" name="experience[0][description]" id="exp_0_title" required="true" placeholder="Job Description" rows="8"><?= isset( $user['experience'][0]['description']) ? $user['experience'][0]['description'] : ''; ?></textarea>
                                </div>
                            </div>
                            </div>
                            <?php
                            if (isset($user['experience'])):
                                foreach($user['experience'] as $key=>$val){
                                    if($key>0){
                                        ?>
                                        <div id="exp_info<?php echo $key; ?>" class="exp_info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" style="display: block;" class="btn-remove pull-right">&times;</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" name="experience[<?php echo $key; ?>][company]" placeholder="Company (Place you worked)" value="<?php echo $val['company']; ?>" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" required="true" name="experience[<?php echo $key; ?>][title]" placeholder="Job Title" value="<?php echo $val['title']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="form-control input-lg" required="true" name="experience[<?php echo $key; ?>][start]" id="exp_<?php echo $key; ?>_year">
                                                            <option value="">Work Start Year</option>
                                                            <?php
                                                                for($i=date("Y");$i>=1990;$i--){
                                                                    ?>
                                                                    <option <?php echo $val['start']==$i?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="form-control input-lg" required="true" name="experience[<?php echo $key; ?>][end]" id="exp_<?php echo $key; ?>_end">
                                                            <option value="">Work End Year</option>
                                                            <option <?php echo $val['end']=="Present"?'selected="selected"':''; ?>>Present</option>
                                                            <?php
                                                                for($i=date("Y");$i>=1990;$i--){
                                                                    ?>
                                                                    <option <?php echo $val['end']==$i?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="form-control input-lg" required="true" name="experience[<?php echo $key; ?>][description]" id="exp_<?php echo $key; ?>_title" placeholder="Job Description" rows="8"><?php echo $val['description']; ?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        <?php
                                    }
                                }
                                endif;
                            ?>
                            <div id="more_exp"></div>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="add_exp" class="btn btn-lg btn-add">Add Experience <div class="pull-right"><img class="add-img" src="<?php echo asset_url('images/add-WHITE.png'); ?>" /></div></button>
                        </div>
                    </div>
                    
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">Awards</h3>
                        </div>
                        <div class="panel-body">
                            <div id="awa_info" class="awa_info">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" style="display: none;" class="btn-remove pull-right">&times;</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="awards[0][title]" id="award_0_title" class="form-control input-lg" placeholder="Award Title" value="<?= isset($user['awards'][0]['title']) ? $user['awards'][0]['title'] : ''; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="awards[0][year]" id="award_0_year">
                                            <option value="">Award Year</option>
                                            <?php
                                                for($i=date("Y");$i>=1990;$i--){
                                                    ?>
                                                    <option <?= (isset($user['awards'][0]['year']) && $user['awards'][0]['year']==$i)?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control input-lg" name="awards[0][description]" id="award_0_description" placeholder="Award Description" rows="8"><?= isset($user['awards'][0]['description']) ? $user['awards'][0]['description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($user['awards'])):
                            foreach($user['awards'] as $key=>$val){
                                if($key>0){
                                ?>
                                <div id="awa_info" class="awa_info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" style="display: block;" class="btn-remove pull-right">&times;</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="awards[<?php echo $key; ?>][title]" id="award_<?php echo $key; ?>_title" class="form-control input-lg" placeholder="Award Title" value="<?php echo $val['title']; ?>" required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control input-lg" name="awards[<?php echo $key; ?>][year]" id="award_<?php echo $key; ?>_year" >
                                                    <option value="">Award Year</option>
                                                    <?php
                                                        for($i=date("Y");$i>=1990;$i--){
                                                            ?>
                                                            <option <?php echo $val['year']==$i?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea class="form-control input-lg" name="awards[<?php echo $key; ?>][description]" id="award_<?php echo $key; ?>_title" placeholder="Award Description" rows="8"><?php echo $val['description']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                        endif;
                        ?>
                        <div id="more_awa"></div>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="add_awa" class="btn btn-lg btn-add">Add Award <div class="pull-right"><img class="add-img" src="<?php echo asset_url('images/add-WHITE.png'); ?>" /></div></button>
                        </div>
                    </div>
                    
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">Skills</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="skills" id="skills" class="form-control input-lg skill-input" data-role="tagsinput" placeholder="Add Skills" value="<?= isset($user['skills']) ? (is_array($user['skills']) ? implode(',',$user['skills']) : $user['skills']) : ''; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">Hobbies</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="hobbies" id="hobbies" class="form-control input-lg hobbie-input" data-role="tagsinput" placeholder="Add Hobbies" value="<?= isset($user['hobbies']) ? (is_array($user['hobbies']) ? implode(',',$user['hobbies']) : $user['hobbies']) : ''; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <h3 class="panel-title">Social Media</h3>
                        </div>
                        <div class="panel-body" id="social-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="facebook" id="facebook" class="form-control input-lg facebook-input" placeholder="Facebook" value="<?= isset($user['facebook']) ? $user['facebook'] : ''; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="twitter" id="twitter" class="form-control input-lg twitter-input" placeholder="Twitter" value="<?= isset($user['twitter']) ? $user['twitter'] : ''; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="linkedin" id="linkedin" class="form-control input-lg linkedin-input" placeholder="LinkedIn" value="<?= isset($user['linkedin']) ? $user['linkedin'] : ''; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="instagram" id="instagram" class="form-control input-lg instagram-input" placeholder="instagram" value="<?= isset($user['instagram']) ? $user['instagram'] : ''; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="added-social-row">
                            </div>
                        </div>
                        <div class="panel-footer">
                        <div class="dropdown">                        
                            <button type="button" id="add_social" class="btn btn-lg btn-add dropdown-toggle" data-toggle="dropdown">Add Others <div class="pull-right"><img class="add-img" src="<?php echo asset_url('images/add-WHITE.png'); ?>" /></div></button>
                            <ul class="dropdown-menu" role="menu" id="social-menu">
                                <li><a href="#" onclick="addOther('github')" id="github-menu">Github</a></li>
                                <li><a href="#" onclick="addOther('project')">Figma</a></li>
                                <li><a href="#" onclick="addOther('others')">Other</a></li>
                            </ul>
                        </div>
                        </div>
                        
                    </div>
                    <div class="panel panel-widget" id="projects">
                        <div class="panel-heading">
                            <h3 class="panel-title">Projects</h3>
                        </div>
                        <div class="panel-body">
                            <div id="projects_info" class="projects_info">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" style="display: none;" class="btn-remove pull-right">&times;</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" name="projects[0][title]" placeholder="Title" value="<?= isset( $user['projects'][0]['title']) ?  $user['projects'][0]['title'] : ''; ?>" />
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" name="projects[0][link]" placeholder="Project Link" value="<?= isset( $user['projects'][0]['link']) ?  $user['projects'][0]['link'] : ''; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="projects[0][year]" id="projects_0_year">
                                            <option value="">Year</option>
                                            
                                            <?php
                                                for($i=date("Y");$i>=1990;$i--){
                                                    ?>
                                                    <option <?=  (isset( $user['projects'][0]['year']) && $user['projects'][0]['year']==$i)?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control input-lg" name="projects[0][description]" id="projects_0_title" placeholder="Project Description" rows="8"><?= isset( $user['projects'][0]['description']) ? $user['projects'][0]['description'] : ''; ?></textarea>
                                </div>
                            </div>
                            </div>
                            <?php
                            if (isset($user['projects'])):
                                foreach($user['projects'] as $key=>$val){
                                    if($key>0){
                                        ?>
                                        <div id="projects_info<?php echo $key; ?>" class="projects_info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" style="display: block;" class="btn-remove pull-right">&times;</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" name="projects[<?php echo $key; ?>][title]" placeholder="Title" value="<?php echo $val['title']; ?>" required="true" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input-lg" required="true" name="projects[<?php echo $key; ?>][link]" placeholder="URL" value="<?php echo $val['link']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control input-lg" required="true" name="projects[<?php echo $key; ?>][year]" id="projects_<?php echo $key; ?>_year">
                                                            <option value="">Year</option>
                                                            <?php
                                                                for($i=date("Y");$i>=1990;$i--){
                                                                    ?>
                                                                    <option <?php echo $val['year']==$i?'selected="selected"':''; ?>><?php echo $i; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="form-control input-lg" required="true" name="projects[<?php echo $key; ?>][description]" id="projects_<?php echo $key; ?>_title" placeholder="Project Description" rows="8"><?php echo $val['description']; ?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        <?php
                                    }
                                }
                                endif;
                            ?>
                            <div id="more_projects"></div>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="add_projects" class="btn btn-lg btn-add">Add Project <div class="pull-right"><img class="add-img" src="<?php echo asset_url('images/add-WHITE.png'); ?>" /></div></button>
                        </div>
                    </div>

                    <div class="panel panel-widget">                        
                        <div class="panel-footer">
                            <!-- <button id="addfield" class="btn btn-default">Add Field</button> -->
                            <div class="btn-group">
                            
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Add Others
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" onclick="addOther('social')">Social</a></li>
                                    <li><a href="#" onclick="addOther('project')">Projects</a></li>
                                    <li><a href="#" onclick="addOther('proficiency')">Proficiency</a></li>
                                </ul>
                            </div> 
                            <button type="submit" id="generatecv" class="btn btn-primary">Generate CV</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center form-group">
                <a id="top" href="#top"><img src="<?php echo asset_url('images/top.png'); ?>" /></a>
            </div>
        </div>
		<br /><br />
		<div class="row">
			<div class="col-md-12 text-center form-group">
				<input type="text" class="counpon" placeholder="Enter Coupon"/>
				<button class="continue">Save & Continue</button>
			</div>
		</div>
		<br />
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#cvfrm').validate ({
            // validation rules for registration form
            errorClass: "text-red",
            validClass: "text-green",
            errorElement: 'div',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }
    			else if (element.hasClass('select2')) {     
    				error.insertAfter(element.next('span'));  // select2
    			} else {
                    error.insertAfter(element);
                }
            },
            onError : function(){
                $('.input-group.error-class').find('.help-block.form-error').each(function() {
                    $(this).closest('.form-group').addClass('error-class').append($(this));
                });
            }
        
        });

        var edu = <?php echo isset($_SESSION['education'])?count($_SESSION['education'])-1:0; ?>;
        $('#add_edu').click(function(){
            edu++;
            $("#edu_info").clone(true).find("input,select").each(function () {    
                $(this).val("");
                var name = $(this).attr("name");
                var new_name = name.replace("[0]","["+edu+"]");
                $(this).attr("name",new_name);
            }).end().find('.btn-remove').css('display','block').end().prop('id','edu_info'+edu).insertBefore("#more_edu");
        });
        $(".edu_info .btn-remove").click(function(){
            $(this).closest(".edu_info").fadeOut(300, function(){
                $(this).remove();
            });
        });
        
        var awa = <?php echo isset($_SESSION['awards'])?count($_SESSION['awards'])-1:0; ?>;
        $("#add_awa").click(function(){
            awa++;
            $("#awa_info").clone(true).find("input,select,textarea").each(function () {    
                $(this).val("");
                var name = $(this).attr("name");
                var new_name = name.replace("[0]","["+awa+"]");
                $(this).attr("name",new_name);
            }).end().find('.btn-remove').css('display','block').end().prop('id','awa_info'+awa).insertBefore("#more_awa");
        });
        $(".awa_info .btn-remove").click(function(){
            $(this).closest(".awa_info").fadeOut(300, function(){
                $(this).remove();
            });
        });
        
        var exp = <?php echo isset($_SESSION['experience'])?count($_SESSION['experience'])-1:0; ?>;
        $("#add_exp").click(function(){
            exp++;
            $("#exp_info").clone(true).find("input,select,textarea").each(function () {    
                $(this).val("");
                var name = $(this).attr("name");
                var new_name = name.replace("[0]","["+exp+"]");
                $(this).attr("name",new_name);
            }).end().find('.btn-remove').css('display','block').end().prop('id','exp_info'+exp).insertBefore("#more_exp");
        });
        $(".exp_info .btn-remove").click(function(){
            $(this).closest(".exp_info").fadeOut(300, function(){
                $(this).remove();
            });
        });

        var projects = <?php echo isset($_SESSION['projects'])?count($_SESSION['projects'])-1:0; ?>;
        $("#add_projects").click(function(){
            exp++;
            $("#projects_info").clone(true).find("input,select,textarea").each(function () {    
                $(this).val("");
                var name = $(this).attr("name");
                var new_name = name.replace("[0]","["+exp+"]");
                $(this).attr("name",new_name);
            }).end().find('.btn-remove').css('display','block').end().prop('id','projects_info'+exp).insertBefore("#more_projects");
        });
        $(".projects_info .btn-remove").click(function(){
            $(this).closest(".projects_info").fadeOut(300, function(){
                $(this).remove();
            });
        });
        
        $("#remove-img").click(function(){
            $("#blah").attr('src','#');
            $("#blah").css('display','none');
            $("#upload-photo-1").val("");
            $(this).css("display","none");
        });
        
        $(".bootstrap-tagsinput input").on('keypress',function(e){
            if (e.keyCode == 13){
                var e1 = $.Event( "keypress", { which: 44 } );
                $(this).trigger(e1);
                return false;
            }
        });
        /*$('#thobbies').tagsinput({
            confirmKeys: [13, 188]
          });

        $('#hobbies').on('keypress', function(e){
            console.log(e.keyCode);
            if (e.keyCode == 13){
              e.keyCode = 188;
              e.preventDefault();
            };
          });*/
        $("#generatecv").click(function(){
            //$("#cvfrm")[0].submit();
        });

        <?php if(isset($user['image'])&&$user['image']!=''): ?>
        // function rereadURL(input) {
        // if (input.files && input.files[0]) {
            // var fileurl = "<?=base_url('uploads/'.$user['image'])?>";
            // // var blob = new Blob([JSON.stringify({name: fileurl})]);
            // var blob = new Blob([{name: fileurl}]);
            // var url = URL.createObjectURL(blob);
            // var reader = new FileReader();

            // reader.onload = function (e) {
            //     $('#blah')
            //         .attr('src', e.target.result)
            //         .css('display','block')
            //         .width(300)
            //         .height(300);
            // };
            // $("#remove-img").css("display","block");
            // // reader.readAsDataURL(input.files[0]);
            // reader.readAsDataURL(blob);
            
        // }
    // }
        <?php endif;?>
    });
    
    function addOther(othertype) {
        var element = document.getElementById(othertype+"-menu");
        var socialBody = document.getElementById("social-body");
        
        socialBody.innerHTML = socialBody.innerHTML + '<div class="row"> <div class="col-md-6"><div class="input-group"><input name="'+othertype+'" id="'+othertype+'" class="form-control input-lg '+othertype+'-input" placeholder="'+
            othertype.charAt(0).toUpperCase()+othertype.substr(1) +'" value="" type="text"> <div class="input-group-btn"><button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></div></div></div></div>';
        element.parentNode.removeChild(element);
    }    
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .css('display','block')
                    .width(300)
                    .height(300);
            };
            $("#remove-img").css("display","block");
            // console.log(input.files[0]);
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
