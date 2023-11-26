<?php

namespace Php\Games\Prime;

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

function isPrime($num)
{
    if ($num == 1) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}

function playPrime()
{
    $name = sayHello();
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    explainRules($rule);

    $correctAnswersCount = 0;

    while ($correctAnswersCount < ROUNDS) {
        $number = rand(0, 100);
        askQuestion($number);

        $currentAnswer = getAnswer();
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        if (checkAnswer($currentAnswer, $correctAnswer, $name)) {
            $correctAnswersCount++;
        } else {
            return;
        }
    }

    congratulate($name);
}
