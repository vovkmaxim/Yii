<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <title>CHI Software</title>
    <link media="all" rel="stylesheet" type="text/css" href="css/colorbox.css" />
    <link media="all" rel="stylesheet" type="text/css" href="css/all.css" />
    <script src="js/libs/jquery-1.9.0.min.js"></script>
    <script src="js/libs/modernizr-2.6.2.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.colorbox.js"></script>
    <script src="js/jquery.main.js"></script>
</head>
<body>
<div id="wrapper">
<header id="header">
    <div class="header-frame">
        <strong class="logo"><a href="#">CHI software</a></strong>
        <nav id="nav">
            <ul>
                <li><a href="#pageId1">Company</a></li>
                <li><a href="#pageId2">TECHNOLOGIES</a></li>
                <li class="add"><a href="#pageId3">PROJECTS</a></li>
                <li><a href="#pageId4">Vacancies</a></li>
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
<div class="pages-holder">
<?php echo $content; ?>
</div>
</div>
<div id="bg"><img src="images/bg-body.jpg" alt="" /></div>
<div style="display:none">
    <div id="inline-content">
         <form class="send-cv" action="" method="post" enctype="multipart/form-data">
             <h1>vacancy request</h1>
             <!-- <span class="job-title"></span> -->
             <div class="alert" style="display:none;"></div>
             <div class="success" style="display:none;"></div>
             <div class="row-holder">
                 <div class="form-row">
                     <label>your name</label>
                     <input type="text" name="title" />
                 </div>
                 <div class="form-row">
                     <label>e-mail</label>
                     <input type="email" />
                 </div>
                 <div class="form-row msg">
                     <label>comments</label>
                     <textarea name="message"></textarea>
                 </div>
                 <div class="form-row">
                     <div class="add-resume">
                         <div class="button">
                             <span>add resume</span>
                             <input type="file" name="cv" class="custom-file" />
                         </div>
                         <span class="name"></span>
                     </div>
                 </div>
             </div>
             <input type="hidden" name="jobid" value="" />
             <div class="submit-holder">
                 <input type="submit" value="Send" />
             </div>
         </form>
    </div>
</div>
</body>
</html>