<h2>Technologies</h2>

<?php
$this->widget(
    'bootstrap.widgets.TbGridView',
    array(
        'id'=>'tech-grid',
        'dataProvider'=>$techList->search(),
        'template'=>"{items}\n{pager}",
        'columns'=>array(
            'title',
            'info',
            array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>'{delete}{update}',
            ),
        ),
    )
);
?>
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/tech/add">Add</a>
