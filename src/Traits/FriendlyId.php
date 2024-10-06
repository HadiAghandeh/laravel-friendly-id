<?php
namespace HadiAghandeh\FriendlyId\Traits;

use HadiAghandeh\FriendlyId\Encoders\EncoderManager;

trait FriendlyId
{
    private $FriendlyIdManager;

    public function encodeFriendlyId()
    {
        $this->FriendlyIdManager = new EncoderManager(config('friendly-id.alphabet'));

        return $this->FriendlyIdManager->encode($this->id);
    }

    public function decodeFriendlyId($encode)
    {
        $encode = str_replace("-","", $encode);

        $this->FriendlyIdManager = new EncoderManager(config('friendly-id.alphabet'));

        try {
            return $this->FriendlyIdManager->decode($encode);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function scopeWhereFriendlyId($q, $id)
    {
        $id = $this->decodeFriendlyId($id);

        return $q->whereId($id);
    }

}