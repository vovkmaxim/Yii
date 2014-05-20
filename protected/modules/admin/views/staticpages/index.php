<h2>Статические страницы</h2>
<?php
    $this->widget(
        'bootstrap.widgets.TbGridView',
        array(
            'id'=>'staticpages-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
        //        'id',
                array(
                    'name' => 'title',
                    'value' => 'CHtml::link(
                                    $data->title,
//                                    array("/staticpages/index","page"=>$data->title),
                                    array("/$data->title"),
                                    array("target"=>"_blank")
                                )',
                    'type' => 'raw',
                ),
                'text',
                'dateCreate',
                'dateUpdate',
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{delete}{update}',
                ),
            ),
        )
    );
?>
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/staticpages/add">Добавить</a>

