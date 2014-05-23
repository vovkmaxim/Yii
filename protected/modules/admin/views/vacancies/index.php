<div class="span9" id="content">
    <div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Вакансии</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-striped table-bordered table-condensed jobs" id="example">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th style="text-align: right;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model as $job) : ?>
                            <tr id="id-<?php echo $job->id; ?>">
                                <td><?php echo $job->title; ?></td>
                                <td>
                                    <div style="float:right;">
                                        <a title="Редактировать" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/vacancies/edit/id/<?php echo $job->id;?>" class="icon-pencil"></a>
                                        <a title="Удалить" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/vacancies/delete/id/<?php echo $job->id;?>" class="icon-trash"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn" href="<?php echo Yii::app()->getBaseUrl(true)?>/admin/vacancies/add">Добавить</a>
            </div>
        </div>
    </div>
</div>