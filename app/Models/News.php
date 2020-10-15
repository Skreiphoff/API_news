<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'preview',
        'text',
        'created_at'
    ];
    /**
     * @var string[]
     */
    protected $hidden = [
        'updated_at'
    ];

}
