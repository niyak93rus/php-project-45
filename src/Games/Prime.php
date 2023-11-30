<?php

declare(strict_types=1);

namespace App\Games\Prime;

use function App\Engine\sayHello;
use function App\Engine\askQuestion;
use function App\Engine\explainRules;
use function App\Engine\getAnswer;
use function App\Engine\checkAnswer;
use function App\Engine\congratulate;
use function App\Engine\getRandomInt;

use const App\Engine\ROUNDS;

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function playPrime(): void
{
    $name = sayHello();
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    explainRules($rule);

    for ($i = 0; $i < ROUNDS; $i++) {
        $number = getRandomInt();
        askQuestion((string) $number);

        $currentAnswer = getAnswer();
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        if (checkAnswer($currentAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
