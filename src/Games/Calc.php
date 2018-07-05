<?php
namespace BrainGames\Games\Calc;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const OPERATORS = ['*', '+', '-'];

function init()
{
    $title = 'What is the result of the expression?';

    $get_question = function () {
        $number1 = rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];
        return "$number1 $operator $number2";
    };

    $get_answer = function ($question) {
        [$number1, $operator, $number2] = explode(' ', $question);
        switch ($operator) {
            case '*':
                return strval($number1 * $number2);
            case '+':
                return strval($number1 + $number2);
            case '-':
                return strval($number1 - $number2);
        }
    };

    \BrainGames\Game\start($title, $get_question, $get_answer);
}
