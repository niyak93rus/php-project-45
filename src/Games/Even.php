<?php

declare(strict_types=1);

namespace App\Games\Even;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function playEven(): void
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';

    $gameData = [];

    for ($i = 0; $i < ROUNDS; $i++) {
        $currentRoundData = [];
        $number = (string) getRandomNumber();
        $correctAnswer = isEven((int) $number) ? 'yes' : 'no';
        $currentRoundData = [$number, $correctAnswer];
        $gameData[] = $currentRoundData;
    }


    playGame($rule, $gameData);
}
