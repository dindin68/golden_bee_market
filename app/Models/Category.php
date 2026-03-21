<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $keyType = 'string';
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected $fillable = [
        'id',
        'name',
        'slug'
    ];
    public $timestamps = false;
    public function listings()
    {
        return $this->hasMany(Listing::class, 'category_id', 'id');
    }
}
