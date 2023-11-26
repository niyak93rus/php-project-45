<?php

namespace Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function sayHello()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", false, $marker = ' ');
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
