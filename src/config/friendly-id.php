<?php

return [
    'alphabet' => env('FRIENDLY_ID_ALPHABET', "abcdefghijklmnopqrstu"),
    'encoder' => env('FRIENDLY_ID_ENCODER', 'SQIDS'),
    'secret' => env('FRIENDLY_ID_SECRET'),
];