<?php
// api/boards.php - returns demo board JSON
header('Content-Type: application/json; charset=utf-8');
$board = file_get_contents(__DIR__.'/../mocks/board_sample.json');
echo $board;
