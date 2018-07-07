<?php
namespace BrainGames\Games\Progression;

use function \BrainGames\Game\start;

const PROGRESSION_LENGTH = 10;
const STEP_MIN = 1;
const STEP_MAX = 10;
const START_MIN = 0;
const START_MAX = 100;
const DESCRIPTION = 'What number is missing in this progression?';

function init()
{
    $get_current_question_data = function () {
        $start = rand(START_MIN, START_MAX);
        $step = rand(STEP_MIN, STEP_MAX);
        $progression = generate_progression($start, $step, PROGRESSION_LENGTH);
        
        $index_to_mark = array_rand($progression);
        $marked_progression = $progression;
        $marked_progression[$index_to_mark] = '..';

        return [
            'question' => implode(' ', $marked_progression),
            'answer' => strval($progression[$index_to_mark])
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function generate_progression($start, $step, $len)
{
    $progression = [];
    for ($i = 0; $i < $len; $i += 1) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}
