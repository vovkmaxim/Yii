<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=1020" />
    <meta name="MobileOptimized" content="1020" />
    <title>CHI Software</title>
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css" />
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/all.css" />

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-1.9.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/waypoints.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.main.js"></script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-37652812-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

</head>
<?php echo $content; ?>
</html>