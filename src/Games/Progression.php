<?php

namespace Php\Games\Progression;

require_once __DIR__ . '/../Engine.php';

use function cli\line;
use function cli\prompt;

use const Engine\ROUNDS;
use function Engine\sayHello;
use function Engine\askQuestion;
use function Engine\explainRules;
use function Engine\getAnswer;
use function Engine\checkAnswer;
use function Engine\congratulate;

function playProgression()
{
    $name = sayHello();
    $question = 'What number is missing in the progression?';
    explainRules($question);
    
    $correctAnswersCount = 0;
    
    while ($correctAnswersCount < ROUNDS) {
        $length = rand(5, 10);
        $step = rand(1, 10);
        $start = rand(0, 100);
        $end = $start + $step * $length;

        $numbers = range($start, $end, $step);

        $missingItemKey = array_rand($numbers);
        $correctAnswer = $numbers[$missingItemKey];
        $numbers[$missingItemKey] = '..';
    
        askQuestion(implode(' ', $numbers));
        $currentAnswer = getAnswer();
    
        if (checkAnswer($currentAnswer, $correctAnswer, $name)) {
            $correctAnswersCount++;
        } else {
            return;
        }
    }
    
    congratulate($name);
}
