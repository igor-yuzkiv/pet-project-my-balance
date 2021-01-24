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
     * @return mixed
     */
    public function getByUserId($userId)
    {
        return $this->startCondition()
            ->where(['user_id' => $userId])
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
