<?php

namespace HadiAghandeh\FriendlyId\Interfaces;

interface Encoder
{
    public function encode(int $id): string;

    public function decode(string $encoded): int;

    public function __construct($alphabet);
}