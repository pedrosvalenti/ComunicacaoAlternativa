<?php
// src/controllers/BoardController.php - stub
class BoardController {
    public function getDemo(){
        $json = file_get_contents(__DIR__.'/../../mocks/board_sample.json');
        return json_decode($json, true);
    }
}
