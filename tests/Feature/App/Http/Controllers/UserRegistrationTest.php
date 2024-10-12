<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    public function test_vaccin_status()
    {
        // Arrange
        $nidNo = [
            'nid_no' => rand()
        ];
        
        // Act 
        $response = $this->post(route('covid.status'), $nidNo);
        
        // Asset
        $response->assertRedirect();
        $response->assertStatus(302);
        $response->assertSessionHas('status');
    }
}