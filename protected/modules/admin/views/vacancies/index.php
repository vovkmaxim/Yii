<h2>Vacancies</h2>

<?php
$this->widget(
    'bootstrap.widgets.TbGridView',
    array(
        'id'=>'vacancies-grid',
        'dataProvider'=>$model->search(),
        'template'=>"{items}\n{pager}",
        'filter'=>$model,
        'columns'=>array(
            //        'id',
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
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/vacancies/add">Add</a>