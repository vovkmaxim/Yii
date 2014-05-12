<div class="span4">
  <h2>Изменение документа</h2>
  <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'documents-form',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
  )); ?>
 
  <?php if($form->error($model, 'title')): ?>
  <div class="alert alert-success">
    <?php echo $form->error($model, 'title'); ?>    
  </div>
  <?php endif; ?>
  
  <?php if($form->error($model, 'file')): ?>
  <div class="alert alert-success">
    <?php echo $form->error($model, 'file'); ?>
  </div>
  <?php endif; ?>
 
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
  
  <div class="control-group">
    Формат PDF
  </div>

  <div class="control-group">
    Файл - <a href="/documents/<?php echo $model->file; ?>" target="_blank"><?php echo $model->file; ?></a>
  </div>
  
  <div class="control-group">    
    <?php echo $form->fileField($model, 'file'); ?>
  </div>
  
  <div class="controls">
    <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-save')); ?>
  </div>
 
  <?php $this->endWidget(); ?>
</div>
