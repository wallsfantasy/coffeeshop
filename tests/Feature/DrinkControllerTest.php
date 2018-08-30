<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DrinkControllerTest extends TestCase
{
    public function testDrinkList()
    {
        $uri = Url::route('drink.list');

        $response = $this->get($uri);

        $response->assertStatus(200);
        $response->assertSeeText('Menu');
    }
}
