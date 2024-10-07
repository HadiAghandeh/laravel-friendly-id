<?php

namespace HadiAghandeh\FriendlyId\Encoders;

use HadiAghandeh\FriendlyId\Interfaces\Encoder;
use Sqids\Sqids;

class SQIDEncoder implements Encoder
{

    public function encode(int $id): string
    {
        $sqid = new Sqids(alphabet: $this->alphabet, minLength: config('friendly-id.length'));

        return $sqid->encode([$id]);
    }

    public function decode(string $encoded): int
    {
        $sqid = new Sqids(alphabet: $this->alphabet, minLength: config('friendly-id.length'));

        // decode
        $decoded = $sqid->decode($encoded)[0];

        // validate
        if($this->encode($decoded) != $encoded) {
            return -1;
        }

        return $sqid->decode($encoded)[0];
    }

    public function __construct($alphabet, $secret)
    {
        $this->alphabet = $alphabet;
        $this->secret = $secret;
    }
}