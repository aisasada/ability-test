<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'tell',
        'address',
        'building',
        'detail',
    ];

}
