<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $table = 'verifications';
    protected $keyType = 'string';
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected $fillable = [
        'id',
        'status',
        'listing_id'
    ];
    const UPDATED_AT = null;
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
