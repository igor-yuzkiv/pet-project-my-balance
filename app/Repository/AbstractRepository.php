<?php


namespace App\Repository;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository
 * @package App\Repository
 */
abstract class AbstractRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @param $userId
     * @param string $order_by_field
     * @param string $order_by_method
     * @return mixed
     */
    public function getByUserId($userId, $order_by_field = "created_at", $order_by_method = "DESC")
    {
        return $this->startCondition()
            ->where(['user_id' => $userId])
            ->orderBy($order_by_field, $order_by_method)
            ->get();
    }

    /**
     * @return Application|Model|mixed
     */
    protected function startCondition()
    {
        return clone $this->model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->startCondition()
            ->where(['id' => $id])
            ->first();
    }
}
