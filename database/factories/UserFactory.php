<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $images = ['userThumbnails/CE6M4YBxGqWEAILSCDRuBK1c12FETdGrpS35hSfe.jpg',
                        'userThumbnails/BjGMeSdGoKUjr8XMtsmxdYDSk6T9nHrZfLEDUUju.jpg',
                        'userThumbnails/3BA4MZ4q9DexBXJsgiwRRGwwS71xJpIkkwdygXEN.jpg'];
    public $status = ['waiting','approved'];

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'username' =>$this->faker->userName,
            'thumbnail' => $this->images[$this->faker->numberBetween(0,2)] ,
            'role' => 'user',
            'status' => $this->status[$this->faker->numberBetween(0,1)],
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
