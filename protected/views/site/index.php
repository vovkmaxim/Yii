<<<<<<< HEAD
<body class="main-page">
<div id="wrapper">
<header id="header">
    <div class="header-frame">
        <strong class="logo"><a href="/">CHI</a></strong>
        &nbsp;
        <nav id="nav">
<!--            <div style="margin-top: 10px; display:inline-block; color:white; text-align: center;">BETA</div>-->
                        <ul>
                            <li class="nav"><a href="#company">Company</a></li>
                            <li class="nav"><a href="#tech">TECHNOLOGIES</a></li>
                            <li class="add">&nbsp;
                                <a href="/projects">PROJECTS</a>
                            </li>
                            <li class="nav"><a href="#vacancies">Vacancies</a></li>
                        </ul>
        </nav>
    </div>
</header>
<div class="first-page">
    <section class="main">
        <h1 class="slogan">DESIGN. CODE. CLOUDIFY. <strong>FROM IDEA TO THE PRODUCT.</strong></h1>
    </section>
        <ul class="social-networks">
            <li><a href="#" class="facebook">facebook</a></li>
            <li><a href="#" class="twitter">twitter</a></li>
            <li><a href="#" class="linkedin">linkedin</a></li>
        </ul>
</div>
=======
>>>>>>> 4bd5ba44af2d369954fb301df38d5bb6c833cecb
<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <h1>Company</h1>
                    <h2>Offshore Development Center</h2>
                    <div class="two-columns">
                        <div class="col">
                            <p>CHI Software has been on the market since 2003, starting its career from .Net, PHP and web design. Now we are an offshore development center that specializes in .Net, Mobile, Python and Ruby on Rails solutions development with headquarter office in Moscow, Russia and development center in Kharkiv, Ukraine.</p>
                            <p>CHI Software features dynamic team of experienced consultants and programmers, creative designers, and marketing professionals, who know how to get the most valuable results.</p>
                            <p>We are in a full command of our technologies but we are open to new techniques and constantly seek self-improvement. High professionalism allows us to create applications that live up to the highest expectations.</p>
                        </div>
                        <div class="col">
                            <p>CHI Software focuses on delivering B2C and B2B web and mobile solutions of various complexities, leveraging the latest in .NET, PHP, Python, Cloud, Ruby on Rails, Java, Objective C, iOS, Android, WP technology stacks.</p>
                            <p>We deliver well-implement solutions in a fast and qualified manner, flexible to fulfill specific needs of our clients. We pay a great attention to both visual design and internal implementation of our solutions. </p>
                            <p>We tailor the process using a smart mix of methodologies to create a zero-fat productive development process and to produce high quality software. By introducing transparency into our development process, delivering potentially shippable product every iteration, inspecting results, and adopting features according to customer's feedback, we work without loss of the time and money.</p>
                        </div>
                    </div>

                    <?php if(!empty($conditionsList)): ?>
                    <h2>Work Conditions<a href="#inline-content" class="inline cboxElement"><img src="images/pdf-icon0.png" alt=""></a></h2>
                    <p>CHI Software is flexible to follow different business models and leverage optimal measures to ensure more profitability for the Client.</p>
                    <div class="four-columns">
                        <?php foreach($conditionsList as $item) : ?>
                        <div class="col">
                            <h3 class="col-heading"><?php echo $item->title; ?></h3>
                            <?php echo $item->description; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($techList)): ?>
                    <h2>Our Expertise <a href="#"><img src="images/pdf-icon0.png" alt="" width="22" height="27"></a></h2>
                    <p>CHI Software is flexible to follow different business models and leverage optimal measures to ensure more profitability for the Client.</p>
                    <div class="five-columns">
                        <?php foreach($techList as $item) : ?>
                        <div class="col">
                            <a href="expertise/projects/tech/<?php echo $item->title; ?>">
                                <img src="images/tmp/partner1.jpg" alt="#"/>
                                <h3><?php echo $item->title; ?></h3>
                                <?php echo $item->description; ?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

<<<<<<< HEAD
                        <p>We tailor the process using a smart mix of methodologies to create a zero-fat productive
                            development process and to produce high quality software. By introducing transparency into
                            our development process, delivering potentially shippable product every iteration,
                            inspecting results, and adopting features according to customer's feedback, we work without
                            loss of the time and money.</p>
                    </div>
                </div>
<!--                --><?php //if ($profile != '') : ?>
                    <a href="#inline-profile" class="banner" id="downloads_profile"><img src="images/banner1.jpg" alt=""></a>
<!--                --><?php //endif; ?>
                <?php if ($partners) : ?>
                    <h2>Our Partners</h2>
=======
                    <?php if(!empty($clientsList)): ?>
                    <h2>Our Clients</h2>
>>>>>>> 4bd5ba44af2d369954fb301df38d5bb6c833cecb
                    <ul class="partners-list">
                        <?php foreach($clientsList as $item) : ?>
                        <li><a href="#"><span><img src="images/stories/<?php echo $item->id; ?>/<?php echo $item->pic; ?>" alt="#"/></span></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <h2>Testimonials</h2>
                    <div class="three-columns">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna vitae felis tempus faucibus eu id nisl. Integer rhoncus tellus eget tempor dictum. Nullam id pretium nulla. Aenean porttitor sagittis ipsum nec tempus. Vivamus auctor magna posuere leo molestie aliquet. Nam... <a href="#">Read more</a>
                            </p>
                            <p>John Doe, CEO at Company</p>
                        </div>
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna vitae felis tempus faucibus eu id nisl. Integer rhoncus tellus eget tempor dictum. Nullam id pretium nulla. Aenean porttitor sagittis ipsum nec tempus. Vivamus auctor magna posuere leo molestie aliquet. Nam... <a href="#">Read more</a>
                            </p>
                            <p>John Doe, CEO at Company</p>
                        </div>
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna vitae felis tempus faucibus eu id nisl. Integer rhoncus tellus eget tempor dictum. Nullam id pretium nulla. Aenean porttitor sagittis ipsum nec tempus. Vivamus auctor magna posuere leo molestie aliquet. Nam... <a href="#">Read more</a>
                            </p>
                            <p>John Doe, CEO at Company</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="bg"><img src="images/backgrounds/bg-body1.jpg" alt="" /></div>
<div class="popup-hide">
    <div id="inline-content">
        <?php echo CHtml::beginForm('','', array('class' => 'form_documents')); ?>
            <div class="popup_header_holder">
                <h1>CHI Marketing Documents</h1>
            </div>
            <p>Please select what marketing documents you would like to download.</p>
            <div class="two-columns group">
                <div class="col">
                    <?php
                    $i = 1;
                    foreach($files as $item) {
                        echo '
                                <div class="row group">
                                    <input type="checkbox" id="doc1" name="file'. $i .'" value="'. $item->file .'">
                                    <label for="doc1">'. $item->title .'</label>
                                </div>
                            ';
                        $i++;
                    }
                    ?>
                </div>
            </div>
            <div class="submit-holder">
                <?php
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
                ?>
            </div>
            <div class="two-columns group">
                <div class="col">
                    <input type="email" placeholder="email" name="email">
                    <span class="error" id="error"></span>
                </div>
                <div class="col group">
                    <?php
                    echo CHtml::ajaxSubmitButton('Send', Yii::app()->request->baseUrl.'/index.php/ajax/documentsemail', array(
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
                                    $("#error").html(data.error);
                                }
                            }'
                        ),
                        array(
                            'type' => 'submit'
                        ));
                    ?>
                </div>
            </div>
            <p id="message"></p>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
