<?php

namespace Php\Games\Gcd;

require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function cli\prompt;

use const Engine\ROUNDS;
use function Engine\sayHello;
use function Engine\askQuestion;
use function Engine\explainRules;
use function Engine\getAnswer;
use function Engine\checkAnswer;
use function Engine\congratulate;

function findGcd($a, $b)
{
    return $b ? gcd($b, $a % $b) : $a;
}

function playGcd()
{
    $name = sayHello();
    $rule = 'Find the greatest common divisor of given numbers.';
    explainRules($rule);

    $correctAnswersCount = 0;

    while ($correctAnswersCount < ROUNDS) {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);

        askQuestion("{$num1} {$num2}");
        $correctAnswer = findGcd($num1, $num2);
        $currentAnswer = getAnswer();

        if (checkAnswer($currentAnswer, $correctAnswer, $name)) {
            $correctAnswersCount++;
        } else {
            return;
        }
    }

    congratulate($name);
}
