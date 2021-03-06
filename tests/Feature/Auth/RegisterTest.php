<?php

namespace Tests\Feature\Auth;

use Tests\Feature\BaseTest;

//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends BaseTest
{
	
	public function testIfRegisterFailsWithUsedValidData()
    {
        $response = $this->json(
            'POST',
            '/auth/register',
            [
                'email' => 'admin@example.com',
                'password' => 'test123',
				'password_confirmation' => 'test123'
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfRegisterSuccessWithDiffrentPasswords()
    {
        $response = $this->json(
            'POST',
            '/auth/register',
            [
                'email' => 'examplua123@example.com',
                'password' => 'test123',
				'password_confirmation' => 'tessssssssssssssssssst123'
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfRegisterFailsWithoutPassword()
    {
        $response = $this->json(
            'POST',
            '/auth/register',
            [
                'email' => 'todelete2@example.com',
                'password' => '',
				'password_confirmation' => ''
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfRegisterFailsWithoutPasswordConfimation()
    {
        $response = $this->json(
            'POST',
            '/auth/register',
            [
                'email' => 'todelete3@example.com',
                'password' => 'test123',
				'password_confirmation' => ''
            ]
        );

        $response
            ->assertStatus(400)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
}
