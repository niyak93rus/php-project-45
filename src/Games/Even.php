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

function playEven()
{
    function isEven(int $num)
    {
        return $num % 2 === 0 ? true : false;
    }

    $name = sayHello();
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';
    explainRules($rule);

    $correctAnswersCount = 0;

    while ($correctAnswersCount < ROUNDS) {
        $number = rand(0, 100);
        askQuestion($number);

        $currentAnswer = getAnswer();
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if (checkAnswer($currentAnswer, $correctAnswer, $name)) {
            $correctAnswersCount++;
        } else {
            return;
        }
    }

    congratulate($name);
}
