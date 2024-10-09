<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Alphabets
     |--------------------------------------------------------------------------
     |
     | provide a alphabet string it is best if you provide a string with randomized order
     |
     */
    'alphabet' => env('FRIENDLY_ID_ALPHABET', "abcdefghijklmnopqrstuvwxyz"),

    /*
     |--------------------------------------------------------------------------
     | Encoder Name
     |--------------------------------------------------------------------------
     |
     | available option BASEN, SQIDS ans WORDS
     |
     */
    'encoder' => env('FRIENDLY_ID_ENCODER', 'SQIDS'),

    /*
     |--------------------------------------------------------------------------
     | Minimum length
     |--------------------------------------------------------------------------
     |
     | This option controls the minimum length of the encoded string
     | This is not applied to WORDS encoder
     */
    'length' => env('FRIENDLY_ID_LENGTH', 10),

    /*
     |--------------------------------------------------------------------------
     | Default column
     |--------------------------------------------------------------------------
     |
     | This option controls the default column that friendly id uses
     |
     */
    'column' => env('FRIENDLY_ID_COLUMN', 'id'),
];