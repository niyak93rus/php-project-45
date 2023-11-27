<?php

namespace Engine;

const ROUNDS = 3;

use function cli\line;
use function cli\prompt;

function sayHello()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", null, ' ');
    line("Hello, %s!", $name);
    return $name;
}

function explainRules($rules)
{
    line($rules);
}

function askQuestion($content)
{
    line("Question: {$content}");
}

function getAnswer()
{
    return prompt("Your answer");
}

function checkAnswer(string $userAnswer, $correctAnswer, $name)
{
    if ((string) $userAnswer === (string) $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
        line("Let's try again, {$name}!");
        return false;
    }
}

function congratulate($name)
{
    line("Congratulations, {$name}!");
}
