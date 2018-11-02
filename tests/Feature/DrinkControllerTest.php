<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DrinkControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    public function testDrinkList()
    {
        $uri = Url::route('drink.list');

        $response = $this->get($uri);

        $response->assertStatus(200);
        $response->assertSeeText('Menu');
    }

    public function testAddDrink()
    {
        $uri = URL::route('drink.add');

        $response = $this->post($uri, [
            '_token' => Session::token(),
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
            '_token' => Session::token(),
            'name' => '',
            'price' => '20.00',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function testAddDrinkEmtyPriceFailed()
    {
        $uri = URL::route('drink.add');

        $response = $this->post($uri, [
            '_token' => Session::token(),
            'name' => 'Chocolate',
            'price' => '',
        ]);

        $response->assertSessionHasErrors(['price']);
    }
}
