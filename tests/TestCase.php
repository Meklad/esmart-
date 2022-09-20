<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
    /* @var \Illuminate\Foundation\Application $app */
    $app = require __DIR__ . '/../bootstrap/app.php';

    $app->loadEnvironmentFrom('.env.testing');

    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

    return $app;
    }
}
