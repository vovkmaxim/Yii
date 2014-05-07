<?php if (isset($result)) : ?>
    <div class="alert alert-success">
        <?php echo $result; ?>
    </div>
<?php else : ?>
    <div class="span4">
        <h2>Редактирование страницы</h2>
        <form action="" method="post">
            <?php if (isset($error)) : ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <label>Название</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" name="title" value="<?php echo $title; ?>" />
                </div>
            </div>
            <div class="control-group">
                <label>Ссылка</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" name="activelink" value="<?php echo $activelink; ?>"/>
                </div>
            </div>
            <div class="control-group">
                <label>Текст</label>
                <div class="controls">
                    <?php $this->widget('application.extensions.ckeditor.CKEditor', array(
                        'model'=>$model = new Staticpages(),
                        'attribute'=>'text',
                        'language'=>'ru',
                        'editorTemplate'=>'full', ));
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label>Другое</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" name="etc" value="<?php echo $etc; ?>"/>
                </div>
            </div>
            <div class="controls">
                <input type="submit" class="btn btn-save" value="Сохранить" />
            </div>

        </form>
    </div>
<?php endif; ?>