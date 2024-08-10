<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $fillable = [
        'title',
        'tags',
        'time',
        'contributor',
        'description',
        'photo',
        'file',
        'slug',
        'views',
    ];


    /**
     * Get the tag associated with the form.
     */
    // Relasi dengan komentar
    public function comment()
    {
        return $this->hasMany(Comment::class, 'form_id');
    }

    // Relasi dengan likes
    //like memberi data ke form = data artikel dimana like akan menampilkan data di table arikel
    public function likes()
    {
        return $this->hasMany(Like::class, 'form_id');
    }


    //form = data artikel (minta data dari tag buat di tampilin di form)
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tags_id');
    }
}
