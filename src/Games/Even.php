<?php

namespace Php\Games\Even;

require_once __DIR__ . '/../Engine.php';

use const Engine\ROUNDS;
use function Engine\sayHello;
use function Engine\askQuestion;
use function Engine\explainRules;
use function Engine\getAnswer;
use function Engine\checkAnswer;
use function Engine\congratulate;

function isEven(int $num): bool
{
    return $num % 2 === 0 ? true : false;
}

function playEven(): void
{
    $name = sayHello();
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';
    explainRules($rule);

    for ($i = 0; $i < ROUNDS; $i++) {
        $number = rand(0, 100);
        askQuestion((string) $number);

        $currentAnswer = getAnswer();
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if (checkAnswer($currentAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
