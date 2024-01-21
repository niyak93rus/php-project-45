<?php

declare(strict_types=1);

namespace App\Games\Progression;

use function App\Engine\playGame;
use function App\Random\getRandomNumber;

use const App\Engine\ROUNDS_COUNT;

const MIN_LENGTH = 5;
const MAX_LENGTH = 10;
const MIN_STEP = 1;

function createProgression(): array
{
    $length = rand(MIN_LENGTH, MAX_LENGTH);
    $step = rand(MIN_STEP, MAX_LENGTH);
    $start = getRandomNumber();
    $end = $start + $step * $length;
    return range($start, $end, $step);
}

function playProgression(): void
{
    $rule = 'What number is missing in the progression?';
    $gameData = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $numbers = createProgression();
        $missingItemKey = array_rand($numbers);
        $correctAnswer = (string) $numbers[$missingItemKey];
        $numbers[$missingItemKey] = '..';
        $question = implode(' ', $numbers);
        $gameData[] = [$question, $correctAnswer];
    }

    playGame($rule, $gameData);
}
