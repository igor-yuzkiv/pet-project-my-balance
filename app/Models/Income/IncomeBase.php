<?php

namespace App\Models\Income;

use App\helper\ControllerHelper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class IncomeBase
 * @package App\Models\Income
 */
class IncomeBase extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'income_base';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'icon', 'total', 'currency', 'user_id'
    ];

    /**
     * @return HasMany
     */
    public function incomeLog()
    {
        return $this->hasMany(IncomeLog::class, 'income_base_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @param $id
     * @param $total
     */
    public function updateTotalById($id, $total)
    {
        $incomeBase = $this->where(['id' => $id])->first();
        $incomeBase->total -= $total;
        $incomeBase->save();
    }

}
