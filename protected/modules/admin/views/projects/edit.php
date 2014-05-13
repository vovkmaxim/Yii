<div class="span4">
    <h2>Изменение проекта</h2>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>

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
      Технология
      <div class="controls">
        <?php echo $form->dropDownList($tech,'title', Tech::titleList(), array('options' => array($techId =>array('selected'=>true)))); ?>
      </div>
    </div>

    <div class="control-group">
        Теги - <a href="#" onclick="openTagsList();" id="clickTag">открыть</a>
        <div class="controls">
            <?php echo $form->textField($model,'tags', array('class' => 'input-xxlarge')); ?>
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
        <?php echo $form->label($model,'Название*', array('for' => 'Documents_title')); ?>
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

    <div class="controls">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-save')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
