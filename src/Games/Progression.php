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
        $seq = progression($start, $step, PROGRESSION_LENGTH);

        $index_to_mark = array_rand($seq);
        $marked_seq = $seq;
        $marked_seq[$index_to_mark] = '..';

        return [
            'question' => implode(' ', $marked_seq),
            'answer' => strval($seq[$index_to_mark])
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function progression($start, $step, $len)
{
    $seq = [];
    for ($i = 0; $i < $len; $i += 1) {
        $seq[] = $start + $i * $step;
    }
    return $seq;
}
