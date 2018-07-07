<?php
namespace BrainGames\Games\Even;

use function \BrainGames\Game\start;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function init()
{
    $get_current_question_data = function () {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $answer = is_even($number) ? 'yes' : 'no';

        return [
            'question' => strval($number),
            'answer' => $answer
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function is_even($number)
{
    return $number % 2 === 0;
}
