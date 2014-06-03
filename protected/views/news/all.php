<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News'=>array('/news'),
	'All',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php 
    foreach( $news as $new){
        ?>
        <table >
            <tr>
                <?php echo "<a href='http://yii.com/index.php?r=news/one&id=" . $new['id'] . "'> Read more...</a> "; ?>
            </tr>
            <tr>
                <td>RUBRIC_ID</td>
                <td><?php  echo $new['rubric_id']; ?></td>
            </tr>
            <tr>
                <td>TITLE</td>
                <td><?php echo $new['title']; ?></td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td><?php echo $new['description']; ?></td>
            </tr>
            <tr>
                <td>AUTHOR</td>
                <td><?php echo $new['author']; ?></td>
            </tr>
        </table>
        <?php 
            echo "<a href='http://yii.com/index.php?r=news/delete&id=" . $new['id'] . "'> delete</a><br> "; 
            echo "<a href='http://yii.com/index.php?r=news/change&id=" . $new['id'] . "'> Change</a><br> "; 
        ?>
        ________________________________________________________________________<br>

        <?php 
    }
?>