<?php

declare(strict_types=1);

namespace App\Games\Prime;

use function App\Engine\playGame;
use function App\Engine\getRandomNumber;

use const App\Engine\ROUNDS;

function isPrime(int $num): bool
{
    if ($num === 1 || $num === 0) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function playPrime(): void
{
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];

    for ($i = 1; $i <= ROUNDS; $i++) {
        $number = getRandomNumber();
        $question = ((string) $number);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $currentRoundData = [$question, $correctAnswer];
        $gameData[] = $currentRoundData;
    }

    playGame($rule, $gameData);
}
