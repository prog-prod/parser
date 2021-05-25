<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /**
     * Unread user notifications :
     * ========== $user->unreadNotifications =======
     */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'telegram_id',
        'send_telegram',
        'send_email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRoleEnum::class,
        'send_telegram' => 'boolean',
        'send_email' => 'boolean',
    ];

    public function stockFilter()
    {
        return $this->hasOne(StockFilter::class);
    }

    public function verifications()
    {
        return $this->hasMany(UserVerification::class);
    }
}
