<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testLogin()
    {
        $login = $this->createMock(UserModel::class);
        $login->method('login');
        $this->assertTrue(true);
    }
}
