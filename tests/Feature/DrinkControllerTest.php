<?php

namespace Tests\Feature;

use App\Entities\Drink;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DrinkControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testDrinkList()
    {
        $uri = Url::route('drink.list');

        $response = $this->get($uri);

        $response->assertSeeText('Menu');
        $response->assertStatus(200);
    }

    public function testAddDrink()
    {
        $uri = URL::route('drink.add');

        $response = $this->post($uri, [
            'name' => 'Mixed Juice',
            'price' => '20.00',
        ]);

        $redirectTo = URL::route('drink.list');
        $response->assertRedirect($redirectTo);
    }

    public function testAddDrinkEmptyNameFailed()
    {
        $uri = URL::route('drink.add');

        $response = $this->post($uri, [
            'name' => '',
            'price' => '20.00',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function testAddDrinkEmtyPriceFailed()
    {
        $uri = URL::route('drink.add');

        $response = $this->post($uri, [
            'name' => 'Chocolate',
            'price' => '',
        ]);

        $response->assertSessionHasErrors(['price']);
    }

    public function testRemoveDrink()
    {
        $drink = new Drink(['name' => 'test', 'price' => '20']);
        $drink->save();

        $uri = URL::route('drink.remove');

        $response = $this->post($uri, ['id' => $drink->id]);

        $response->assertRedirect(URL::route('drink.list'));
    }

    public function testRemoveDrinkEmptyIdFailed()
    {
        $drink = new Drink(['name' => 'test', 'price' => '20']);
        $drink->save();

        $uri = URL::route('drink.remove');

        $response = $this->post($uri, ['id' => '']);

        $response->assertSessionHasErrors(['id']);
    }
}
