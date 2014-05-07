<div class="span9" id="content">
    <div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Документы</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-striped table-bordered table-condensed documents" id="example">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th style="text-align: right;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($docList as $item) : ?>
                            <tr id="id-<?php echo $item->id; ?>">
                                <td><?php echo $item->title; ?></td>
                                <td>
                                    <div style="float:right;">
                                        <a title="Редактировать" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/documents/edit/id/<?php echo $item->id;?>" class="icon-edit"></a>
                                        <a title="Удалить" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/documents/delete/id/<?php echo $item->id;?>" class="icon-remove"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn" href="/admin/documents/add">Добавить</a>
            </div>
        </div>
    </div>
</div>
