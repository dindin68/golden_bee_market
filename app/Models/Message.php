<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $keyType = 'string';
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected $fillable = [
        'id',
        'listing_id',
        'sender_id',
        'receiver_id',
        'content',
        'is_read'
    ];
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
