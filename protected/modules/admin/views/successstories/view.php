<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/successstories"><<<Назад к списку Successstories</a>

<h2>Подробный просмотр </h2>

<?php
    $this->widget(
        'bootstrap.widgets.TbDetailView',
        array(
            'data'=>$model,
            'attributes'=>array(
                    'id',
                    'client',
                    'task',
                    'solution',
                    'result',
                    'pic',
            ),
        )
    );
?>
