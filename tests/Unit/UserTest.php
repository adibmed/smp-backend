<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    /**
     * Create a user.
     *
     * @param  array  $override
     * @return User
     */
    protected function createUser(array $override = []): User
    {
        return User::factory()->create($override);
    }

    public function it_can_login() {
    }

    public function it_can_register() {

    }

    public function it_has_roles() {

    }


}
