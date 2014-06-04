<h2>Success stories</h2>

<?php
$this->widget(
    'bootstrap.widgets.TbGridView',
    array(
        'id'=>'successstories-grid',
        'dataProvider'=>$model->search(),
        'template'=>"{items}\n{pager}",
        'filter'=>$model,
        'columns'=>array(
            //        'id',
            'client',
            'task',
            'solution',
            'result',
//                'pic',
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{delete}{update}{view}',
            ),
        ),
    )
);
?>
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/successstories/update">Add</a>
