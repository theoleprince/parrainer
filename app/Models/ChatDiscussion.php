<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ChatDiscussion
 * @package App\Models
 * @version January 11, 2021, 1:57 pm UTC
 *
 * @property \App\Models\User $user1
 * @property \App\Models\User $user2
 * @property string $last_message
 * @property integer $user_id_1
 * @property integer $user_id_2
 */
class ChatDiscussion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'chat_discussions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'last_message',
        'user_id_1',
        'user_id_2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'last_message' => 'string',
        'user_id_1' => 'integer',
        'user_id_2' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'last_message' => 'required',
        'user_id_1' => 'required',
        'user_id_2' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user1()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id_1', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user2()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id_2', 'id');
    }
}
