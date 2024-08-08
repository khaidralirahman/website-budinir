<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comment";
    protected $fillable = [
        'form_id', 'user_id', 'comment'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
