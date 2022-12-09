<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;

class UsersTest extends TestCase
{
    public function testAdminAuth()
    {
        $this->assertCredentials([
            'username'=>'login',
            'password'=>'password'
        ]);
    }
}
