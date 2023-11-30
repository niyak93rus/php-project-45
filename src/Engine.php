<?php

namespace App\Engine;

const ROUNDS = 3;

use function cli\line;
use function cli\prompt;

function sayHello(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", '', ' ');
    line("Hello, %s!", $name);
    return $name;
}

function getRandomInt(): int
{
    return rand(0, 100);
}

function explainRules(string $rules): void
{
    line($rules);
}

function askQuestion(string $content): void
{
    line("Question: {$content}");
}

function getAnswer(): string
{
    return prompt("Your answer");
}

function checkAnswer(string $userAnswer, mixed $correctAnswer, string $name): bool
{
    if ($userAnswer === (string) $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
        line("Let's try again, {$name}!");
        return false;
    }
}

function congratulate(string $name): void
{
    line("Congratulations, {$name}!");
}
