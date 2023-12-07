<?php

declare(strict_types=1);

namespace App\Games\Calc;

use function App\Engine\playGame;

use const App\Engine\ROUNDS;

function playCalc(): void
{
    $rule = 'What is the result of the expression?';
    $questions = [];
    $correctAnswers = [];
    $operations = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        
        $currentOperation = $operations[array_rand($operations)];
        $questions[] = "{$num1} {$currentOperation} {$num2}";
    
        switch ($currentOperation) {
            case '+':
                $correctAnswers[] = $num1 + $num2;
                break;
            case '-':
                $correctAnswers[] = $num1 - $num2;
                break;
            case '*':
                $correctAnswers[] = $num1 * $num2;
                break;
        }
    }    
    
    playGame($rule, $questions, $correctAnswers);
}
