<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News'=>array('/news'),
	'Searchtag',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php 
    if(isset($errors) && !empty($errors)){
        echo '<p class = "error" >' . $errors . '</p>';
    }
?>
<form method="post" action="/index.php?r=news/showsearchtag">
    <input type="text" name="tag" value=""><br>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
</form>