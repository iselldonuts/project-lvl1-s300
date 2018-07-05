<?php
namespace BrainGames\Games\Even;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;

function init()
{
    $title = 'Answer "yes" if number even otherwise answer "no".';

    $get_question = function () {
        return (string) rand(MIN_NUMBER, MAX_NUMBER);
    };

    $get_answer = function ($question) {
        $number = (int) $question;
        return $number % 2 === 0 ? 'yes' : 'no';
    };

    \BrainGames\Game\start($title, $get_question, $get_answer);
}
