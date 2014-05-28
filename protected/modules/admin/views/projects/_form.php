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
        Technology
        <div class="controls">
            <?php echo $form->dropDownList($tech,'title', Tech::titleList()); ?>
        </div>
    </div>

    <div class="control-group">
        Tags - <a href="#" onclick="openTagsList();" id="clickTag">открыть</a>
        <div class="controls">
            <input type="text" value="" name="Projects[tags]" class="input-xxlarge" id="Projects_tags" />
        </div>
    </div>

    <div class="control-group" id="tagsList">
        <?php
        foreach($tagsList as $item){
            echo '<a href="#" class="itemTag">'. $item->title .'</a>, ';
        }
        ?>
    </div>

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
