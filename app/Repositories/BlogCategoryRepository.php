<?php

namespace App\Repositories;

use App\Models\BlogCategory;
use App\Repositories\BaseRepository;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 * @version January 11, 2021, 1:26 pm UTC
*/

class BlogCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return BlogCategory::class;
    }
}
