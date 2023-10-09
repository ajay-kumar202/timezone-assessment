<?php

namespace Tests\Database\Seeders;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class TestUserSeeder extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function TestUserSeeder()
    {
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);

        $userCount = \DB::table('users')->count();

        $this->assertEquals(20, $userCount);
    }
}
