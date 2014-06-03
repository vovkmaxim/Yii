<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews'=>array('/reviews'),
	'One',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<table>
    <tr>
        <td>Reviews id</td>
        <td><?php echo $reviews->id;  ?></td>
    </tr>
    <tr>
        <td>Rubric id</td>
        <td><?php echo $reviews->rubric_id;  ?></td>
    </tr>
    <tr>
        <td> Title reviews </td>
        <td><?php echo $reviews->title;  ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo $reviews->description;  ?></td>
    </tr>
    <tr>
        <td> Author </td>
        <td><?php echo $reviews->author;  ?></td>
    </tr>
</table>

