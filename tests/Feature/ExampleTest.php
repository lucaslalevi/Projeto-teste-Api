<?php
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\postJson;
use function Pest\Laravel\getJson;


uses(RefreshDatabase::class)->in('Feature');


uses(RefreshDatabase::class);

beforeEach(function () {
    $this->serviceOrderData = [
        'vehiclePlate' => 'ABC1234',
        'entryDateTime' => now()->toDateTimeString(),
        'exitDateTime' => null,
        'priceType' => 'hourly',
        'price' => 100.00,
        'userId' => User::factory()->create()->id,
    ];
});

test('criação de uma nova ordem de serviço', function () {
    $response = $this->postJson('api/service_orders', $this->serviceOrderData);

    $response->assertStatus(201);
    $response->assertJsonFragment([
        'vehiclePlate' => $this->serviceOrderData['vehiclePlate']
    ]);
});

test('listagem de ordens de serviço', function () {
    ServiceOrder::factory()->count(5)->create();

    $response = $this->getJson('api/service_orders');

    $response->assertStatus(200);
    $response->assertJsonCount(5);
});

test('listagem de ordens de serviço com o nome do usuário', function () {
    $user = User::factory()->create(['name' => 'John Doe']);
    ServiceOrder::factory()->create(['userId' => $user->id]);

    $response = $this->getJson('/api/service_orders');

    $response->assertStatus(200);
    $response->assertJsonFragment(['userName' => 'John Doe']);
});
?>