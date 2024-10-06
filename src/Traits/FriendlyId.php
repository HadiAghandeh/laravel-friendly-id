<?php
namespace HadiAghandeh\FriendlyId\Traits;

use HadiAghandeh\FriendlyId\Encoders\EncoderManager;

trait FriendlyId
{
    private $FriendlyIdManager;

    /**
     * this will encode integer id of the model and turns it to string such as xxx-xxxx-xxx
     */
    public function encodeFriendlyId($columnName = null): string
    {
        $this->FriendlyIdManager = new EncoderManager(config('friendly-id.alphabet'),config('friendly-id.encoder'));

        $columnName ??= config('friendly-id.column');

        return $this->FriendlyIdManager->encode($this->$columnName);
    }

    public function getFriendlyIdAttribute(): string
    {
        return $this->encodeFriendlyId();
    }

    /**
     * this will decode it back to integer
     */
    public static function decodeFriendlyId($encode): ?int
    {
        $encode = str_replace("-","", $encode);

        $FriendlyIdManager = new EncoderManager(config('friendly-id.alphabet'));

        try {
            return $FriendlyIdManager->decode($encode);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function scopeWhereFriendlyId($q, $id, $columnName = null)
    {
        $id = self::decodeFriendlyId($id);

        $columnName ??= config('friendly-id.column');

        return $q->where($columnName, '=' ,$id);
    }

}