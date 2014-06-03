<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews'=>array('/reviews'),
	'Searchtag',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<form method="post" action="/index.php?r=reviews/showsearchtag">
    <input type="text" name="tag" value=""><br>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Create'); ?>
    </div>
</form>