<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listings';
    protected $keyType = 'string';
    public $incrementing = false;
    const UPDATED_AT = null;
    protected $fillable = [
        'id',
        'title',
        'domain',
        'founding_year',
        'programming_language',
        'cms',
        'hosting',
        'monthly_traffic',
        'traffic_source',
        'is_verified',
        'operating_cost',
        'monthly_profit',
        'status',
        'monthly_revenue',
        'slug',
        'categories_id',
        'users_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'listing_id', 'id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'listing_id', 'id');
    }
    public function verifications()
    {
        return $this->hasMany(Verification::class, 'listing_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_HIDDEN = 'hidden';
    const STATUS_REJECTED = 'rejected';
}
