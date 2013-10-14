<?php if (isset($success)) : ?>
    <div class="alert alert-success">
        Вы успешно загрузили профиль компании.
    </div>
<?php else : ?>
    <div class="span4">
        <h2>Загрузка профиля компании</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($error)) : ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <label>Загрузить профиль (в pdf-формате)</label>
                <div class="controls">
                    <input type="file" name="profile" />
                </div>
            </div>
            <div class="controls">
                <input type="submit" class="btn btn-save" value="Загрузить" />
            </div>

        </form>
    </div>
<?php endif; ?>