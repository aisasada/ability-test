<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    protected $fillable = [
        'category_id',
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
