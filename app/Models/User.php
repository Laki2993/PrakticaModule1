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

    /**
     * Получить все заявки пользователя.
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Получить только активные заявки.
     */
    public function activeApplications()
    {
        return $this->applications()->where('status', 'active');
    }

    /**
     * Получить заявки на рассмотрении.
     */
    public function pendingApplications()
    {
        return $this->applications()->whereIn('status', ['new', 'review']);
    }

    /**
     * Получить последнюю заявку.
     */
    public function latestApplication()
    {
        return $this->applications()->latest()->first();
    }
}