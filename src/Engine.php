<?php

declare(strict_types=1);

namespace App\Engine;

const ROUNDS = 3;
const MIN_COMFORTABLE_TO_COUNT_NUMBER = 0;
const MAX_COMFORTABLE_TO_COUNT_NUMBER = 100;

use function cli\line;
use function cli\prompt;

use function App\Cli\sayHello;

function getRandomNumber(): int
{
    return rand(MIN_COMFORTABLE_TO_COUNT_NUMBER, MAX_COMFORTABLE_TO_COUNT_NUMBER);
}

function explainRule(string $rule): void
{
    line($rule);
}

function askQuestion(string $content): void
{
    line("Question: {$content}");
}

function getUserAnswer(): string
{
    return prompt("Your answer");
}

function checkAnswer(string $userAnswer, string $correctAnswer, string $name): bool
{
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    }

    line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
    line("Let's try again, {$name}!");
    return false;
}

function congratulate(string $name): void
{
    line("Congratulations, {$name}!");
}

function playGame(string $rule, array $gameData): void
{
    $name = sayHello();
    explainRule($rule);

    foreach ($gameData as $data) {
        [$question, $correctAnswer] = $data;
        askQuestion($question);
        $userAnswer = getUserAnswer();

        if (checkAnswer($userAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
