<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_vaccin_status()
    {
        // Arrange
        $nidNo = [
            'nid_no' => rand()
        ];
        
        // Act 
        $response = $this->post(route('covid.status'), $nidNo);
        
        // Asset
        $response->assertStatus(302);
        $response->assertRedirect();
        $response->assertSessionHas('status');
    }

    public function test_user_registration_page_show()
    {
        // Act 
        $response = $this->get(route('covid.register'));
        
        // Asset
        $response->assertSee('User Registration');
    }

    public function test_user_vaccine_search_page_show()
    {
        // Act 
        $response = $this->get(route('covid.search'));
        
        // Asset
        $response->assertSee('Check Vaccin Status');
    }
}