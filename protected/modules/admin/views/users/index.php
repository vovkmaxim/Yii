<h2>Users</h2>

<?php
$this->widget(
    'bootstrap.widgets.TbGridView',
    array(
        'id'=>'successstories-grid',
        'dataProvider'=>$model->search(),
        'template'=>"{items}\n{pager}",
        'filter'=>$model,
        'columns'=>array(
            'username',
             array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{delete}{update}',
            ),
        ),
    )
);
?>
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/users/add">Add</a>
