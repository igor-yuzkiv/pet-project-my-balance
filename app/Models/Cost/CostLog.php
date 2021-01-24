<?php

namespace App\Models\Cost;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CostLog
 * @package App\Models\Cost
 */
class CostLog extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'cost_log';

    /**
     * @var string[]
     */
    protected $fillable = [
        'cost_base_id', 'income_base_id', 'sum', 'user_id'
    ];

    /**
     * @return HasMany
     */
    public function costBase()
    {
        return $this->hasMany(CostBase::class, 'id', 'cost_base_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
