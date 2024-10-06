<?php

namespace HadiAghandeh\FriendlyId\Encoders;

class BaseNEncoder
{
    protected $baseChars;
    protected $secret;
    protected $base;

    /**
     * Constructor for BaseNEncoder.
     *
     * @param string $baseChars String containing the characters of the custom base.
     */
    public function __construct(string $baseChars, string $secret)
    {
        $this->baseChars = $baseChars;
        $this->secret = $secret;
        $this->base = strlen($baseChars);
    }

    /**
     * Encode the given ID to the baseN string.
     *
     * @param int $id The ID to encode.
     * @return string Encoded string.
     */
    public function encode(int $id): string
    {

        if ($id === 0) {
            return $this->baseChars[0];
        }

        $id = hexdec(substr(sha1($this->secret), 0, 8)) ^ $id;

        $encoded = '';

        while ($id > 0) {
            $remainder = $id % $this->base;
            $encoded = $this->baseChars[$remainder] . $encoded;

            $id = bcdiv($id, $this->base, 0);
        }

        if(strlen($encoded) < config('friendly-id.length')) {
            $encoded = str_repeat($this->baseChars[0], config('friendly-id.length') - strlen($encoded)) . $encoded;
        }

        return $encoded;
    }

    /**
     * Decode the baseN string back to the original ID.
     *
     * @param string $encodedString The encoded string to decode.
     * @return int The decoded ID.
     */
    public function decode(string $encodedString): int
    {
        $decoded = 0;
        $len = strlen($encodedString);

        for ($i = 0; $i < $len; $i++) {
            $decoded = $decoded * $this->base + strpos($this->baseChars, $encodedString[$i]);
        }

        return hexdec(substr(sha1($this->secret), 0, 8)) ^ $decoded;
    }
}