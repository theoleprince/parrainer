<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Testimony
 * @package App\Models
 * @version January 11, 2021, 12:37 pm UTC
 *
 * @property \App\Models\User $user
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $image
 * @property integer $user_id
 */
class Testimony extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'testimonies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'url',
        'image',
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
        'description' => 'string',
        'url' => 'string',
        'image' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
