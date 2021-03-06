<?php

declare(strict_types=1);

namespace Brain\Games\GCD;

use function Brain\Games\Engine\playGame;

const RULES = 'Find the greatest common divisor of given numbers.';

function findGcd(int $a, int $b): int
{
    $l = $a > $b ? $a : $b;
    $s = $a > $b ? $b : $a;
    $remainder = $l % $s;
    return $remainder === 0 ? $s : findGcd($s, $remainder);
}

function getGcd(): callable
{
    return function (): array {
        $gcdRange = [1, 10];

        $num1 = random_int($gcdRange[0], $gcdRange[1]);
        $num2 = random_int($gcdRange[0], $gcdRange[1]);

        $rightAnswer = (string)findGcd($num1, $num2);
        $question = "{$num1} {$num2}";

        return [$rightAnswer, $question];
    };
}

function brainGcd(): void
{
    playGame(getGcd(), RULES);
}
