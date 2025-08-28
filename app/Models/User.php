<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
protected $fillable = [
    'name', 'email', 'password', 'role', 'phone', 'status', 'photo'
];


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

    public static function roles(): array
{
    return [
        'admin' => 'Administrator',
        'director' => 'Director',
        'assistantdirector' => 'Assistant Director',
        'manager' => 'Manager',
        'secretary' => 'Secretary',
        'staff' => 'Staff',
        'customer' => 'Customer',
        'user' => 'Regular User',
    ];
}

public static function statuses(): array
{
    return [
        'active' => 'Active',
        'innactive' => 'Inactive',
        'suspended' => 'Suspended',
    ];
}

public function getRoleNameAttribute(): string
{
    return self::roles()[$this->role] ?? $this->role;
}

public function getStatusNameAttribute(): string
{
    return self::statuses()[$this->status] ?? $this->status;
}


    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
