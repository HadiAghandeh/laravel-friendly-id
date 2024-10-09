<?php

namespace HadiAghandeh\FriendlyId\Interfaces;

use function DI\string;

interface Encoder
{
    public function encode(int $id): string;

    public function decode(string $encoded): int;

    public function isWord(): bool;
}