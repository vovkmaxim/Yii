<?php
/* @var $this ReviewsController */

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'All', 'url' => array('/reviews/all')),
        array('label' => 'Create review', 'url' => array('/reviews/create')),
        array('label' => 'Search tag review', 'url' => array('/reviews/searchtag')),
        array('label' => 'Search text review', 'url' => array('/reviews/searchtext')),
    ),
));

$this->breadcrumbs=array(
	'Reviews',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
