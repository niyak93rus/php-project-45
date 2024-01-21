<?php

declare(strict_types=1);

namespace App\Random;

const MIN_COMFORTABLE_TO_COUNT_NUMBER = 0;
const MAX_COMFORTABLE_TO_COUNT_NUMBER = 100;

function getRandomNumber(): int
{
    return rand(MIN_COMFORTABLE_TO_COUNT_NUMBER, MAX_COMFORTABLE_TO_COUNT_NUMBER);
}
