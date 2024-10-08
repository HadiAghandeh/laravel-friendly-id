<?php

namespace HadiAghandeh\FriendlyId\Encoders;

class EncoderManager
{
    protected $encoder;

    public function __construct(protected $alphabet = "abcdefghijklmnopqrstuvwxyz", protected $encoderName = "BASEN")
    {
        if("BASEN" == $this->encoderName) {
            $this->encoder = new BaseNEncoder($this->alphabet, config("friendly-id.secret"));
        } else if ("SQIDS" == $this->encoderName) {
            $this->encoder = new SQIDEncoder($this->alphabet, config("friendly-id.secret"));
        } else if ("WORDS" == $this->encoderName) {
            $this->encoder = new WordsEncoder();
        } else {
            throw new \Exception('The encoder is not defined');
        }
    }

    public function encode(int $id)
    {
        $encode = $this->encoder->encode($id);

        if($this->encoder->isWord()) {
            return $encode;
        }

        return $this->formatFriendlyId($encode);
    }

    const FriendlyIdGroups = [3,4,3,4,3,4,3,4];

    private function formatFriendlyId($encoded)
    {
        $formatted = '';
        $position = 0;

        foreach (self::FriendlyIdGroups as $groupSize) {
            $part = substr($encoded, $position, $groupSize);

            if ($position > 0 && !!$part) {
                $formatted .= '-';
            }

            $formatted .= $part;
            $position += $groupSize;
        }

        return $formatted;
    }

    public function decode(string $encode)
    {
        if(!$this->encoder->isWord()) {
            $encode = str_replace("-","", $encode);
        }

        return $this->encoder->decode($encode);
    }
};