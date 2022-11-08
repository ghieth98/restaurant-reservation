<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tables = collect(Table::all()->modelKeys());
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->email,
            'phone_number' => fake()->phoneNumber,
            'reservation_date' => fake()->dateTimeBetween(now(), now()->addWeek()),
            'table_id' => $tables->random(),
            'guest_number' => fake()->randomNumber(),
        ];
    }
}
