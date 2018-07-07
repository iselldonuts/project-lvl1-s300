<?php
namespace BrainGames\Games\Calc;

use function \BrainGames\Game\start;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const OPERATORS = ['*', '+', '-'];
const DESCRIPTION = 'What is the result of the expression?';

function init()
{
    $get_current_question_data =  function () {
        $number1 = rand(MIN_NUMBER, MAX_NUMBER);
        $number2 = rand(MIN_NUMBER, MAX_NUMBER);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $answer = 0;
        switch ($operator) {
            case '*':
                $answer = $number1 * $number2;
                break;
            case '+':
                $answer = $number1 + $number2;
                break;
            case '-':
                $answer = $number1 - $number2;
                break;
        }

        return [
            'question' => "$number1 $operator $number2",
            'answer' => strval($answer)
        ];
    };

    start(DESCRIPTION, $get_current_question_data);
}
