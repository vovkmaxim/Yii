<div class="span9" id="content">
    <div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Статические страницы</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-striped table-bordered table-condensed jobs" id="example">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Текст</th>
                            <th>Другое</th>
                            <th style="text-align: right;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($staticpagesList as $staticpage) : ?>
    <tr id="id-<?php echo $staticpage->id; ?>">
        <td><?php echo $staticpage->title; ?></td>
        <td><?php echo $staticpage->text; ?></td>
        <td><?php echo $staticpage->etc; ?></td>
        <td>
            <div style="float:right;">
                <a title="Редактировать" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/staticpages/edit/id/<?php echo $staticpage->id;?>" class="icon-edit"></a>
                <a title="Удалить" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/staticpages/delete/id/<?php echo $staticpage->id;?>" class="icon-remove"></a>
            </div>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/staticpages/add">Добавить</a>
</div>
</div>
</div>
</div>