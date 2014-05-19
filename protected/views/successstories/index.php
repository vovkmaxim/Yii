<?php
/* @var $this SuccessstoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Successstories',
);

$this->menu=array(
	array('label'=>'Create Successstories', 'url'=>array('create')),
	array('label'=>'Manage Successstories', 'url'=>array('admin')),
);
?>

<h1>Successstories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
