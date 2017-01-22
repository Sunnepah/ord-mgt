<?php

require_once(__DIR__ . "/../TestCase.php");

use GuzzleHttp\Client;

class OrdersController extends TestCase
{

    protected $client;

    protected function setUp() {

        $this->client = new Client([
            'base_uri'      => 'http://localhost:8080',
            'http_errors'   => false,
        ]);
    }

    public function test_it_creates_order_successfully() {

        $response = $this->client->post('/orders', [
            'json' => [
                "product" => 1,
                "user" => 2,
                "quantity" => 1
            ]
        ]);

        $this->assertEquals(201, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertNotNull($data);
    }

    public function test_it_response_with_400_when_creating_order_with_wrong_data() {

        $response = $this->client->post('/orders', [
            'json' => [
                "product_" => 1,
                "user" => 2
            ]
        ]);

        $this->assertEquals(400, $response->getStatusCode());
    }
}