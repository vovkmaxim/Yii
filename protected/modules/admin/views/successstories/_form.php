<?php
    $form=$this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id'=>'successstories-form',
            'enableAjaxValidation'=>true,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
?>

<?php echo $form->label($model,'client*'); ?>
<?php
    $this->widget(
        'application.extensions.ckeditor.CKEditor',
        array(
            'model' => $model,
            'attribute' => 'client',
            'language' => 'en',
            'editorTemplate' => 'full',
            'options'=>array('filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('successstories/browse')),'width'=>'840')

        )
    );
?>

<?php echo $form->label($model,'task*'); ?>
<?php
$this->widget(
    'application.extensions.ckeditor.CKEditor',
    array(
        'model' => $model,
        'attribute' => 'task',
        'language' => 'en',
        'editorTemplate' => 'full',
        'options'=>array('filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('successstories/browse')),'width'=>'840')

    )
);
?>

<?php echo $form->label($model,'solution*'); ?>
<?php
$this->widget(
    'application.extensions.ckeditor.CKEditor',
    array(
        'model' => $model,
        'attribute' => 'solution',
        'language' => 'en',
        'editorTemplate' => 'full',
        'options'=>array('filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('successstories/browse')),'width'=>'840')

    )
);
?>

<?php echo $form->label($model,'result*'); ?>
<?php
$this->widget(
    'application.extensions.ckeditor.CKEditor',
    array(
        'model' => $model,
        'attribute' => 'result',
        'language' => 'en',
        'editorTemplate' => 'full',
        'options'=>array('filebrowserBrowseUrl'=>CHtml::normalizeUrl(array('successstories/browse')),'width'=>'840')

    )
);
?>


<?php //echo $form->ckEditorRow(
//    $model,
//    'client',
//    array(
//        'editorOptions' => array(
//            'fullpage' => 'js:true',
//            'width' => '840',
//            'resize_maxWidth' => '640',
//            'resize_minWidth' => '320'
//        )
//    )
//); ?>
<?php //echo $form->ckEditorRow(
//    $model,
//    'task',
//    array(
//        'editorOptions' => array(
//            'fullpage' => 'js:true',
//            'width' => '840',
//            'resize_maxWidth' => '640',
//            'resize_minWidth' => '320',
//        )
//    )
//); ?>
<!---->
<?php //echo $form->ckEditorRow(
//    $model,
//    'solution',
//    array(
//        'editorOptions' => array(
//            'fullpage' => 'js:true',
//            'width' => '840',
//            'resize_maxWidth' => '640',
//            'resize_minWidth' => '320'
//        )
//    )
//); ?>
<!---->
<?php //echo $form->ckEditorRow(
//    $model,
//    'result',
//    array(
//        'editorOptions' => array(
//            'fullpage' => 'js:true',
//            'width' => '840',
//            'resize_maxWidth' => '640',
//            'resize_minWidth' => '320'
//        )
//    )
//); ?>

<?php
//$this->widget('ImperaviRedactorWidget', array(
//        'model' => $model,
//        'attribute' => 'client',
//        'options' => array(
//            'lang' => 'en',
//            'css' => 'wym.css',
//            'imageUpload'=>$this->createUrl('imgUpload'), // адрес действия на сервере
//            'imageUploadErrorCallback'=>'js:function(obj, json){ alert(json.error); }',
//        ),
//
//    )
//);
//?>



<div class="control-group">

    <?php if(!empty($model->pic)): ?>
    Image:<br>
    <?php echo CHtml::image(DIRECTORY_SEPARATOR.$model->pic,
        "this is alt tag of image",
        array("width"=>"120px" ,"height"=>"120px"));
    ?>
    <?php if(!$model->isNewRecord): ?>
            <?php if ($model->pic != ''): ?>
                <p><?php  echo CHtml::link('Delete image', array("/admin/successstories/deletefile/", 'id'=>$model->id), array('confirm'=>'Are you sure?',)); ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        No Picture uploaded

    <?php endif; ?>

<br>
<p>Upload new image: Formats: JPG, JPEG, GIF, PNG. Recommended size: 120x120</p>
    <?php echo $form->fileField($model,'pic'); ?>
    <?php echo $form->error($model,'pic'); ?>
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
