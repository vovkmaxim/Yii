<?php if (isset($result)) : ?>
    <div class="alert alert-success">
        <?php echo $result; ?>
    </div>
<?php else : ?>
    <div class="span4">
    <h2>Редактирование проекта</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <?php if (isset($errors['tech'])) : ?>
        <div class="alert alert-error">
            <?php echo $errors['tech']; ?>
        </div>
    <?php endif; ?>
    <div class="control-group">
        <label>Технология*</label>
        <select name="tech">
            <option value="0"></option>
            <?php foreach ($techList as $tech) : ?>
                <option
                    value="<?php echo $tech->id; ?>" <?php echo ($tech->id == $techId) ? 'selected="selected"' : ''; ?>><?php echo $tech->title; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php if (isset($errors['title'])) : ?>
    <div class="alert alert-error">
        <?php echo $errors['title']; ?>
    </div>
<?php endif; ?>
    <div class="control-group">
        <label>Название*</label>

        <div class="controls">
            <input type="text" class="input-xxlarge" name="title" value="<?php echo $title; ?>"/>
        </div>
    </div>
    <div class="control-group">
        <label>Описание</label>

        <div class="controls">
            <textarea class="input-xxlarge" name="description"><?php echo $description; ?></textarea>
        </div>
    </div>
    <div class="control-group">
        <label>Требуемые навыки</label>

        <div class="controls">
            <input type="text" class="input-xxlarge" name="desired_skills" value="<?php echo $desiredSkills; ?>"/>
        </div>
    </div>
        <div class="control-group">
            <label>Загрузка картинок</label>
            <?php if (!empty($pics)) : ?>
                <div class="previews">
                    <?php foreach ($pics as $pic) : ?>
                        <div class="preview"><img src="<?php echo Yii::app()->baseUrl . $pic->url; ?>"/><a
                                id="<?php echo $pic->id; ?>" class="delete delete-pic icon-remove"
                                href="#" title="Удалить"> </a></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($previews)) : ?>
                <div class="previews">
                    <?php foreach ($previews as $preview) : ?>
                        <div class="preview"><img src="<?php echo $preview['url']; ?>"/><a
                                id="<?php echo base64_encode($preview['filename']); ?>" class="delete delete-preview icon-remove"
                                href="#" title="Удалить"> </a></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="pics">
                <div><input type="file" name="img[]"/></div>
            </div>
            <a class="icon-plus add-pic" href="#" title="Добавить"> </a>
        </div>
        <div class="controls">
            <input type="submit" class="btn btn-save" value="Cохранить"/>
        </div>

    </form>
    </div>
<?php endif; ?>