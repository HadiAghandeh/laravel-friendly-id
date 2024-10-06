<?php

namespace Feature;

use HadiAghandeh\FriendlyId\Encoders\EncoderManager;
use HadiAghandeh\FriendlyId\FriendlyIdServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BaseNEncodingTest extends \Orchestra\Testbench\TestCase
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
        $numbers = array_map(function () {
            return rand(0, 500000000000);
        }, array_fill(0, 2000, null));

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