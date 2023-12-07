<?php

declare(strict_types=1);

namespace App\Games\Progression;

use function App\Engine\playGame;

use const App\Engine\ROUNDS;

function playProgression(): void
{
    $rule = 'What number is missing in the progression?';
    $questions = [];
    $correctAnswers = [];

    $minLength = 5;
    $maxLength = 10;
    $minStep = 1;

    for ($i = 0; $i < ROUNDS; $i++) {
        $length = rand($minLength, $maxLength);
        $step = rand($minStep, $maxLength);
        $start = rand(0, 100);
        $end = $start + $step * $length;

        $numbers = range($start, $end, $step);

        $missingItemKey = array_rand($numbers);
        $correctAnswers[] = $numbers[$missingItemKey];
        $numbers[$missingItemKey] = '..';

        $questions[] = implode(' ', $numbers);
    }

    playGame($rule, $questions, $correctAnswers);
}
