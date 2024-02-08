<?php

namespace CodeChallenge\Lead\Infrastructure\Inputadapter\Http\APIRest;

use App\Models\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateLeadControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     */
    public function testCreateLeadControllerSuccess (): void
    {
        Client::create([
            'name' => 'testing',
            'email' => 'pepe@testing.com',
        ]);
        $request = [
            'client_id' => 1,
            'email' => 'pepe@testing.com',
            'mortgage_request_amount' => 233,
            'purpose_mortgage' => 'primera-vivienda',
        ];
        $response = $this->post('api/lead', $request);
        $data = json_decode($response->getContent(), true);
        $this->assertEquals(201, $response->status());
        $this->assertEquals(1, $data['id']);
        $this->assertEquals($request['client_id'], $data['client_id']);
        $this->assertEquals($request['email'], $data['email']);
        $this->assertEquals($request['mortgage_request_amount'], $data['mortgage_request_amount']);
        $this->assertEquals($request['purpose_mortgage'], $data['purpose_mortgage']);
        $this->assertArrayHasKey('score', $data);
    }

    /**
     * @return void
     */
    public function testCreateLeadControllerFailClientNoExists (): void
    {
        $request = [
            'client_id' => 1,
            'email' => 'pepe@testing.com',
            'mortgage_request_amount' => 233,
            'purpose_mortgage' => 'primera-vivienda',
        ];
        $response = $this->post('api/lead', $request);
        $data = json_decode($response->getContent(), true);
        $this->assertEquals(422, $response->status());
        $this->assertArrayHasKey('client_id', $data);
    }

    /**
     * @return void
     */
    public function testCreateLeadControllerBadRequest (): void
    {
        $request = [];
        $response = $this->post('api/lead', $request);
        $data = json_decode($response->getContent(), true);
        $this->assertEquals(422, $response->status());
        $this->assertArrayHasKey('client_id', $data);
        $this->assertArrayHasKey('email', $data);
        $this->assertArrayHasKey('mortgage_request_amount', $data);
        $this->assertArrayHasKey('purpose_mortgage', $data);
    }
}
