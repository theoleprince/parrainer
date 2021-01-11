<?php

namespace Database\Factories;

use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text,
        'received_at' => $this->faker->date('Y-m-d H:i:s'),
        'sender_delete_at' => $this->faker->date('Y-m-d H:i:s'),
        'receiver_delete_at' => $this->faker->date('Y-m-d H:i:s'),
        'viewed_at' => $this->faker->date('Y-m-d H:i:s'),
        'files' => $this->faker->word,
        'sender_id' => $this->faker->randomDigitNotNull,
        'chat_discussion_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
