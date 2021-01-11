<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ChatMessage
 * @package App\Models
 * @version January 11, 2021, 1:58 pm UTC
 *
 * @property \App\Models\User $sender
 * @property \App\Models\ChatDiscussion $chatDiscussion
 * @property string $content
 * @property string $files
 * @property integer $sender_id
 * @property integer $chat_discussion_id
 */
class ChatMessage extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'chat_messages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'content',
        'files',
        'sender_id',
        'chat_discussion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'content' => 'string',
        'files' => 'string',
        'sender_id' => 'integer',
        'chat_discussion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'content' => 'required',
        'sender_id' => 'required',
        'chat_discussion_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sender()
    {
        return $this->belongsTo(\App\Models\User::class, 'sender_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function chatDiscussion()
    {
        return $this->belongsTo(\App\Models\ChatDiscussion::class, 'chat_discussion_id', 'id');
    }
}
