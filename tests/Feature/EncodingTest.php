<?php

namespace Feature;

use HadiAghandeh\FriendlyId\Encoders\EncoderManager;
use HadiAghandeh\FriendlyId\FriendlyIdServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EncodingTest extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function defineEnvironment($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    protected function getPackageProviders($app)
    {
        return [
            FriendlyIdServiceProvider::class
        ];
    }

    public function testThatEncodingIsRight() {
        $numbers = [
            124,
            125,
            50000,
            50001,
            100000,
            1000000,
            1000000000,
            1000000000000
        ];

        $failed = false;

        foreach ($numbers as $num) {
            $encoder = new EncoderManager(config('friendly-id.alphabet'), config('friendly-id.encoder'));
            $encoding = $encoder->encode($num);

            $decoded = $encoder->decode($encoding);

            echo "$num -> $encoding -> $decoded" . PHP_EOL;

            if ($decoded != $num) {
                $failed = true;
                break;
            }
        }

        $this->assertTrue(!$failed);
    }
}