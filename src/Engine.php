<?php

namespace App\Engine;

const ROUNDS = 3;

use function cli\line;
use function cli\prompt;

use function App\Cli\sayHello;

function getRandomInt(): int
{
    return rand(0, 100);
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

function playGame($rule, $questions, $correctAnswers) {
    $name = sayHello();

    for ($i = 0; $i < ROUNDS; $i++) {
        explainRule($rule);
        askQuestion($questions[$i]);
        $userAnswer = getUserAnswer();

        if (checkAnswer($userAnswer, $correctAnswers[$i], $name) === false) {
            return;
        }
    }

    congratulate($name);
}