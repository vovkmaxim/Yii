<div class="span9" id="content">
    <div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Проекты</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-striped table-bordered table-condensed data" id="example">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Технология</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($projectsList as $project) : ?>
                            <tr>
                                <td><?php echo $project->title; ?></td>
                                <td><?php echo $project->tech->title; ?></td>
                                <td>
                                    <div style="float:right;">
                                        <a title="Редактировать" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/projects/edit?id=<?php echo $project->id;?>" class="icon-edit"></a>
                                        <a title="Удалить" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/projects/delete?id=<?php echo $project->id;?>" class="icon-remove"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn" href="/admin/projects/add">Добавить</a>
            </div>
        </div>
    </div>
</div>