<?php

namespace App\Models;

use App\Models\Cost\CostBase;
use App\Models\Cost\CostLog;
use App\Models\Income\IncomeBase;
use App\Models\Income\IncomeLog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function incomeBase()
    {
        return $this->hasMany(IncomeBase::class, 'user_id', 'id');
    }

    public function incomeLog()
    {
        return $this->hasMany(IncomeLog::class, 'user_id', 'id');
    }

    public function costBase()
    {
        return $this->hasMany(CostBase::class, 'user_id', 'id');
    }

    public function costLog()
    {
        return $this->hasMany(CostLog::class, 'user_id', 'id');
    }
}
