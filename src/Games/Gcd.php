<?php

namespace App\Games\Gcd;

require_once __DIR__ . '/../Engine.php';

use const App\Engine\ROUNDS;
use function App\Engine\sayHello;
use function App\Engine\askQuestion;
use function App\Engine\explainRules;
use function App\Engine\getAnswer;
use function App\Engine\checkAnswer;
use function App\Engine\congratulate;

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
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);

        askQuestion("{$num1} {$num2}");
        $correctAnswer = findGcd($num1, $num2);
        $currentAnswer = getAnswer();

        if (checkAnswer($currentAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
