<?php

declare(strict_types=1);

namespace App\Games\Gcd;

use function App\Engine\playGame;
use function App\Random\getRandomNumber;

use const App\Engine\ROUNDS_COUNT;

function findGcd(int $a, int $b): int
{
    if ($b === 0) {
        return $a;
    }

    return findGcd($b, $a % $b);
}

function playGcd(): void
{
    $rule = 'Find the greatest common divisor of given numbers.';

    $gameData = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();

        $question = "{$num1} {$num2}";
        $correctAnswer = (string) findGcd($num1, $num2);
        $currentRoundData = [$question, $correctAnswer];
        $gameData[] = $currentRoundData;
    }

    playGame($rule, $gameData);
}
