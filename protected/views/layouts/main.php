<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=1020" />
    <meta name="MobileOptimized" content="1020" />
    <title>CHI Software</title>
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css" />
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox.css" />
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/all.css" />

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-1.9.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fancybox.js?v=2.1.5"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/waypoints.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.slideshow.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.main.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/slides.js"></script>

</head>
<body>
<div id="wrapper">
    <div class="content_wrapper">
        <header id="header">
            <div class="header-frame">
                <div class="header_holder group">
                    <strong class="logo"><a href="#">CHI software</a></strong>
<!--                    --><?php //$this->widget('Menu'); ?>
                    <nav id="nav">
                        <?php $this->renderPartial('application.views.layouts._menu', array('rootId' => 0)); ?>
                    </nav>
                </div>
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

        <?php echo $content; ?>

    </div>
    <footer id="footer">
        <div class="footer-holder">
            <div class="footer-frame">
                <div class="four-columns">
                    <div class="col">
                        <ul>
                            <li>Chi Software</li>
                            <li>2003-<?php echo date('Y'); ?> &copy;</li>
                        </ul>
                    </div>
                    <div class="col">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">LinkedIn</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h3>Information</h3>
                        <ul>
                            <li><a href="#">Vacancies</a></li>
                            <li><a href="#">Management</a></li>
                            <li><a href="#">Marketing documents</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="#">Call +1 650 45 11117</a></li>
                            <li><a href="#">Contact Use Form</a></li>
                            <li><a href="#">Live Chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div id="bg"><img src="images/backgrounds/bg-body1.jpg" alt="" /></div>
<div class="popup-hide">
    <div id="inline-content">
        <form action="#" class="send-cv">
            <div class="popup_holder">
                <h1>vacancy request</h1>
            </div>
            <div class="alert"></div>
            <div class="success"></div>
            <div class="row-holder">
                <div class="form-row">
                    <label>your name</label>
                    <input type="text" name="title">
                </div>
                <div class="form-row">
                    <label>e-mail</label>
                    <input type="email">
                </div>
                <div class="form-row msg">
                    <label>comments</label>
                    <textarea name="message"></textarea>
                </div>
                <div class="form-row">
                    <div class="atach file">
                        <div class="button">
                            <span>add resume</span>
                            <input type="file" class="custom-file" name="cv">
                        </div>
                        <span class="name"></span>
                    </div>
                </div>
            </div>
            <div class="submit-holder">
                <input type="submit" value="Send">
            </div>
        </form>
    </div>
</div>
</body>
</html>

