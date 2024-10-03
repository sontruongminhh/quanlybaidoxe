<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    use HasFactory;

    protected $table = 'blog_detail';
    protected $primaryKey = 'BlogdetailID';
    public $timestamps = false;

    protected $fillable = [
        'BlogID',
        'Title',
        'Content',
        'Author',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $dates = [
        'CreatedAt',
        'UpdatedAt'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'BlogID', 'BlogID');
    }
}
