<?php

namespace App\Models\Cost;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class CostBase
 * @package App\Models\Cost
 */
class CostBase extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'cost_base';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'icon', 'total', 'user_id', 'currency',
    ];

    /**
     * @return HasOne
     */
    public function costLog()
    {
        return $this->hasOne(CostLog::class, 'cost_base_id', 'id');
    }

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
        $costBase = $this->where(['id' => $id])->first();
        $costBase->total += $total;
        $costBase->save();
    }

}
