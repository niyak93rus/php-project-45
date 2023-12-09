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

    $questions = [];
    $correctAnswers = [];

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();

        $questions[] = "{$num1} {$num2}";
        $correctAnswers[] = (string) findGcd($num1, $num2);
    }

    playGame($rule, $questions, $correctAnswers);
}
