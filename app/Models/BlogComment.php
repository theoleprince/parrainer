<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BlogComment
 * @package App\Models
 * @version January 11, 2021, 1:38 pm UTC
 *
 * @property \App\Models\Blog $blog
 * @property string $name
 * @property string $email
 * @property string $website
 * @property string $comment
 * @property integer $blog_id
 */
class BlogComment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'blog_comments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'website',
        'comment',
        'blog_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'website' => 'string',
        'comment' => 'string',
        'blog_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'comment' => 'required',
        'blog_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function blog()
    {
        return $this->belongsTo(\App\Models\Blog::class, 'blog_id', 'id');
    }
}
