<?php

namespace Tests\Feature\Owner;

use Tests\Feature\BaseTest;

class OwnerTest extends BaseTest
{
	private $id = "1";
	private $user_id = "1";
    public function testIfAddingUserToRestaurantSuccessWithValidDataAuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/' .$this->id. '/grant',
            [
                'email' => 'admin@example.com',
                'role' => '1'
            ],
            [
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	/////
	
		public function testIfStatusChangeToVisibleIsSuccessWithValidDataAuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/' .$this->id. '/publish/request',
            [
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
		public function testIfStatusChangeToInvisibleIsSuccessWithValidDataAuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/' .$this->id. '/publish/cancel',
            [
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	/////
			public function testIfRemovingUserFromRestaurantSuccessWithValidDataAuthorized()
    {
        $response = $this->json(
            'DELETE',
            '/restaurant/' .$this->id. '/revoke/' . $this->user_id,
            [
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	    public function testIfAddingUserToRestaurantFailsWithValidDataUnauthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/' .$this->id. '/grant',
            [
                'email' => 'admin@example.com',
                'role' => '1'
            ]
        );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
	public function testIfAddingUserToRestaurantFailsWithInvalidDataAuthorized()
    {
        $response = $this->json(
            'POST',
            '/restaurant/' .$this->id. '/grant',
            [
                'email' => 'eeeeeeeeeeeeee',
                'role' => '1'
            ],
            [
                'Authorization' => 'Bearer ' . $this->getAdminToken()
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
	
	public function testIfRemovingUserFromRestaurantFailsWithInvalidDataAuthorized()
    {
        $response = $this->json(
            'DELETE',
            '/restaurant/99999999678678/revoke/'. $this->user_id,
            [
                'Authorization' => 'Bearer ' . $this->getAdminToken()
            ]
        );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'data',
                'messages',
                'meta'
            ]);
    }
	
}
