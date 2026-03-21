<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $keyType = 'string';
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected $fillable = [
        'id',
        'listing_id',
        'buyer_id',
        'seller_id',
        'admin_id',
        'amount',
        'status'
    ];
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
