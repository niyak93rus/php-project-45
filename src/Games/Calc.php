<?php

declare(strict_types=1);

namespace App\Games\Calc;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

function playCalc(): void
{
    $rule = 'What is the result of the expression?';
    $questions = [];
    $correctAnswers = [];
    $operations = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();
        
        $currentOperation = $operations[array_rand($operations)];
        $questions[] = "{$num1} {$currentOperation} {$num2}";
    
        switch ($currentOperation) {
            case '+':
                $correctAnswers[] = (string) ($num1 + $num2);
                break;
            case '-':
                $correctAnswers[] = (string) ($num1 - $num2);
                break;
            case '*':
                $correctAnswers[] = (string) ($num1 * $num2);
                break;
        }
    }    
    
    playGame($rule, $questions, $correctAnswers);
}
