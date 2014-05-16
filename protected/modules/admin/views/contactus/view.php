<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/contactus"><<<Назад к списку вопросов</a>
<h2>Подробный просмотр вопроса №<?php echo $model->id; ?></h2>

<?php
    $this->widget(
        'bootstrap.widgets.TbDetailView',
        array(
            'data'=>$model,
            'type' => array('condensed', 'striped', 'bordered'),

            'attributes'=>array(
                    'id',
                    'name',
                    'email',
                    'subject',
                    'body',
                    'date',
            ),
        )
    );
?>
