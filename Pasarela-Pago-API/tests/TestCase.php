<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        DB::statement('CREATE SCHEMA IF NOT EXISTS pasarela_pago_tests');
        DB::statement('SET search_path TO pasarela_pago_tests,public');

        $this->artisan('migrate:fresh', ['--force' => true])->run();
    }
}
