<?php

declare(strict_types=1);

namespace App\Games\Calc;

use function App\Engine\sayHello;
use function App\Engine\getRandomInt;
use function App\Engine\askQuestion;
use function App\Engine\explainRules;
use function App\Engine\getAnswer;
use function App\Engine\checkAnswer;
use function App\Engine\congratulate;

use const App\Engine\ROUNDS;

function playCalc(): void
{
    $name = sayHello();
    $question = 'What is the result of the expression?';
    explainRules($question);

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = getRandomInt();
        $num2 = getRandomInt();

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
