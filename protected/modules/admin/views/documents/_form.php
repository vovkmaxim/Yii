
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'documents-form',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    )); ?>

    <?php if($form->error($model, 'title')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'title'); ?>
        </div>
    <?php endif; ?>

    <?php if($form->error($model, 'file')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'file'); ?>
        </div>
    <?php endif; ?>

    <div class="control-group">
        <?php echo $form->label($model,'Title*', array('for' => 'Documents_title')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title', array('class' => 'input-xxlarge')); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <?php echo $form->ckEditorRow(
                $model,
                'description',
                array(
                    'editorOptions' => array(
                        'fullpage' => 'js:true',
                        'width' => '840',
                        'resize_maxWidth' => '640',
                        'resize_minWidth' => '320'
                    )
                )
            ); ?>
        </div>
    </div>

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