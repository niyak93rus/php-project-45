<?php

declare(strict_types=1);

namespace App\Games\Progression;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

const MIN_LENGTH = 5;
const MAX_LENGTH = 10;
const MIN_STEP = 1;

function createGameData(): array
{
    $length = rand(MIN_LENGTH, MAX_LENGTH);
    $step = rand(MIN_STEP, MAX_LENGTH);
    $start = getRandomNumber();
    $end = $start + $step * $length;
    $numbers = range($start, $end, $step);
    $missingItemKey = array_rand($numbers);
    $correctAnswer = (string) $numbers[$missingItemKey];
    $numbers[$missingItemKey] = '..';
    $question = implode(' ', $numbers);
    return [$question, $correctAnswer];
}

function playProgression(): void
{
    $rule = 'What number is missing in the progression?';
    $gameData = [];

    for ($i = 0; $i < ROUNDS; $i++) {      
        $gameData[] = createGameData();
    }

    playGame($rule, $gameData);
}
