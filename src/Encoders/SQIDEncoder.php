<?php

namespace HadiAghandeh\FriendlyId\Encoders;

use HadiAghandeh\FriendlyId\Interfaces\Encoder;
use Sqids\Sqids;

class SQIDEncoder implements Encoder
{

    public function encode(int $id): string
    {
        $sqid = new Sqids($this->alphabet);
        return $sqid->encode([$id]);
    }

    public function decode(string $encoded): int
    {
        $sqid = new Sqids($this->alphabet);
        return $sqid->decode($encoded)[0];
    }

    public function __construct($alphabet)
    {
        $this->alphabet = $alphabet;
    }
}