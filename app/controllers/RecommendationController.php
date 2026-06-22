<?php

require_once __DIR__.'/../../core/Controller.php';
require_once '../app/models/Exercise.php';
require_once '../core/Auth.php';

class RecommendationController extends Controller{
     public function __construct(){
        Auth::checkRole(['admin', 'trainer']);
    }
    public function index(){
        $this->view('recommendations/index');
    }

    public function generate(){    
        $objective = $_POST['objective'];
        $days = (int)$_POST['days'];
        $suggestions = [];
        if($objective == 'Hipertrofia'){
            switch($days){
                case 3:
                    $suggestions = [
                        'A - Peito e Tríceps',
                        'B - Costas e Bíceps',
                        'C - Pernas'
                    ];
                break;

                case 4:
                    $suggestions = [
                        'A - Peito e Tríceps',
                        'B - Costas e Bíceps',
                        'C - Pernas',
                        'D - Ombros'
                    ];
                break;

                case 5:
                    $suggestions = [
                        'A - Peito e Tríceps',
                        'B - Costas e Bíceps',
                        'C - Pernas',
                        'D - Ombros',
                        'E - Abdômen'
                    ];
                break;
            }
        }
        $this->view(
            'recommendations/result',[
                'suggestions'=>$suggestions
            ]
        );
    }
}