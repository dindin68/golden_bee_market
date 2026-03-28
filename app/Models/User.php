<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'users';
    protected $keyType = 'string';
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'password',
        'kyc_status',
        'id_image',
        'role',
        'rating'
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Check if the user is an admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    //messages relationship
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id', 'id');
    }
    //listings relationship
    public function listings()
    {
        return $this->hasMany(Listing::class, 'users_id', 'id');
    }
    //transactions relationship
    public function purchases()
    {
        return $this->hasMany(Transaction::class, 'buyer_id', 'id');
    }
    public function sales()
    {
        return $this->hasMany(Transaction::class, 'seller_id', 'id');
    }
    public function mediatedTransactions()
    {
        return $this->hasMany(Transaction::class, 'admin_id', 'id');
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            if (!$user->id) {
                $user->id = (string) Str::uuid();
            }
            if (!$user->role) {
                $user->role = 'user';
            }
        });
    }

}
