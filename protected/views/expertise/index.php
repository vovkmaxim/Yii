<?php

foreach($model as $item){
	echo '<a href="expertise/projects/tech/'. $item->title .'">'. $item->title .'</a>';
	echo '<br />';
}
