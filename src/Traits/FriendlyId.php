<?php
namespace HadiAghandeh\FriendlyId\Traits;

use HadiAghandeh\FriendlyId\Encoders\EncoderManager;

trait FriendlyId
{
    private $FriendlyIdManager;

    /**
     * this will encode integer id of the model and turns it to string such as xxx-xxxx-xxx
     */
    public function encodeFriendlyId()
    {
        $this->FriendlyIdManager = new EncoderManager(config('friendly-id.alphabet'),config('friendly-id.encoder'));

        return $this->FriendlyIdManager->encode($this->id);
    }

    /**
     * this will decode it back to integer
     */
    public static function decodeFriendlyId($encode)
    {
        $encode = str_replace("-","", $encode);

        $FriendlyIdManager = new EncoderManager(config('friendly-id.alphabet'));

        try {
            return $FriendlyIdManager->decode($encode);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function scopeWhereFriendlyId($q, $id)
    {
        $id = self::decodeFriendlyId($id);

        return $q->whereId($id);
    }

}