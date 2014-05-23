<div class="span9" id="content">
    <div class="row-fluid">
        <div class="block">
        <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Технологии</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-striped table-bordered table-condensed tech" id="example">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th style="text-align: right;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($techList as $tech) : ?>
                            <tr id="id-<?php echo $tech->id; ?>">
                                <td><?php echo $tech->title; ?></td>
                                <td>
                                    <div style="float:right;">
                                        <a title="Редактировать" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/tech/edit/id/<?php echo $tech->id;?>" class="icon-pencil"></a>
                                        <a title="Удалить" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/tech/delete/id/<?php echo $tech->id;?>" class="icon-trash"></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn" href="/admin/tech/add">Добавить</a>
            </div>
        </div>
    </div>
</div>