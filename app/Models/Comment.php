<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function getCreatedAtAttribute($value)
    {
        $carbonCreatedAt = Carbon::parse($value);
        return $carbonCreatedAt->diffForHumans();
    }
    public function comments ()
    {
        return $this->hasMany(Comment::class, "parent_id", "uuid")->with("comments");
    }
    public function parent ()
    {
        return $this->belongsTo(Comment::class, "parent_id", "uuid");
    }
}