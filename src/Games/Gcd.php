<?php
namespace BrainGames\Games\Gcd;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;

function init()
{
    $title = 'Find the greatest common divisor of given numbers.';

    $get_question = function () {
        $number1 = rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = rand(MIN_NUMBER, MAX_NUMBER);
        return "$number1 $number2";
    };

    $get_answer = function ($question) {
        [$number1, $number2] = explode(' ', $question);
        
        while ($number1 !== $number2) {
            if ($number1 > $number2) {
                $number1 = $number1 - $number2;
            } elseif ($number2 > $number1) {
                $number2 = $number2 - $number1;
            }
        }
        return strval($number1);
    };

    \BrainGames\Game\start($title, $get_question, $get_answer);
}
