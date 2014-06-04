<h2>Testmonials</h2>

<?php
$this->widget(
    'bootstrap.widgets.TbGridView',
    array(
        'id'=>'questions-grid',
        'dataProvider'=>$model->search(),
        'template'=>"{items}\n{pager}",
        'filter'=>$model,
        'columns'=>array(
            'title',
            'description',
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{delete}{update}',
            ),
        ),
    )
);
?>
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/testmonials/add">Add</a>
