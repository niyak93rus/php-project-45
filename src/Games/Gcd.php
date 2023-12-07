<?php

declare(strict_types=1);

namespace App\Games\Gcd;

use function App\Engine\playGame;

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
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);

        $questions[] = "{$num1} {$num2}";
        $correctAnswers[] = findGcd($num1, $num2);
    }

    playGame($rule, $questions, $correctAnswers);
}
