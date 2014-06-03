<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News'=>array('/news'),
	'Searchtext',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<form method="post" action="/index.php?r=news/showsearchtext">
    <input type="text" name="text" value=""><br>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
</form>