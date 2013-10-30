<?php if (isset($result)) : ?>
    <div class="alert alert-success">
        <?php echo $result; ?>
    </div>
<?php else : ?>
    <div class="span4">
        <h2>Редактирование вакансии</h2>
        <form action="" method="post">
            <?php if (isset($error)) : ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <label>Название*</label>
                <div class="controls">
                    <input type="text" class="input-xxlarge" name="title" value="<?php echo $title; ?>" />
                </div>
            </div>
            <div class="control-group">
                <label>Описание</label>
                <div class="controls">
                    <textarea class="input-xxlarge content-block" cols="40" rows="20" name="description"><?php echo $description; ?></textarea>
                </div>
            </div>
            <div class="controls">
                <input type="submit" class="btn btn-save" value="Сохранить" />
            </div>

        </form>
    </div>
<?php endif; ?>