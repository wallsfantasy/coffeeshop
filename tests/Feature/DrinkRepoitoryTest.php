<?php

namespace Tests\Feature;

use App\Entities\Drink;
use App\Repository\DrinkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DrinkRepoitoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @var DrinkRepository */
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = app(DrinkRepository::class);
    }

    public function testAdd()
    {
        $drink = new Drink();
        $drink->name = 'Green Tea';
        $drink->price = '20.20';

        $result = $this->repository->add($drink);

        $this->assertTrue($result);
    }
}
