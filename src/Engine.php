<?php

namespace Engine;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function askQuestion($content)
{
    line("Question: {$content}");
}

function getAnswer()
{
    return prompt("Your answer");
}

function checkAnswer(string $userAnswer, $correctAnswer)
{
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.");
        return false;
    }
}
