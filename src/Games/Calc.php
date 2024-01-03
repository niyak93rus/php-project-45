<?php

declare(strict_types=1);

namespace App\Games\Calc;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

function calculate(int $num1, int $num2, string $currentOperation): string
{
    switch ($currentOperation) {
        case '+':
            return (string) ($num1 + $num2);
        case '-':
            return (string) ($num1 - $num2);
        case '*':
            return (string) ($num1 * $num2);
        default:
            return 'Unknown operation';
    }
}

function playCalc(): void
{
    $rule = 'What is the result of the expression?';
    $gameData = [];
    $operations = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = getRandomNumber();
        $num2 = getRandomNumber();
        $currentOperation = $operations[array_rand($operations)];
        $question = "{$num1} {$currentOperation} {$num2}";
        $correctAnswer = calculate($num1, $num2, $currentOperation);
        $gameData[] = [$question, $correctAnswer];
    }

    playGame($rule, $gameData);
}
