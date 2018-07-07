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
        $balanced_number = balance($number);

        return [
            'question' => strval($number),
            'answer' => strval($balanced_number)
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}

function balance($number)
{
    $numbers = str_split(strval($number));
    $len = sizeof($numbers);
    $sum = array_sum($numbers);
    $base = intval($sum / $len);
    $rem = $sum % $len;

    $result = [];
    for ($i = 0; $i < $len; $i += 1, $rem -= 1) {
        $result[] = ($rem > 0) ? $base + 1 : $base;
    }
    return intval(implode('', array_reverse($result)));
}
