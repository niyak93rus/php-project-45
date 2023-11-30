<?php

namespace Php\Games\Calc;

require_once __DIR__ . '/../Engine.php';

use function Engine\sayHello;
use function Engine\askQuestion;
use function Engine\explainRules;
use function Engine\getAnswer;
use function Engine\checkAnswer;
use function Engine\congratulate;

use const Engine\ROUNDS;

function playCalc(): void
{
    $name = sayHello();
    $question = 'What is the result of the expression?';
    explainRules($question);

    for ($i = 0; $i < ROUNDS; $i ++) {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);

        $operations = ['+', '-', '*'];
        $currentOperation = $operations[array_rand($operations)];
        $content = "{$num1} {$currentOperation} {$num2}";
        askQuestion($content);

        switch ($currentOperation) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
        }

        $currentAnswer = getAnswer();
        if (checkAnswer($currentAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
