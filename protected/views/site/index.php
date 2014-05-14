<body class="main-page">
<div id="wrapper">
<header id="header">
    <div class="header-frame">
        <strong class="logo"><a href="/">CHI</a></strong>
        &nbsp;
        <nav id="nav">
            <div style="margin-top: 10px; display:inline-block; color:white; text-align: center;">BETA</div>
            <!--            <ul>-->
            <!--                <li class="nav"><a href="#company">Company</a></li>-->
            <!--                <li class="nav"><a href="#tech">TECHNOLOGIES</a></li>-->
            <!--                <li class="add">&nbsp;-->
            <!--                    <a href="/projects">PROJECTS</a>-->
            <!--                </li>-->
            <!--                <li class="nav"><a href="#vacancies">Vacancies</a></li>-->
            <!--            </ul>-->
        </nav>
    </div>
</header>
<div class="first-page">
    <section class="main">
        <h1 class="slogan">DESIGN. CODE. CLOUDIFY. <strong>FROM IDEA TO THE PRODUCT.</strong></h1>
    </section>
    <!--    <ul class="social-networks">-->
    <!--        <li><a href="#" class="facebook">facebook</a></li>-->
    <!--        <li><a href="#" class="twitter">twitter</a></li>-->
    <!--        <li><a href="#" class="linkedin">linkedin</a></li>-->
    <!--    </ul>-->
</div>
<div class="pages-holder">
<div class="page" id="company">
    <section class="main">
        <div class="m1">
            <div class="m2">

                <script>
                    /*
                     Get the curent slide
                     */
                    function currentSlide( current ) {
                        $(".current_slide").text(current + " of " + $("#slides").slides("status","total") );
                    }

                    $(function(){
                        /*
                         Initialize SlidesJS
                         */
                        $("#slides").slides({
                            navigateEnd: function( current ) {
                                currentSlide( current );
                            },
                            loaded: function(){
                                currentSlide( 1 );
                            }
                        });

                        /*
                         Play/stop button
                         */
                        $(".controls").click(function(e) {
                            e.preventDefault();

                            // Example status method usage
                            var slidesStatus = $("#slides").slides("status","state");

                            if (!slidesStatus || slidesStatus === "stopped") {

                                // Example play method usage
                                $("#slides").slides("play");

                                // Change text
                                $(this).text("Stop");
                            } else {

                                // Example stop method usage
                                $("#slides").slides("stop");

                                // Change text
                                $(this).text("Play");
                            }
                        });
                    });
                </script>

                <div id="container">
                    <div id="slides">
                        <?php
                        foreach($slides as $item){
                            echo '<img src="slides/'. $item->id .'/'. $item->img .'" width="780" height="300" alt="Slide 1">';
                        }
                        ?>

                    </div>
                    <a href="#" class="controls">Play</a>
                    <p class="current_slide"></p>
                </div>

                <h1>Company</h1>

                <h2>Offshore Development Center</h2>

                <div class="two-columns">
                    <div class="col">
                        <p>CHI Software has been on the market since 2003, starting its career from .Net, PHP and web
                            design. Now we are an offshore development center that specializes in .Net, Mobile, Python
                            and Ruby on Rails solutions development with headquarter office in Moscow, Russia and
                            development center in Kharkiv, Ukraine.</p>

                        <p>CHI Software features dynamic team of experienced consultants and programmers, creative
                            designers, and marketing professionals, who know how to get the most valuable results.</p>

                        <p>We are in a full command of our technologies but we are open to new techniques and constantly
                            seek self-improvement. High professionalism allows us to create applications that live up to
                            the highest expectations.</p>
                    </div>
                    <div class="col">
                        <p>CHI Software focuses on delivering B2C and B2B web and mobile solutions of various
                            complexities, leveraging the latest in .NET, PHP, Python, Cloud, Ruby on Rails, Java,
                            Objective C, iOS, Android, WP technology stacks.</p>

                        <p>We deliver well-implement solutions in a fast and qualified manner, flexible to fulfill
                            specific needs of our clients. We pay a great attention to both visual design and internal
                            implementation of our solutions. </p>

                        <p>We tailor the process using a smart mix of methodologies to create a zero-fat productive
                            development process and to produce high quality software. By introducing transparency into
                            our development process, delivering potentially shippable product every iteration,
                            inspecting results, and adopting features according to customer's feedback, we work without
                            loss of the time and money.</p>
                    </div>
                </div>
                <?php if ($profile != '') : ?>
                    <a href="#inline-profile" class="banner" id="downloads_profile"><img src="images/banner1.jpg" alt=""></a>
                <?php endif; ?>
                <?php if ($partners) : ?>
                    <h2>Our Partners</h2>
                    <ul class="partners-list">
                        <?php foreach ($partners as $partner) : ?>
                            <li><a href="<?php echo $partner->url; ?>" target="_blank"><span><img
                                            src="/partners/<?php echo $partner->id; ?>/<?php echo $partner->icon; ?>"
                                            alt="#"/></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <h2>Work Conditions</h2>

                <p>CHI Software is flexible to follow different business models and leverage optimal measures to
                    ensure more profitability for the Client.</p>

                <div class="four-columns">
                    <div class="col">
                        <h3 class="col-heading">Offshore Dedicated Development Team</h3>

                        <p>CHI Software provides customers with technical experts, thoroughly selected, based on
                            each customer's project needs. Our customers choose and have full control over our
                            technical experts, treating them as employees of their own company.</p>
                    </div>
                    <div class="col">
                        <h3 class="col-heading">Monthly Resource-<br/>based Model</h3>

                        <p>CHI Software's technical experts provide our customers with high-quality software
                            development services during large projects. Our customers do monthly billing.</p>
                    </div>
                    <div class="col">
                        <h3 class="col-heading">Time and Material</h3>

                        <p>CHI Software monitors our technical experts work on daily basis. Our customers do billing
                            based on hourly rate of our technical experts the actual time spent.</p>
                    </div>
                    <div class="col">
                        <h3 class="col-heading">Fixed Price</h3>

                        <p>CHI Software's business analysts and architects work with our customers to make project
                            estimation and delivery part, based on mutually agreed price for final deliverable
                            result.</p>
                    </div>
                </div>
                <h2>Contact Us</h2>

                <div class="section">
                    <div class="contact-box">
                        <ul class="contact-list">
                            <li>
                                <strong class="title">General queries: </strong>
                                <a href="mailto:&#105;&#110;&#102;&#111;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;">
                                    &#105;&#110;&#102;&#111;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;</a>
                            </li>
                            <li>
                                <strong class="title">Job opportunities</strong>
                                <a href="mailto:&#099;&#097;&#114;&#101;&#101;&#114;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;">
                                    &#099;&#097;&#114;&#101;&#101;&#114;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;</a>
                            </li>
                            <li>
                                <strong class="title">Partnership</strong>
                                <a href="mailto:&#115;&#097;&#108;&#101;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;">
                                    &#115;&#097;&#108;&#101;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;</a>
                            </li>
                        </ul>
                        <div class="other-contacts">
                            <strong class="title">Call</strong>
                            <span class="phone">+1 650 45 1111 7</span>
                            <strong class="title">Social</strong>
                            <ul class="social-networks">
                                <li><a href="#" class="facebook">facebook</a></li>
                                <li><a href="#" class="twitter">twitter</a></li>
                                <li><a href="#" class="linkedin">linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="circle-box">
                        <div class="col">
                            <img class="circle-image" src="images/circle1.png" alt="" width="182" height="182">
                            <strong class="title">Headquarters</strong>
                            <span>Moscow, Russia</span>
                        </div>
                        <div class="col">
                            <img class="circle-image" src="images/circle2.png" alt="" width="182" height="182">
                            <strong class="title">Development Center</strong>
                            <span>Kharkiv, Ukraine</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page technology-page" id="tech">
    <section class="main">
        <div class="m1">
            <div class="m2">
                <h1>Technologies</h1>

                <div class="technology-section">
                    <div class="frame">
                        <?php foreach ($tech as $technology) : ?>
                            <article class="item">
                                <header>
                                    <h2 class="technology-header"><?php echo $technology->title; ?></h2>
                                    <!--                                        <a href="/projects#-->
                                    <?php ////echo Controller::str2url($technology->title); //?><!--"-->

                                    <!--                                           class="btn">get a glimpse of</a>-->
                                    <!--                                           <a href="#" class="btn">get a glimpse of</a>-->
                                </header>
                                <div class="info">
                                    <div class="description">
                                        <p><?php echo $technology->description; ?></p>
                                    </div>
                                    <ul class="capabilities-list">
                                        <?php foreach ($technology->techLists as $element) : ?>
                                            <li>- <?php echo $element->title; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="page" id="vacancies">
    <section class="main">
        <div class="m1">
            <div class="m2">
                <h1>Vacancies</h1>

                <div class="vacancy-image">
                    <div class="holder">
                        <div class="frame">
                            <img class="main-image" src="images/img-vacancy.jpg" alt="">
                        </div>
                    </div>
                </div>
                <h3>CHI Software offers you:</h3>

                <div class="two-columns vacancy-columns">
                    <div class="col">
                        <ul>
                            <li>Competitive salary.</li>
                            <li>Regular evaluation and salary rise.</li>
                            <li>Convenient location of the office (2 minutes from Sumskaya street).</li>
                            <li>Cozy modern office with equipped kitchen, places for rest and X-Box.</li>
                            <li>Career and professional growth.</li>
                            <li>20 working-days paid vacation.</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <li>Paid sickness leave.</li>
                            <li>Flexible working schedule with the opportunity to work from home.</li>
                            <li>Free English courses twice a week.</li>
                            <li>Free bicycles parking.</li>
                            <li>Friendly team.</li>
                            <li>Democratic managment.</li>
                        </ul>
                    </div>
                </div>
                <div class="vacancy-holder">
                    <?php foreach ($jobs as $job) : ?>
                        <article class="vacancy-item">
                            <header>
                                <h2 class="col-heading"><?php echo $job->title; ?></h2>
                                <a href="#inline-content" id="<?php echo $job->id; ?>"
                                   class="btn-square inline cboxElement">Oh, I'm exactly that Guy</a>
                            </header>
                            <p><?php echo $job->description; ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<footer id="footer">
    <div class="footer-holder">
        <a href="#"><span>Contact Us</span></a>
        <span class="copy">CHI Copyright &copy; 2014</span>
    </div>
</footer>
</div>
<div id="bg"><img src="images/bg-body.jpg" alt=""/></div>
<div style="display:none;">
    <div id="inline-content">
        <form class="send-cv" action="/site/sendcv" method="post" enctype="multipart/form-data">
            <h1>vacancy request</h1>
            <!-- <span class="job-title"></span> -->
            <div class="alert" style="display:none;"></div>
            <div class="success" style="display:none;"></div>
            <div class="row-holder">
                <div class="form-row">
                    <label>your name</label>
                    <input type="text" name="name"/>
                </div>
                <div class="form-row">
                    <label>e-mail</label>
                    <input type="text" name="email"/>
                </div>
                <div class="form-row msg">
                    <label>comments</label>
                    <textarea name="message"></textarea>
                </div>
                <div class="form-row">
                    <div class="add-resume">
                        <div class="button">
                            <span>add resume</span>
                            <input type="file" name="cv" class="custom-file"/>
                        </div>
                        <span class="name"></span>
                    </div>
                </div>
            </div>
            <input type="hidden" name="jobid" value=""/>

            <div class="submit-holder">
                <input type="submit" value="Send"/>
            </div>
        </form>
    </div>
</div>


<div style="display:none;">
    <div id="inline-profile">
        <?php
			
			echo CHtml::beginForm(); //form open
				$i = 1;
				foreach($files as $item) {
					if($i == 1) {								
						echo CHtml::checkBox('file'.$i, true, array('value' => $item->file));
					}else{
						echo CHtml::checkBox('file'.$i, '', array('value' => $item->file));
					}
					echo $item->title;	
					echo '<br />';
					$i++;
				}
				echo CHtml::ajaxSubmitButton('Download Selected Documents', Yii::app()->request->baseUrl.'/index.php/ajax/documents', array(
					'type' => 'POST',
					'dataType' => 'json',
					'success'=>'function (data) {
						if(data.true) {
							$.colorbox.close();
							location.href = "documents/"+data.true;
						}
					}'
				),
				array(
					'type' => 'submit'
				));
				
				echo '<br />';
				
				echo '<div id="message"></div>';
				echo CHtml::textField('email');			
				echo CHtml::ajaxSubmitButton('Send to my email', Yii::app()->request->baseUrl.'/index.php/ajax/documentsemail', array(
					'type' => 'POST',
					'dataType' => 'json',
					'success'=>'function (data) {
						if(data.true) {
							function boxClose(){
								$.colorbox.close();
							}							
							setTimeout(boxClose,5000);
							$("#message").html(data.true);
						}
						if(data.error) {
							$("#message").html(data.error);
						}						
					}'
				),
				array(
					'type' => 'submit'
				));						
			echo CHtml::endForm(); //form end
        ?>
    </div>
</div>
</body>



