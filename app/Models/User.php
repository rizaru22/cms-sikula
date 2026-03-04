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
        'name',
        'email',
        'password',
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

    public function getAvatarColorAttribute()
{
    $colors = [
        '#20C997',
        '#0d6efd',
        '#6f42c1',
        '#fd7e14',
        '#dc3545',
        '#198754'
    ];

    return $colors[crc32($this->email) % count($colors)];
}
public function getInitialAttribute()
{
    $words = explode(' ', $this->name);
    $initial = '';

    foreach ($words as $word) {
        $initial .= strtoupper(substr($word, 0, 1));
    }

    return substr($initial, 0, 2);
}

public function getIsSuperAdminAttribute()
{
    return $this->id === 1;
}
}
