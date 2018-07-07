<?php
namespace BrainGames\Games\Balance;

use function \BrainGames\Game\start;

const MIN_NUMBER = 100;
const MAX_NUMBER = 9999;
const DESCRIPTION = 'Balance the given number.';

function init()
{
    $get_current_question_data = function () {
        $number = rand(MIN_NUMBER, MAX_NUMBER);

        return [
            'question' => strval($number),
            'answer' => strval(balance($number))
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function balance($number)
{
    $numbers = str_split(strval($number));
    $length = sizeof($numbers);
    $sum = array_sum($numbers);
    $base = intval($sum / $length);
    $remainder = $sum % $length;

    $result = [];
    for ($i = 0; $i < $length; $i += 1, $remainder -= 1) {
        $result[] = ($remainder > 0) ? $base + 1 : $base;
    }
    return implode('', array_reverse($result));
}
