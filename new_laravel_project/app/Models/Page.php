<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'name',
        'short_content',
        'content',
        'photo',
    ];


    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

$connection = DB::table('pages')->get();
