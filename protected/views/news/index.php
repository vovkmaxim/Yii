<?php
/* @var $this NewsController */

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'All', 'url' => array('/news/all')),
        array('label' => 'Create News', 'url' => array('/news/create')),
        array('label' => 'Search tag news', 'url' => array('/news/searchtag')),
        array('label' => 'Search text news', 'url' => array('/news/searchtext')),
    ),
));


$this->breadcrumbs = array(
    'News',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
