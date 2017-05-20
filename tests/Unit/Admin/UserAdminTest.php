<?php

namespace Tests\Unit\Admin;

use App\Models\CmsModels\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAdminTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    protected function setUp()
    {
        parent::setUp();

        $this->artisan('db:seed');
        $this->actingAs(User::first());
    }

    public function testUserPage()
    {
        $response = $this->call('GET','admin/users');
        $response->assertStatus(200);
    }
}
