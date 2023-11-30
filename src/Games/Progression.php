<?php

declare(strict_types=1);

namespace App\Games\Progression;

require_once __DIR__ . '/../Engine.php';

use const App\Engine\ROUNDS;
use function App\Engine\sayHello;
use function App\Engine\askQuestion;
use function App\Engine\explainRules;
use function App\Engine\getAnswer;
use function App\Engine\checkAnswer;
use function App\Engine\congratulate;

function playProgression(): void
{
    $name = sayHello();
    $question = 'What number is missing in the progression?';
    explainRules($question);

    for ($i = 0; $i < ROUNDS; $i++) {
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

        if (checkAnswer($currentAnswer, $correctAnswer, $name) === false) {
            return;
        }
    }

    congratulate($name);
}
