<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entities\Costumer;
use App\Entities\Product;
use App\Entities\Sale;

class SalesSeeder extends Seeder
{
    const AMOUNT_COSTUMERS = 5;

    private $faker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        $this->generateCostumers(self::AMOUNT_COSTUMERS)
            ->generateProducts(self::AMOUNT_COSTUMERS * 5)
            ->generateSales(self::AMOUNT_COSTUMERS * 10);
    }

    protected function generateCostumers($amount)
    {
        factory(Costumer::class, $amount)->create();
        return $this;
    }

    protected function generateProducts($amount)
    {
        factory(Product::class, $amount)->create();
        return $this;
    }

    protected function generateSales($amount)
    {
        factory(Sale::class, $amount)->create();
        return $this;
    }
}
