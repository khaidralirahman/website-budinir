<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'time',
    ];

    public function forms()
    {
        return $this->hasMany(Form::class, 'tags_id');
    }
}
