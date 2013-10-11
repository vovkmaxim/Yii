<?php if (isset($result)) : ?>
    <div class="alert alert-success">
        <?php echo $result; ?>
    </div>
<?php else : ?>
    <div class="span4">
        <form action="" method="post">
            <?php if (isset($error)) : ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <label>Название</label>
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
            <div class="control-group list">
                <label> Элементы списка: </label>
                <div class="elements">
                    <?php if (isset($techList)) : ?>
                        <?php foreach ($techList as $element) : ?>
                                <?php if (trim($element) == '') continue; ?>
                                <div class="input-list">
                                    <input type="text" name="list[]" value="<?php echo $element; ?>"/>
                                    <a href="#" title="Удалить элемент" class="icon-remove delete-element"> </a>
                                </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <a title="Добавить элемент" href="#" class="icon-plus add-element"></a>
            </div>
            <div class="controls">
                <input type="submit" class="btn btn-save" value="Сохранить" />
            </div>

        </form>
    </div>
<?php endif; ?>
<script type="text/javascript">
    $(function() {
        $('body').on('click', '.add-element', function(e) {
            e.preventDefault();
            $('.elements').append('<div class="input-list"><input type="text" name="list[]" /><a href="#" title="Удалить элемент" class="icon-remove delete-element"> </a></div>');
            return false;
        })
        $('body').on('click', '.input-list .delete-element', function(e) {
            e.preventDefault();
            $(this).parent().remove();
            return false;
        })
    })
</script>