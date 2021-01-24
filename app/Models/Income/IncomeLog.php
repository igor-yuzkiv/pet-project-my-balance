<?php

namespace App\Models\Income;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class IncomeLog
 * @package App\Models\Income
 */
class IncomeLog extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'income_log';

    /**
     * @var string[]
     */
    protected $fillable = [
        'sum', 'income_base_id', 'user_id',
    ];

    /**
     * @return HasOne
     */
    public function incomeBase()
    {
        return $this->hasOne(IncomeBase::class, 'id', 'income_base_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
