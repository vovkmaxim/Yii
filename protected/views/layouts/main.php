<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <title>CHI Software</title>
    <link media="all" rel="stylesheet" type="text/css" href="/css/colorbox.css" />
    <link media="all" rel="stylesheet" type="text/css" href="/css/all.css" />
    <script src="/js/libs/jquery-1.9.0.min.js"></script>
    <script src="/js/libs/modernizr-2.6.2.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/jquery.nicescroll.min.js"></script>
    <script src="/js/jquery.colorbox.js"></script>
    <script src="/js/jquery.main.js"></script>
</head>
<body>
<?php echo $content; ?>
<div style="display:none;">
    <div id="inline-content">
         <form class="send-cv" action="" method="post" enctype="multipart/form-data">
             <h1>vacancy request</h1>
             <!-- <span class="job-title"></span> -->
             <div class="alert" style="display:none;"></div>
             <div class="success" style="display:none;"></div>
             <div class="row-holder">
                 <div class="form-row">
                     <label>your name</label>
                     <input type="text" name="name" />
                 </div>
                 <div class="form-row">
                     <label>e-mail</label>
                     <input type="text" name="email" />
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