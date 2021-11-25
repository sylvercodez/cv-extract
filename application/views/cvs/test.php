<!DOCTYPE html>
<html lang="en">
<head>
  <title>Orbit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/js/bootstrap.js')?>"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/cvs/orbit/styles.1.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/cvs/orbit/font-awesome.css') ?>">
</head>
<body>

<div class="container-fluid text-center">
  <div class="row">
    <div class="col-sm-8" style="background: #fff !important;">
    <div class="main-wrapper">
    <section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-user"></i>About</h2>
    <div class="summary">
        <p><?= @$description ?></p>
    </div><!--//summary-->
</section><!--//section-->
<!-- <section class="section summary-section">
    <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
    <div class="summary">
        <p>Summarise your career here lorem ipsum dolor sit amet, consectetuer adipiscing elit. You can <a href="http://themes.3rdwavemedia.com/website-templates/orbit-free-resume-cv-template-for-developers/" target="_blank">download this free resume/CV template here</a>. Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu.</p>
    </div>
</section>//section -->

<section class="section experiences-section">
    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experience</h2>
    <?php foreach($experience as $key=>$val):?>
    <div class="item">
        <div class="meta">
            <div class="upper-row">
                <h3 class="job-title"><?= $val['title'] ?></h3>
                <div class="time"> <?= $val['start']. " - " . $val['end'] ?> </div>
            </div><!--//upper-row-->
            <div class="company"><?= $val['company'] ?></div>
        </div><!--//meta-->
        <div class="details">
            <!-- <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</p>   -->
            <p><?= $val['description'] ?> </p>
        </div><!--//details-->
    </div><!--//item-->
    <?php endforeach; ?>
</section><!--//section-->
<?php if(isset($projects)): ?>
<section class="section projects-section">
    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
    <div class="intro">
        <p>You can list your side projects or open source libraries in this section. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et ligula in nunc bibendum fringilla a eu lectus.</p>
    </div><!--//intro-->
    <div class="item">
        <span class="project-title"><a href="#hook">Velocity</a></span> - <span class="project-tagline">A responsive website template designed to help startups promote, market and sell their products.</span>
        
    </div><!--//item-->
    <div class="item">
        <span class="project-title"><a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-web-development-agencies-devstudio/" target="_blank">DevStudio</a></span> - 
        <span class="project-tagline">A responsive website template designed to help web developers/designers market their services. </span>
    </div><!--//item-->
    <div class="item">
        <span class="project-title"><a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-startups-tempo/" target="_blank">Tempo</a></span> - <span class="project-tagline">A responsive website template designed to help startups promote their products or services and to attract users &amp; investors</span>
    </div><!--//item-->
    <div class="item">
        <span class="project-title"><a href="hhttp://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-mobile-apps-atom/" target="_blank">Atom</a></span> - <span class="project-tagline">A comprehensive website template solution for startups/developers to market their mobile apps. </span>
    </div><!--//item-->
    <div class="item">
        <span class="project-title"><a href="http://themes.3rdwavemedia.com/website-templates/responsive-bootstrap-theme-for-mobile-apps-delta/" target="_blank">Delta</a></span> - <span class="project-tagline">A responsive Bootstrap one page theme designed to help app developers promote their mobile apps</span>
    </div><!--//item-->
</section><!--//section-->
<?php endif; ?>
<?php if(isset($awards)): ?>
<section class="section experiences-section">
    <h2 class="section-title"><i class="fa fa-flag"></i>Achievements</h2>
    <?php foreach($awards as $key=>$val):?>
    <div class="item">
        <div class="meta">
            <div class="upper-row">
                <h3 class="job-title"><?= $val['title'] ?></h3>
                <div class="time"> <?= $val['year']?> </div>
            </div><!--//upper-row-->
            <div class="company"></div>
        </div><!--//meta-->
        <div class="details">
            <!-- <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</p>   -->
            <p><?= $val['description'] ?> </p>
        </div><!--//details-->
    </div><!--//item-->
    <?php endforeach; ?>
</section><!--//section-->
<?php endif; ?>
<br style="clear: both">
    </div>
    <br style="clear: both">
    </div>
    
    <div class="col-sm-4" style="background: #42A8C0 !important; color: #fff !important;">
    <div class="sidebar-wrapper">
                <div class="profile-container">
                    <div>
                    <img class="profile img-circle" src="<?= base_url('uploads/'.$image); ?>" alt="" style="max-width: 100%; max-height: 100%;" />
                    </div>
                    <div style="word-wrap: break-word;">
                    <h1 class="name"><?= @$name?></h1>
                    <h3 class="tagline"><?= @$job_title?></h3>
                    </div>
                </div><!--//profile-container-->
                
                <div class="contact-container container-block" style="word-wrap: break-word;">
                    <ul class="list-unstyled contact-list">
                        <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?=@$email ?>"><?=@$email ?></a></li>
                        <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?=@$phone ?>"><?=@$phone ?></a></li>
                <?php if( isset($website) && $website): ?><li class="website"><i class="fa fa-globe"></i><a href="<?=@$website ?>" target="_blank"><?=@$website ?></a></li><?php endif; ?>
                <?php if( isset($linkedin) && $linkedin): ?><li class="linkedin"><i class="fa fa-linkedin"></i><a href="https://linkedin.com/<?= @$linkedin?>" target="_blank"><?= @$linkedin?></a></li><?php endif; ?>
                <?php if( isset($facebook) && $facebook): ?><li class="facebook"><i class="fa fa-facebook"></i><a href="https://facebook.com/<?= @$facebook?>" target="_blank"><?= @$facebook?></a></li><?php endif; ?>
                <?php if( isset($twitter) && $twitter): ?><li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/<?= @$twitter?>" target="_blank">@<?= @$twitter?></a></li><?php endif; ?>
                    </ul>
                </div><!--//contact-container-->
                <div class="education-container container-block">
                    <h2 class="container-block-title">Education</h2>
                    <?php foreach($education as $key=>$val):?>
                    <div class="item">
                        <h4 class="degree"><?= $val['degree']; ?> - <?= $val['course']; ?></h4>
                        <h5 class="meta"><?= @$val['school']; ?></h5>
                        <div class="time"><?= $val['year']; ?></div>
                    </div><!--//item-->
                    <?php endforeach; ?>
                    <!-- <div class="item">
                        <h4 class="degree">BSc in Applied Mathematics</h4>
                        <h5 class="meta">Bristol University</h5>
                        <div class="time">2007 - 2011</div>
                    </div>//item -->
                </div><!--//education-container-->
                
                <div class="languages-container container-block">
                    <h2 class="container-block-title">Languages</h2>
                    <ul class="list-unstyled interests-list">
                        <li>English <span class="lang-desc">(Native)</span></li>
                        <li>French <span class="lang-desc">(Professional)</span></li>
                        <li>Spanish <span class="lang-desc">(Professional)</span></li>
                    </ul>
                </div><!--//interests-->

                <div class="languages-container container-block">
                    <h2 class="container-block-title">Skills</h2>
                    <ul class="list-unstyled interests-list">
                    <?php foreach($skills as $val):?>
                        <li><?= $val; ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div><!--//interests-->
                
                <div class="interests-container container-block">
                    <h2 class="container-block-title">Interests</h2>
                    <ul class="list-unstyled interests-list">
                    <?php foreach($hobbies as $val):?>
                    <li><?= $val; ?></li>
                <?php endforeach; ?>
                    </ul>
                </div><!--//interests-->
                
            </div><!--//sidebar-wrapper-->
            <br style="clear: both">
    </div>
    <br style="clear: both">
  </div>
</div>
    
</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_grid_stacked_to_hor&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2018 12:15:40 GMT -->
</html>
