<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Pillar - Bootstrap 4 Resume/CV Template for Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Resume Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script type="text/javascript" src="<?= base_url('assets/cvs/pillers/fontawesome-all.min.js') ?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/cvs/orbit/bootstrap_print.css') ?>">   
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/cvs/pillers/pillar-1.css') ?>">


</head> 

<body>	

    <article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-left bg-white shadow-lg">
		    <header class="resume-header pt-4 pt-md-0">
			    <div class="media flex-column flex-md-row">
				    <img class="mr-3 img-fluid picture mx-auto" src="<?= base_url('uploads/'.$image); ?>" alt="">
				    <div class="media-body p-4 d-flex flex-column flex-md-row mx-auto mx-lg-0">
					    <div class="primary-info">
						    <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase"><?= @$name?></h1>
						    <div class="title mb-3"><?= @$job_title?></div>
						    <ul class="list-unstyled">
								<li class="mb-2"><a href="#"><i class="far fa-envelope fa-fw mr-2" data-fa-transform="grow-3"></i><?= @$email?></a></li>
							    <li><a href="#"><i class="fas fa-mobile-alt fa-fw mr-2" data-fa-transform="grow-6"></i><?= @$phone?></a></li>
						    </ul>
					    </div><!--//primary-info-->
					    <div class="secondary-info ml-md-auto mt-2">
						    <ul class="resume-social list-unstyled">
<?php if( isset($linkedin) && $linkedin): ?><li class="mb-3"><a href="https://linkedin.com/in/<?=@$linkedin ?>" target="_blank"><span class="fa-container text-center mr-2"><i class="fab fa-linkedin-in fa-fw"></i></span>linkedin.com/in/<?=@$linkedin ?></a></li><?php endif; ?>
<?php if( isset($github) && $github): ?><li class="mb-3"><a href="https://github.com/<?=@$github ?>" target="_blank"><span class="fa-container text-center mr-2"><i class="fab fa-github-alt fa-fw"></i></span>github.com/<?=@$github?></a></li><?php endif; ?>
<?php if( isset($twitter) && $twitter): ?><li class="mb-3"><a href="https://twitter.com/<?=@$twitter ?>" target="_blank"><span class="fa-container text-center mr-2"><i class="fab fa-twitter fa-fw"></i></span>twitter.com/<?=@$twitter ?></a></li><?php endif; ?>
<?php if( isset($instagram) && $instagram): ?><li class="mb-3"><a href="https://instagram.com/<?=@$instagram ?>" target="_blank"><span class="fa-container text-center mr-2"><i class="fab fa-instagram fa-fw"></i></span>instagram.com/<?=@$instagram ?></a></li><?php endif; ?>
<?php if( isset($facebook) && $facebook): ?><li class="mb-3"><a href="https://facebook.com/<?=@$facebook ?>" target="_blank"><span class="fa-container text-center mr-2"><i class="fab fa-facebook fa-fw"></i></span>facebook.com/<?=@$facebook ?></a></li><?php endif; ?>
<?php if( isset($website) && $website): ?><li><a href="https://<?=@$website ?>" target="_blank"><span class="fa-container text-center mr-2"><i class="fas fa-globe"></i></span><?=@$website ?></a></li><?php endif; ?>
						    </ul>
					    </div><!--//secondary-info-->
					    
				    </div><!--//media-body-->
			    </div><!--//media-->
		    </header>
		    <div class="resume-body p-5">
			    <section class="resume-section summary-section mb-5">
				    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Career Summary</h2>
				    <div class="resume-section-content">
					    <p class="mb-0"><?= @$description ?></p>
				    </div>
			    </section><!--//summary-section-->
			    <div class="row">
				    <div class="col-xs-9">
					    <section class="resume-section experience-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
						    <div class="resume-section-content">
							    <div class="resume-timeline position-relative">
								<?php foreach($experience as $key=>$val):?>
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1"><?= $val['title'] ?></h3>
										        <div class="resume-company-name ml-auto"><?= $val['company'] ?></div>
										    </div><!--//row-->
										    <div class="resume-position-time"><?= $val['start']. " - " . $val['end'] ?></div>
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
											<p><?= $val['description'] ?></p>
											<?php if( isset($val['achievements']) && $val['achievements']): ?>
										    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4>
											<p>Praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
										    <ul>
											    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
											    <li>At vero eos et accusamus et iusto odio dignissimos.</li>
											    <li>Blanditiis praesentium voluptatum deleniti atque corrupti.</li>
											    <li>Maecenas tempus tellus eget.</li>
											</ul>
											<?php endif; ?>
											<?php if( isset($val['technology']) && $val['technology']): ?>
										    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
											    <li class="list-inline-item"><span class="badge badge-primary badge-pill">Angular</span></li>
											    <li class="list-inline-item"><span class="badge badge-primary badge-pill">Python</span></li>
											    <li class="list-inline-item"><span class="badge badge-primary badge-pill">jQuery</span></li>
											    <li class="list-inline-item"><span class="badge badge-primary badge-pill">Webpack</span></li>
											    <li class="list-inline-item"><span class="badge badge-primary badge-pill">HTML/SASS</span></li>
											    <li class="list-inline-item"><span class="badge badge-primary badge-pill">PostgresSQL</span></li>
											</ul>
											<?php endif; ?>
									    </div><!--//resume-timeline-item-desc-->

									</article><!--//resume-timeline-item-->
								<?php endforeach; ?>
							    </div><!--//resume-timeline-->
						    </div>
					    </section><!--//experience-section-->
				    </div>
				    <div class="col-xs-3">
					    <section class="resume-section skills-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h2>
						    <div class="resume-section-content">
							<?php if(isset($proficiency)): ?>
						        <div class="resume-skill-item">
							        <h4 class="resume-skills-cat font-weight-bold">Frontend</h4>
							        <ul class="list-unstyled mb-4">
								        <li class="mb-2">
								            <div class="resume-skill-name">Angular</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 98% !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">React</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 94% !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">JavaScript</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 96% !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        
								        <li class="mb-2">
								            <div class="resume-skill-name">Node.js</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 92% !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">HTML/CSS/SASS/LESS</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 96% !important" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
							        </ul>
						        </div><!--//resume-skill-item-->
						        
						        <div class="resume-skill-item">
						            <h4 class="resume-skills-cat font-weight-bold">Backend</h4>
							        <ul class="list-unstyled">
								        <li class="mb-2">
								            <div class="resume-skill-name">Python/Django</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">Ruby/Rails</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 92%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">PHP</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 86%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">WordPress/Shopify</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 82%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
							        </ul>
						        </div><!--//resume-skill-item-->
							<?php endif; ?>
						        <div class="resume-skill-item">
						            <ul class="list-inline">
									<?php foreach($skills as $val):?>
										<li class="list-inline-item"><span class="badge badge-light"><?= $val?></span></li>
									<?php endforeach; ?>
						            </ul>
						        </div><!--//resume-skill-item-->
						    </div><!--resume-section-content-->
					    </section><!--//skills-section-->
					    <section class="resume-section education-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								<?php foreach($education as $key=>$val):?>	
									<li class="mb-2">
								        <div class="resume-degree font-weight-bold"><?= $val['degree']; ?> - <?= $val['course']; ?></div>
								        <div class="resume-degree-org"><?= @$val['school']; ?></div>
								        <div class="resume-degree-time"><?= @$val['year']; ?></div>
									</li>
								<?php endforeach; ?>
							    </ul>
						    </div>
						</section><!--//education-section-->
						<?php if (isset($awards) && $awards): ?>
					    <section class="resume-section reference-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Awards</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled resume-awards-list">
								<?php foreach($awards as $key=>$val):?>
								    <li class="mb-2 pl-4 position-relative">
								        <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
										<div class="resume-award-name"><?= $val['title'] ?></div>
										<div class="resume-degree-time"><?= @$val['year']; ?></div>
								        <div class="resume-award-desc"><?= $val['description'] ?></div>
									</li>
								<?php endforeach; ?>
							    </ul>
						    </div>
						</section><!--//interests-section-->
						<?php endif; ?>
					    <section class="resume-section language-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Language</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled resume-lang-list">
								    <li class="mb-2"><span class="resume-lang-name font-weight-bold">English</span> <small class="text-muted font-weight-normal">(Native)</small></li>
								    <li class="mb-2 align-middle"><span class="resume-lang-name font-weight-bold">French</span> <small class="text-muted font-weight-normal">(Professional)</small></li>
								    <li><span class="resume-lang-name font-weight-bold">Spanish</span> <small class="text-muted font-weight-normal">(Professional)</small></li>
							    </ul>
						    </div>
					    </section><!--//language-section-->
					    <section class="resume-section interests-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Interests</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								<?php foreach($hobbies as $val):?>
								<li class="mb-1"><?= $val; ?></li>
            					<?php endforeach; ?>
								    <!-- <li class="mb-1">Climbing</li>
								    <li class="mb-1">Snowboarding</li>
								    <li class="mb-1">Cooking</li> -->
							    </ul>
						    </div>
					    </section><!--//interests-section-->
					    
				    </div>
			    </div><!--//row-->
		    </div><!--//resume-body-->
		    
		    
	    </div>
    </article>
</body>
</html>