<?php

namespace Database\Factories;

use App\Models\ChatDiscussion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatDiscussionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatDiscussion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_message' => $this->faker->word,
        'user_id_1' => $this->faker->randomDigitNotNull,
        'user_id_2' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
