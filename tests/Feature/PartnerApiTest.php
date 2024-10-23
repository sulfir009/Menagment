<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_partners()
    {
        $response = $this->json('GET', '/api/partners');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_partner()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $data = [
            'company_name' => 'New Company',
            'contact_person' => 'John Doe',
            'region_id' => 1,
            'contract_count' => 5,
        ];

        // ¬ыполн€ем POST-запрос на создание нового партнера
        $response = $this->json('POST', '/api/partners', $data);

        $response->assertStatus(201);
    }
}
