<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'invoice_number'   => 'INV-' . $this->faker->unique()->numerify('####'),
        'customer_name'    => $this->faker->company(),
        'customer_code'    => $this->faker->bothify('CLI-###'),
        'tax_information'  => $this->faker->sentence(),
        'delivery_address' => $this->faker->address(),
        'additional_notes' => $this->faker->optional()->sentence(),
        'current_status'   => $this->faker->randomElement(['Ordered','In Process','In Route','Delivered']),
        'is_archived'      => false,
        'created_by'       => Employee::inRandomOrder()->first()?->id,
    ];
}
}
