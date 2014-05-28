<div class="span4">
    <h2>Update Project</h2>
    <?php $this->renderPartial('_form', array(
        'model' => $model,
        'tech' => $tech,
        'tagsList' => $tagsList
    )); ?>