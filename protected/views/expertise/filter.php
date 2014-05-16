<?php

foreach($projects as $item) {
	echo '<h4>'.$item['title'].'</h4>';
	echo '<br />';
	echo $item['description'];
	echo '<br />';
    foreach($tagsList as $tag){
        if($tag['project_id'] == $item['id']){
            echo '<a href="/expertise/projects/tag/'. $tag['title'] .'">'. $tag['title'] .'</a> ';
        }
    }
	echo '<hr />';
}
