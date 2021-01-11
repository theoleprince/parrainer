<?php

namespace App\Repositories;

use App\Models\ChatMessage;
use App\Repositories\BaseRepository;

/**
 * Class ChatMessageRepository
 * @package App\Repositories
 * @version January 11, 2021, 1:58 pm UTC
*/

class ChatMessageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content',
        'files',
        'sender_id',
        'chat_discussion_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ChatMessage::class;
    }
}
