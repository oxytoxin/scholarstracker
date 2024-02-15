<?php

namespace Database\Factories;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholar>
 */
class ScholarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scholarship_type_id = $this->faker->numberBetween(1, 7);
        $contract_start_date = CarbonImmutable::create($this->faker->dateTimeBetween('-8 years', '-2 years'));

        return [
            'profile_photo' => $this->faker->image(storage_path('app/public/profile_photos/'), fullPath: false),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_initial' => Lottery::odds(8, 10)->winner(fn () => strtoupper($this->faker->randomLetter)),
            'campus_id' => $this->faker->numberBetween(1, 7),
            'scholarship_type_id' => $scholarship_type_id,
            'degree_program_id' => $this->faker->numberBetween(1, 5),
            'scholarship_category_id' => $scholarship_type_id == 1 ? $this->faker->numberBetween(1, 5) : null,
            'higher_education_institute_id' => $this->faker->numberBetween(1, 229),
            'scholarship_status_id' => $this->faker->numberBetween(1, 4),
            'contract_start_date' => $contract_start_date,
            'contract_end_date' => $contract_start_date->addYearsNoOverflow($this->faker->numberBetween(1, 3) * 2),
        ];
    }
}
