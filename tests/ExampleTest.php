<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $name = 'Daniel GDZ';
        $user = factory(\App\User::class)->create([
            'name' => $name]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
             ->see($name);
    }
}
