<?php
/* @var $this ReviewsController */

$this->breadcrumbs=array(
	'Reviews'=>array('/reviews'),
	'Rezsearchtag',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<?php 
    foreach( $reviews as $review){
        ?>
        <table >
            <tr>
                <?php echo "<a href='http://yii.com/index.php?r=reviews/one&id=" . $review['id'] . "'> Read more...</a> "; ?>
            </tr>
            <tr>
                <td>RUBRIC_ID</td>
                <td><?php  echo $review['rubric_id']; ?></td>
            </tr>
            <tr>
                <td>TITLE</td>
                <td><?php echo $review['title']; ?></td>
            </tr>
            <tr>
                <td>DESCRIPTION</td>
                <td><?php echo $review['description'] ; ?></td>
            </tr>
            <tr>
                <td>AUTHOR</td>
                <td><?php echo $review['author'] ; ?></td>
            </tr>
        </table>
        <?php 
            echo "<a href='http://yii.com/index.php?r=reviews/delete&id=" . $review['id'] . "'> delete</a><br> "; 
            echo "<a href='http://yii.com/index.php?r=reviews/change&id=" . $review['id'] . "'> Change</a><br> "; 
        ?>
        ________________________________________________________________________<br>

        <?php 
    }
?>