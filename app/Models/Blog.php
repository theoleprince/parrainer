<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Blog
 * @package App\Models
 * @version January 11, 2021, 1:37 pm UTC
 *
 * @property \App\Models\BlogCategory $blogCategorie
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $blog_categorie_id
 */
class Blog extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'blogs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'image',
        'blog_categorie_id'
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
        'image' => 'string',
        'blog_categorie_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'blog_categorie_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function blogCategorie()
    {
        return $this->belongsTo(\App\Models\BlogCategory::class, 'blog_categorie_id', 'id');
    }
}
