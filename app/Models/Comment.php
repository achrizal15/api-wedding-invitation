<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        "uuid",
        "detail",
        "name",
        "presence",
        "parent_id"
    ];

    public function comments ()
    {
        return $this->hasMany(Comment::class, "parent_id", "uuid")->with("comments");
    }
    public function parent ()
    {
        return $this->belongsTo(Comment::class, "parent_id", "uuid");
    }
}