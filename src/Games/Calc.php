<?php

declare(strict_types=1);

namespace App\Games\Calc;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

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

        switch ($currentOperation) {
            case '+':
                $correctAnswer = (string) ($num1 + $num2);
                break;
            case '-':
                $correctAnswer = (string) ($num1 - $num2);
                break;
            case '*':
                $correctAnswer = (string) ($num1 * $num2);
                break;
            default:
                throw new Exception('Unknown operation');
        }

        $currentRoundData = [$question, $correctAnswer];
        $gameData[] = $currentRoundData;
    }

    playGame($rule, $gameData);
}
