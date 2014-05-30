
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'documents-form',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    )); ?>


    <div class="control-group">
        <?php echo $form->label($model,'Title*', array('for' => 'Documents_title')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title', array('class' => 'input-xxlarge')); ?>
        </div>
    </div>
    <?php echo $form->label($model,'description*'); ?>
    <?php
    $this->widget(
        'application.extensions.ckeditor.CKEditor',
        array(
            'model' => $model,
            'attribute' => 'description',
            'language' => 'en',
            'editorTemplate' => 'full',
            'options'=>array('filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('documents/browse')),'width'=>'840')

        )
    );
    ?>
<!---->
<!--    <div class="control-group">-->
<!--        <div class="controls">-->
<!--            --><?php //echo $form->ckEditorRow(
//                $model,
//                'description',
//                array(
//                    'editorOptions' => array(
//                        'fullpage' => 'js:true',
//                        'width' => '840',
//                        'resize_maxWidth' => '640',
//                        'resize_minWidth' => '320'
//                    )
//                )
//            ); ?>
<!--        </div>-->
<!--    </div>-->

    <div class="control-group">
        Only PDF format
    </div>

    <div class="control-group">
    <?php
        if(!empty($model->file)){
            echo '<a href="/documents/' . $model->file . '">' . $model->file . '</a>';
        }
    ?>
    </div>

    <div class="control-group">
        <?php echo $form->fileField($model, 'file'); ?>
    </div>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Create' : 'Save',
        ));
        ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            array('buttonType' => 'reset', 'label' => 'Reset')
        );
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>