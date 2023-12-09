<?php

declare(strict_types=1);

namespace App\Games\Even;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

function isEven(int $num): bool
{
    return $num % 2 === 0 ? true : false;
}

function playEven(): void
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';

    $numbers = [];
    for ($i = 0; $i < ROUNDS; $i++) {
        $numbers[] = (string) getRandomNumber();
    }

    $correctAnswers = [];
    for ($i = 0; $i < count($numbers); $i++) {
        $correctAnswers[] = isEven((int) $numbers[$i]) ? 'yes' : 'no';
    }

    playGame($rule, $numbers, $correctAnswers);
}
