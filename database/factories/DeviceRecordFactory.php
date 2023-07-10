<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceRecord>
 */
class DeviceRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $max_rand_float_gyro = 360;
        $max_rand_float_accl = 10;

        return [
            'gyro_x' => 0 + lcg_value() * (abs($max_rand_float_gyro - 0)),
            'gyro_y' => 0 + lcg_value() * (abs($max_rand_float_gyro - 0)),
            'gyro_z' => 0 + lcg_value() * (abs($max_rand_float_gyro - 0)),

            'accl_x' => 0 + lcg_value() * (abs($max_rand_float_accl - 0)),
            'accl_y' => 0 + lcg_value() * (abs($max_rand_float_accl - 0)),
            'accl_z' => 0 + lcg_value() * (abs($max_rand_float_accl - 0)),

            'text' => strtok(fake()->realText(), ' '),
            'audio_file' => '',
        ];
    }

    /**
     * Indicate that record is wrong.
     */
    public function wrong(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'text' => Str::random('4'),
            ];
        });
    }

    /**
     * Indicate that the data should be verified.
     */
    public function verified(): static
    {
        return $this->state(fn (array $attributes) => [
            'verified_at' => now(),
        ]);
    }
}
