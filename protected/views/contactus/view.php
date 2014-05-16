<?php
/* @var $this ContactusController */
/* @var $model Contactus */

$this->breadcrumbs=array(
	'Contactuses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Contactus', 'url'=>array('index')),
	array('label'=>'Create Contactus', 'url'=>array('create')),
	array('label'=>'Update Contactus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Contactus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contactus', 'url'=>array('admin')),
);
?>

<h1>View Contactus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'subject',
		'body',
		'date',
	),
)); ?>
