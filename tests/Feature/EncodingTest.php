<?php

namespace Feature;

use HadiAghandeh\FriendlyId\Encoders\EncoderManager;
use HadiAghandeh\FriendlyId\FriendlyIdServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Workbench\App\Models\TestModel;

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
            1000000000000,
            12545656455156,
            56478641,
            9999999999
        ];

        $failed = false;

        foreach ($numbers as $num) {
            $testmodel = new TestModel();
            $testmodel->id = $num;

            $encoding = $testmodel->encodeFriendlyId();

            $decoded = TestModel::decodeFriendlyId($encoding);

            echo "$num -> $encoding -> $decoded" . PHP_EOL;

            if ($decoded != $num) {
                $failed = true;
                break;
            }
        }

        $this->assertTrue(!$failed);
    }
}