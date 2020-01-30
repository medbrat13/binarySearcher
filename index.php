<?php

require_once 'BinarySearcher.php';

# параметры для поиска
$file_path = 'file.txt';
$seachKey = 'ключ1';

$searcher = new BinarySearcher();
print $searcher->searchInFile($file_path, $seachKey);