<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews'=>array('/reviews'),
	'Searchtext',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<form method="post" action="/index.php?r=reviews/showsearchtext">
    <input type="text" name="text" value=""><br>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
</form>