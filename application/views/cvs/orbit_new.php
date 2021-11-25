<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    
    <link rel="stylesheet" href="<?= base_url('assets/cvs/orbit/bootstrap_print.css') ?>">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/cvs/orbit/font-awesome.css') ?>">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/cvs/orbit/styles.1.css') ?>">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body>
<article class="wrapper text-center position-relative">
    <div class="">
        <div class="col-xs-9" style="padding-right: 0px; padding-left: 0px;">
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
                <?php if(isset($projects) && !empty($projects)): ?>
                <section class="section projects-section">
                    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                    <div class="intro">
                        <p>Some of my recent work.</p>
                    </div><!--//intro-->
                    <?php foreach($projects as $key=>$val):?>
                    <div class="item">
                        <span class="project-title"><a href="<?= @$val['link'] ?>"><?= $val['title'] ?></a></span> - <span class="project-tagline"><?= $val['description'] ?></span>
                    </div><!--//item-->
                    
                    
                    
                    <?php endforeach; ?>
                </section><!--//section-->
                <?php endif; ?>
                <?php if(isset($awards) && !empty($awards)): ?>
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

                <?php if(isset($proficiency)): ?>
                <section class="skills-section section">
                    <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                    <div class="skillset">        
                        <div class="item">
                            <h3 class="level-title">Python &amp; Django</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="98%">
                                </div>                                      
                            </div><!--//level-bar-->                                 
                        </div><!--//item-->
                        
                        <div class="item">
                            <h3 class="level-title">Javascript &amp; jQuery</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="98%">
                                </div>                                      
                            </div><!--//level-bar-->                                 
                        </div><!--//item-->
                        
                        <div class="item">
                            <h3 class="level-title">Angular</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="98%">
                                </div>                                      
                            </div><!--//level-bar-->                                 
                        </div><!--//item-->
                        
                        <div class="item">
                            <h3 class="level-title">HTML5 &amp; CSS</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="95%">
                                </div>                                      
                            </div><!--//level-bar-->                                 
                        </div><!--//item-->
                        
                        <div class="item">
                            <h3 class="level-title">Ruby on Rails</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="85%">
                                </div>                                      
                            </div><!--//level-bar-->                                 
                        </div><!--//item-->
                        
                        <div class="item">
                            <h3 class="level-title">Sketch &amp; Photoshop</h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="60%">
                                </div>                                      
                            </div><!--//level-bar-->                                 
                        </div><!--//item-->
                        
                    </div>  
                </section><!--//skills-section-->
                <?php endif; ?>
            </div><!--//main-body-->
        </div>
        <div class="col-xs-3">
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
                <?php if( isset($github) && $github): ?><li class="website"><i class="fa fa-github"></i><a href="https://github.com/<?=@$github ?>" target="_blank"><?=@$github ?></a></li><?php endif; ?>
                <?php if( isset($linkedin) && $linkedin): ?><li class="linkedin"><i class="fa fa-linkedin"></i><a href="https://linkedin.com/in/<?= @$linkedin?>" target="_blank"><?= @$linkedin?></a></li><?php endif; ?>
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
                        <!-- <li>French <span class="lang-desc">(Professional)</span></li>
                        <li>Spanish <span class="lang-desc">(Professional)</span></li> -->
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
        </div>
        
    </div>
</article>
    
    <!-- Javascript -->          
    <script type="text/javascript" src="<?= base_url('assets/cvs/orbit/jquery-1.11.3.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/cvs/orbit/bootstrap.min.js') ?>"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="<?= base_url('assets/cvs/orbit/main.js') ?>"></script>            
</body>
</html> 

<style>
@media print {
@page { size: auto;  margin-top: 5mm; margin-bottom: 5mm; }
/* body { margin: 1.6cm; } */
}
</style>