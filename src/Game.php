<?php
namespace BrainGames\Game;

use function \cli\line;
use function \cli\prompt;

const VICTORY_SCORE = 3;

function start($title, $get_question, $get_answer)
{
    line();
    line("Welcome to Brain Games!");
    line($title);
    line();

    $name = prompt("May I have your name?", '', ' ');
    line("Hello, %s", $name);
    line();

    $score = 0;
    while ($score < VICTORY_SCORE) {
        $question = $get_question();
        $right_answer = $get_answer($question);

        line('Question: %s', $question);
        $user_answer = prompt("Your answer");

        if ($user_answer === $right_answer) {
            line('Correct!');
            $score += 1;
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $user_answer,
                $right_answer
            );
            return;
        }
    }

    line("Congratulations, %s", $name);
}
