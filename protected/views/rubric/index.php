<?php
/* @var $this RubricController */

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'All', 'url' => array('/rubric/all')),
        array('label' => 'Create Rubric', 'url' => array('/rubric/create')),
    ),
));

$this->breadcrumbs=array(
	'Rubric',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
