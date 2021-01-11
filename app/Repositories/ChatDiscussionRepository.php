<?php

namespace App\Repositories;

use App\Models\ChatDiscussion;
use App\Repositories\BaseRepository;

/**
 * Class ChatDiscussionRepository
 * @package App\Repositories
 * @version January 11, 2021, 1:57 pm UTC
*/

class ChatDiscussionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'last_message',
        'user_id_1',
        'user_id_2'
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
        return ChatDiscussion::class;
    }
}
