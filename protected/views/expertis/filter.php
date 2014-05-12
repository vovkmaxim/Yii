<?php

foreach($projects as $item) {
	echo '<h4>'.$item['title'].'</h4>';
	echo '<br />';
	echo $item['description'];
	echo '<br />';
	echo '<strong>'.$item['skills'].'</strong>';
	echo '<hr />';
}
