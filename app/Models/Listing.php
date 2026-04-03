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
        'img_desktop',
        'img_mobile',
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
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_HIDDEN = 'hidden';
    const STATUS_REJECTED = 'rejected';
    // Phương thức scope để tìm kiếm theo title, domain hoặc tên người dùng
    public function scopeSearch($query, $item)
    {
        return $query->when($item, function ($q) use ($item) {
            $q->where(function ($sub) use ($item) {
                $sub->where('title', 'like', "%{$item}%")
                    ->orwhere('domain', 'like', "%{$item}%")
                    ->orWhereHas('user', function ($subQuery) use ($item) {
                        $subQuery->where('name', 'like', "%{$item}%");
                    });
            });
        });
    }
    // Phương thức scope để lọc theo category, status và is_verified
    public function scopeFilter($query, array $filters)
    {
        return $query
            ->when($filters['category'] ?? null, fn($q, $cat) => $q->where('categories_id', $cat))
            ->when($filters['status'] ?? null, fn($q, $st) => $q->where('status', $st))
            ->when(isset($filters['is_verified']) && $filters['is_verified'] !== '', function ($q) use ($filters) {
                return $q->where('is_verified', $filters['is_verified']);
            });
    }
}
