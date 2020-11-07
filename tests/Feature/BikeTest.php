<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Bike;

class BikeTest extends TestCase
{
    use RefreshDatabase;
    
    private $endpoint = '/api/bikes';

    public function testListBikes()
    {
        $bikes = Bike::factory()
            ->count(3)
            ->create();
        
        $response = $this->json('get', $this->endpoint);
        
        $response
            ->assertOk()
            ->assertJsonCount(3);
    }

    public function testCreateBike()
    {
        $bike = Bike::factory()
            ->make()
            ->toArray();
        
        $response = $this->json('post', $this->endpoint, $bike);

        $response
            ->assertCreated()
            ->assertJson($bike);
    }

    public function testUpdateBike()
    {
        $createdBike = Bike::factory()->create();
        $createdBike->description = 'description';
        $createdBike->model = 'model';
        $createdBike->amount = 100.00;
        $createdBike->purchased_in = '2020-01-01';
        $createdBike->buyer_name = 'buyer_name';
        $createdBike->store_name = 'store_name';

        $bike = $createdBike->toArray();

        $response = $this->json('put', "$this->endpoint/$createdBike->id", $bike);

        $response
            ->assertOK()
            ->assertExactJson($bike);
    }
    
    public function testShowBike()
    {
        $createdBike = Bike::factory()->create();

        $response = $this->json('get', "$this->endpoint/$createdBike->id");

        $response
            ->assertOK()
            ->assertExactJson($createdBike->toArray());
    }

    public function testDestroyBike()
    {
        $createdBike = Bike::factory()->create();

        $response = $this->json('delete', "$this->endpoint/$createdBike->id");

        $response->assertOK();
        $this->assertDatabaseMissing('bikes', $createdBike->toArray());
    }

    public function testUpdateBikeDescription()
    {
        $createdBike = Bike::factory()->create();
        $createdBike->description = 'description2';
        $createdBike->amount = 350;

        $bike = $createdBike->toArray();

        $response = $this->json('put', "$this->endpoint/$createdBike->id", $bike);

        $response
            ->assertOK()
            ->assertExactJson($bike);
    }
}
