<?php

declare(strict_types=1);

namespace App\Games\Even;

use function App\Engine\sayHello;
use function App\Engine\askQuestion;
use function App\Engine\explainRules;
use function App\Engine\getAnswer;
use function App\Engine\checkAnswer;
use function App\Engine\congratulate;
use function App\Engine\getRandomInt;
use function App\Engine\playGame;

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
        $numbers[] = rand(0, 100);
    }
    
    $correctAnswers = [];
    for ($i = 0; $i < count($numbers); $i++) {
        $correctAnswers[] = isEven($numbers[$i]) ? 'yes' : 'no';
    }

    playGame($rule, $numbers, $correctAnswers);
}
