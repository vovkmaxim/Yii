<?php

foreach($model as $item){
	echo '<a href="expertis/projects?key='. $item->title .'">'. $item->title .'</a>';
	echo '<br />';
}
