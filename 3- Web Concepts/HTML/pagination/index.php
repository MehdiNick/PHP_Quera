<?php

require __DIR__ . '/pagination.php';

$pagination_template = file_get_contents(__DIR__ . '/pagination.tpl');

echo renderPagination($pagination_template, 7 * 5, 5, 2, 'index.php?page=');

echo renderPagination($pagination_template, 56, 5, 7, 'index.php?page=');


echo renderPagination($pagination_template, 14, 4, 1, 'index.php?page=');

echo renderPagination($pagination_template, 40, 10, 4, 'index.php?page=');

echo renderPagination($pagination_template, 24, 3, 6, 'index.php?page=');

echo renderPagination($pagination_template, 7, 1, 2, 'index.php?page=');
?>