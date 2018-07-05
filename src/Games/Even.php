<?php
namespace BrainGames\Games\Even;

use function \cli\line;
use function \cli\prompt;

const VICTORY_SCORE = 3;
const MIN_NUMBER = 0;
const MAX_NUMBER = 100;

function run()
{
    line("Welcome to Brain Games!");
    line('Answer "yes" if number even otherwise answer "no".');
    line();

    $name = prompt("May I have your name?", '', ' ');
    line();

    
    $score = 0;

    while ($score < VICTORY_SCORE) {
        $guess_number = rand(MIN_NUMBER, MAX_NUMBER);
        $right_answer = $guess_number % 2 === 0 ? 'yes' : 'no';

        line('Question: %d', $guess_number);
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
