<?php
    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;

    class ServiceOrderFactory extends Factory
    {
        protected $model = \App\Models\ServiceOrder::class;

        public function definition()
        {
            return [
                'vehiclePlate' => strtoupper($this->faker->bothify('???####')),
                'entryDateTime' => now(),
                'exitDateTime' => null,
                'priceType' => 'hourly',
                'price' => $this->faker->randomFloat(2, 10, 100),
                'userId' => User::factory(),
            ];
        }
    }
?>
