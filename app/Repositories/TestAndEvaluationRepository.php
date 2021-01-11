<?php

namespace App\Repositories;

use App\Models\TestAndEvaluation;
use App\Repositories\BaseRepository;

/**
 * Class TestAndEvaluationRepository
 * @package App\Repositories
 * @version January 11, 2021, 1:00 pm UTC
*/

class TestAndEvaluationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return TestAndEvaluation::class;
    }
}
