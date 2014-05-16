<h1>Данные страницы Contact Us</h1>

<?php
    $this->widget(
        'bootstrap.widgets.TbGridView',
        array(
            'id'=>'contactdata-grid',
            'dataProvider'=>$model->search(),
            'template'=>"{items}\n{pager}",
            'columns'=>array(
                'general',
                'jobs',
                'partnership',
                'phone',
                'adress',
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
//                    'template'=>'{delete}{update}',
                    'template'=>'{update}',
                ),
            ),
        )
    );
?>
<!--<a class="btn" href="--><?php //echo Yii::app()->getBaseUrl(true)?><!--/admin/contactdata/create">Добавить</a>-->