<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TestAndEvaluation
 * @package App\Models
 * @version January 11, 2021, 1:00 pm UTC
 *
 * @property \App\Models\User $user
 * @property string $title
 * @property string $file
 * @property integer $user_id
 */
class TestAndEvaluation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'test_and_evaluations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'file',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'file' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'file' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
