<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Message extends Model
{
    protected $table = 'messages';
    protected $keyType = 'string';
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected static function booted()
    {
        static::creating(function ($message) {
            // Tạo ID dạng MSG- kết hợp với chuỗi ngẫu nhiên 10 ký tự
            $message->id = 'MSG-' . Str::random(10);
        });
    }
    const UPDATED_AT = null;
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
