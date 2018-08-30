<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DrinksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDrinksList()
    {
        $uri = route('drinks.list');

        $response = $this->get($uri);

        $response->assertStatus(200);
        $response->assertSee('Menu');
    }
}
