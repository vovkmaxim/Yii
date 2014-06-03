<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News'=>array('/news'),
	'One',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<table>
    <tr>
        <td>News id</td>
        <td><?php echo $news->id;  ?></td>
    </tr>
    <tr>
        <td>Rubric id</td>
        <td><?php echo $news->rubric_id;  ?></td>
    </tr>
    <tr>
        <td> Title News </td>
        <td><?php echo $news->title;  ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo $news->description;  ?></td>
    </tr>
    <tr>
        <td> Author </td>
        <td><?php echo $news->author;  ?></td>
    </tr>
</table>

