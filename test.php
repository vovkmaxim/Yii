<?php
 $db = new PDO('mysql:host=chdev.com.ua;dbname=chisw', 'chisw', 't%f{.PdrUFn\rud');
 $res = $db->query('SELECT tech_id, project_id FROM tech_project');
 $res = $db->query('SELECT * FROM projects');
 foreach ($res as $row) {
  $res = $db->query("UPDATE projects SET url = " . str2url($row['title']) . " WHERE id = " . $row['id']);
  var_dump($res);
  echo "Updated record with id " . $row['id'] . ' (url = ' . str2url($row['title']) . ') <br>'; 
}


function translit($text) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',    'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($text, $converter);
    }

function str2url($text) {
        $text = translit($text);

        // в нижний регистр
        $text = strtolower($text);
        // пробел на тире
        $converter = array( '   ' => '-',   '  ' => '-',  ' ' => '-',);
        $text = strtr($text,$converter);
        // удаляем все лишнее
        $text = preg_replace('/[^a-z0-9_-]/u', '', $text);
        // удаляем начальные и конечные '-' и пробел
        $text = trim(trim($text), "-");
        return $text;
    }

