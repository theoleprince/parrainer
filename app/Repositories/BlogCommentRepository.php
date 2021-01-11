<?php

namespace App\Repositories;

use App\Models\BlogComment;
use App\Repositories\BaseRepository;

/**
 * Class BlogCommentRepository
 * @package App\Repositories
 * @version January 11, 2021, 1:38 pm UTC
*/

class BlogCommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'website',
        'comment',
        'blog_id'
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
        return BlogComment::class;
    }
}
