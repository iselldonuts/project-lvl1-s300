<?php
namespace BrainGames\Game;

use function \cli\line;
use function \cli\prompt;

const VICTORY_SCORE = 3;

function start($description, $get_current_question_data)
{
    line(PHP_EOL . "Welcome to Brain Games!");
    line($description . PHP_EOL);

    $name = prompt("May I have your name?", '', ' ');
    line("Hello, %s" . PHP_EOL, $name);

    for ($i = 0; $i < VICTORY_SCORE; $i += 1) {
        ['question' => $question, 'answer' => $answer] = $get_current_question_data();
        line('Question: %s', $question);
        $user_answer = prompt("Your answer");

        if ($user_answer === $answer) {
            line('Correct!');
        } else {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $user_answer,
                $answer
            );
            return;
        }
    }

    line("Congratulations, %s" . PHP_EOL, $name);
}
