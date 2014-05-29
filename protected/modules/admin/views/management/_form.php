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

    <?php if($form->error($model, 'email')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'email'); ?>
        </div>
    <?php endif; ?>

    <?php if($form->error($model, 'img')): ?>
        <div class="alert alert-error">
            <?php echo $form->error($model, 'img'); ?>
        </div>
    <?php endif; ?>

    <div class="control-group">
        <?php echo $form->label($model,'Title*'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title', array('class' => 'input-xxlarge')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->label($model,'Email*'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'email', array('class' => 'input-xxlarge')); ?>
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
        <p>Formats: JPG, JPEG, BMP, GIF, PNG.</p>
        <p>Recommended size: 120x120</p>
    </div>

    <?php if(!empty($model->img)): ?>
    <div class="control-group">
        Picture - <a href="/images/management/<?php echo $model->id; ?>/<?php echo $model->img; ?>" target="_blank"><?php echo $model->img; ?></a>
        <?php if(!$model->isNewRecord): ?>
            <?php if ($model->img != ''): ?>
<!--            <a title="Delete" href="/admin/management/deletefile/id/--><?php //echo $model->id;?><!--" class="icon-trash"></a>-->
               <?php  echo CHtml::link('', array("/admin/management/deletefile/", 'id'=>$model->id), array('confirm'=>'Are you sure?', 'class'=>'icon-trash')); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php else: ?>
    <div class="control-group">
      No Picture uploaded
    </div>
    <?php endif; ?>

    <div class="control-group">
        <?php echo $form->fileField($model, 'img'); ?>
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
