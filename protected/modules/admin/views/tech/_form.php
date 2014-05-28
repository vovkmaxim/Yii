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
        <?php echo $form->label($model,'Title*'); ?>
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
        <div class="controls">
            <?php echo $form->ckEditorRow(
                $model,
                'info',
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

    <div class="control-group list">
        <label> Теги: </label>
        <div class="elements">
            <?php if (!empty($list)) : ?>
                <?php foreach ($list as $item) : ?>
                    <div class="input-list">
                        <span><?php echo $item->title; ?></span>
                        <input type="hidden" name="list[]" value="<?php echo $item->title; ?>"/>
                        <a href="#" title="Delete element" class="icon-remove delete-element"> </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a title="Add element" href="#" class="icon-plus add-element"></a>
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
