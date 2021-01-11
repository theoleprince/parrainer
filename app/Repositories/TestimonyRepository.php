<?php

namespace App\Repositories;

use App\Models\Testimony;
use App\Repositories\BaseRepository;

/**
 * Class TestimonyRepository
 * @package App\Repositories
 * @version January 11, 2021, 12:37 pm UTC
*/

class TestimonyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'url',
        'user_id'
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
        return Testimony::class;
    }
}
