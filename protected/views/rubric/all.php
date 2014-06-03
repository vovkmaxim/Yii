<?php
/* @var $this RubricController */

$this->breadcrumbs=array(
	'Rubric'=>array('/rubric'),
	'All',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php 
    foreach( $rubric as $rubrics){
        ?>
        <table >
            <tr>
                <td>TITLE</td>
                <td><?php echo $rubrics->name; ?></td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td><?php echo $rubrics->description ; ?></td>
            </tr>
        </table>
        <?php 
            echo "<a href='http://yii.com/index.php?r=rubric/delete&id=" . $rubrics->id . "'> delete</a><br> "; 
            echo "<a href='http://yii.com/index.php?r=rubric/change&id=" . $rubrics->id . "'> Change</a><br> "; 
        ?>
        ________________________________________________________________________<br>

        <?php 
    }
?>