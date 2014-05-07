<?php if (isset($result)) : ?>
    <div class="alert alert-success">
        <?php echo $result; ?>
    </div>
<?php else : ?>
<div class="span4">
<h2>Добавление технологии</h2>
<form action="" method="post">
    <?php if (isset($error)) : ?>
        <div class="alert alert-error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <div class="control-group">
        <label>Название</label>
        <div class="controls">
            <input type="text" class="input-xxlarge" name="title" />
        </div>
    </div>
    <div class="control-group">
        <label>Описание</label>
        <div class="controls">
            <textarea class="input-xxlarge" cols="40" rows="20" name="description"><?php echo $description; ?></textarea>
        </div>
    </div>
    <div class="control-group list">
        <label> Элементы списка: </label>
        <div class="elements">
            <?php if (isset($list)) : ?>
                <?php foreach ($list as $element) : ?>
                    <?php if (trim($element) != '') : ?>
                    <div class="input-list">
                        <span><?php echo $element; ?></span>
                        <input type="hidden" name="list[]" value="<?php echo $element; ?>"/>
                        <a href="#" title="Удалить элемент" class="icon-remove delete-element"> </a>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a title="Добавить элемент" href="#" class="icon-plus add-element"></a>
    </div>
    <div class="controls">
        <input type="submit" class="btn btn-save" value="Добавить" />
    </div>
 </form>
</div>
<?php endif; ?>
