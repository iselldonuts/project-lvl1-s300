<?php
namespace BrainGames\Games\Prime;

use function \BrainGames\Game\start;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const DESCRIPTION = 'Answer "yes" if number prime otherwise answer "no".';

function init()
{
    $get_current_question_data = function () {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        $answer = is_prime($number) ? 'yes' : 'no';

        return [
            'question' => strval($number),
            'answer' => $answer
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function is_prime($number)
{
    $length = sqrt($number);
    for ($i = 2; $i <= $length; $i += 1) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return $number > 1;
}
