<?php

declare(strict_types=1);

namespace App\Games\Gcd;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

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

    for ($i = 1; $i <= ROUNDS; $i++) {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();

        $question = "{$num1} {$num2}";
        $correctAnswer = (string) findGcd($num1, $num2);
        $currentRoundData = [$question, $correctAnswer];
        $gameData[] = $currentRoundData;
    }

    playGame($rule, $gameData);
}
