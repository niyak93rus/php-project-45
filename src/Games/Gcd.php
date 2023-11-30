<?php

declare(strict_types=1);

namespace App\Games\Gcd;

use function App\Engine\sayHello;
use function App\Engine\askQuestion;
use function App\Engine\explainRules;
use function App\Engine\getAnswer;
use function App\Engine\checkAnswer;
use function App\Engine\congratulate;
use function App\Engine\getRandomInt;

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
    $name = sayHello();
    $rule = 'Find the greatest common divisor of given numbers.';
    explainRules($rule);

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = getRandomInt();
        $num2 = getRandomInt();

        askQuestion("{$num1} {$num2}");
        $correctAnswer = findGcd($num1, $num2);
        $currentAnswer = getAnswer();

        if (checkAnswer($currentAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
