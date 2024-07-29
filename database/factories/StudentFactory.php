<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'dob' => fake()->dateTimeBetween('-30 years','-18 years')->format('Y-m-d'),
            'email' => fake()->safeEmail(),
            'phonenumber' => fake()->e164PhoneNumber(),
            'student_id' => fake()->numerify('GIKACE-##-####')
        ];
    }


    public function male(){
        return $this->state(function($attributes){
            return [
                'gender' => 'male',
                'firstname' =>fake()->firstNameMale(),
                'lastname' =>fake()->lastName(),
            ];
        });
    }

    public function female(){
        return $this->state(function($attributes){
            return [
                'gender' => 'female',
                'firstname' =>fake()->firstNameFemale(),
                'lastname' =>fake()->lastName(),
            ];
        });
    }


}
