<?php
namespace BrainGames\Games\Gcd;

use function \BrainGames\Game\start;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function init()
{
    $get_current_question_data =  function () {
        $number1 = rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = rand(MIN_NUMBER, MAX_NUMBER);

        return [
            'question' => "$number1 $number2",
            'answer' => strval(gcd($number1, $number2))
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function gcd($num1, $num2)
{
    return ($num1 % $num2) ? gcd($num2, $num1 % $num2) : $num2;
}
