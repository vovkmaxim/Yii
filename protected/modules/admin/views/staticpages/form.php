<?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id' => 'horizontalForm',
            'type' => 'horizontal',
        )
    );
?>


<?php echo $form->textFieldRow($model, 'title', array('class' => "input-xxlarge")); ?>

<?php

    if (!$model->isNewRecord){
        echo $form->textFieldRow(
            $model,
            'activelink',
            array(
                'disabled' => true,
                'class' => "input-xxlarge",
            )
        );
        echo $form->textFieldRow(
            $model,
            'dateCreate',
            array(
                'disabled' => true,
                'class' => "input-xxlarge",
            )
        );
        echo $form->textFieldRow(
            $model,
            'dateUpdate',
            array(
                'disabled' => true,
                'class' => "input-xxlarge",
            )
        );
    } else {
       $Staticpages['dateCreate'] = date("F j, Y");
     }
?>

<?php echo $form->ckEditorRow(
    $model,
    'text',
    array(
        'editorOptions' => array(
           'fullpage' => 'js:true',
            'width' => '840',
            'resize_maxWidth' => '640',
            'resize_minWidth' => '320'
        )
    )
); ?>

<?php //echo $form->textFieldRow($model, 'etc', array('class' => "input-xxlarge",)); ?>

    <div class="form-actions">
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Принять'
            )
        ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Сбросить')
        ); ?>
    </div>
<?php
$this->endWidget();
unset($form);