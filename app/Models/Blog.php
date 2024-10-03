<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $primaryKey = 'BlogID';
    public $timestamps = false;

    protected $fillable = [
        'Title',
        'Image',
        'Status',
        'Content',
        'CreatDate'
    ];

    protected $dates = [
        'CreatDate'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
