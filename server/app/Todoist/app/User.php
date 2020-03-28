<?php

declare(strict_types=1);

namespace App;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;
use App\DDD\Domain\User\User as UserDomain;
use App\DDD\Domain\User\UserEmail;
use App\DDD\Domain\User\UserHashedPassword;
use App\DDD\Domain\User\UserId;
use App\DDD\Domain\User\UserName;
use App\DDD\Domain\User\UserRememberToken;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toDomain(): UserDomain
    {
        return UserDomain::reconstructFromStorage(
            UserEmail::create($this->email),
            UserHashedPassword::create($this->password),
            UserId::create($this->id),
            UserName::create($this->name),
            UserRememberToken::create($this->remember_token),
            CreatedAt::create($this->created_at),
            UpdatedAt::create($this->updated_at)
        );
    }
}
