<?php

class ExampleTest extends FeatureTestCase
{
    function test_basic_example()
    {
        $name = 'Daniel GDZ';
        $user = factory(\App\User::class)->create([
            'name' => $name]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
             ->see($name);
    }
}
